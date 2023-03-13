<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Destinationtype;
use App\Models\Region;
use App\Models\Activity;
use App\Models\Category;
use App\Models\Package;
use App\Models\Travelstyle;
use App\Models\PackageEquipment;
use App\Models\PackageSlider;
use Auth;
use Session;
use Image;
use App\Models\Group;
use Illuminate\Support\Str;
use App\Traits\PackageMultipleImagesTrait;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
  use PackageMultipleImagesTrait;
  protected $packageslider;
  public function __construct(PackageSlider $packageslider)
  {
    $this->packageslider = $packageslider;
  }

  public function index()
  {
    $details = Package::orderBy('updated_at', 'desc')->get();
    return view('admin.package.list', compact('details'));
  }

  public function create()
  {
    $destinationTypes = Destinationtype::orderBy('updated_at', 'desc')->get();
    $categories = Category::orderBy('updated_at', 'desc')->get();
    $regions = Region::orderBy('updated_at', 'desc')->get();
    $activities = Activity::orderBy('updated_at', 'desc')->get();
    $activities = Activity::orderBy('updated_at', 'desc')->get();
    $travelStyles = Travelstyle::orderBy('updated_at', 'desc')->get();
    return view('admin.package.create', compact('destinationTypes', 'travelStyles', 'regions', 'activities', 'categories'));
  }

  public function store(Request $request)
  {

    $formData = $request->except(['slug', 'image', 'package_pdf', 'published', 'popular_tours', 'upcoming_trips', 'best_sells', 'adventure_road_trip', 'mountain_trek', 'peak_climbing_expeditions', 'special_package', 'recommanded_package']);

    $formData['slug'] = $this->generateSlug($request->package_name, $request->slug, null);

    // if ($request->hasFile('image')) {
    //   $formData['image'] = $this->imageProcessing($request->image, 1920, 886, 'yes');
    // }
    if ($request->hasFile('image')) {
      $file = $request->image;
      $filename = time() . '-image.' . $file->getClientOriginalExtension();
      $path = $file->storeAs('public/packages', $filename);
      $formData['image'] = $path;
    }
    if ($request->hasFile('package_pdf')) {
      $formData['package_pdf'] = $this->documentProcessing($request->package_pdf);
    }
    $formData['published'] = is_null($request->published) ? 0 : 1;
    $formData['best_sells'] = is_null($request->best_sells) ? 0 : 1;
    $formData['popular_package'] = is_null($request->popular_package) ? 0 : 1;
    $formData['luxury_package'] = is_null($request->luxury_package) ? 0 : 1;
    // dd($formData);

    $thatDesti = Package::create($formData);
    $thatDesti->travelstyles()->sync($request->travelstyle_id);
    return redirect()->route('package.edit', $thatDesti->id)->with('message', 'Package Added Successfully.');
  }

  public function show($id)
  {
    abort('404');
  }

  public function edit($id)
  {
    $detail = Package::findorfail($id);
    $d_id = $id;
    $destinationTypes = Destinationtype::orderBy('updated_at', 'desc')->get();
    $categories = Category::publish()->get();
    $regions = Region::orderBy('updated_at', 'desc')->get();
    $activities = Activity::orderBy('updated_at', 'desc')->get();
    $travelStyles = Travelstyle::orderBy('updated_at', 'desc')->get();
    return view('admin.package.edit', compact('categories', 'detail', 'destinationTypes', 'd_id', 'regions', 'activities', 'travelStyles'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'package_name' => 'required',
      // 'destinationtype_id' => 'required',
      // 'travelstyle_id' => 'required',
      // 'region_id' => 'required',
      // 'activity_id' => 'required',
      'image' => 'mimes:jpg,jpeg,png,gif',

    ]);

    $oldRecord = Package::findorfail($id);
    $formData = $request->except(['slug', 'image', 'published', 'map_image', 'popular_tours', 'upcoming_trips', 'best_sells', 'adventure_road_trip', 'mountain_trek', 'peak_climbing_expeditions', 'special_package', 'recommanded_package']);
    $formData['slug'] = $this->generateSlug($request->package_name, $request->slug, $oldRecord);

    // if ($request->hasFile('image')) {
    //   if ($oldRecord->image) {
    //     $this->unlinkImage($oldRecord->image);
    //   }
    //   $formData['image'] = $this->imageProcessing($request->image, 'no');
    // }

    // if ($request->has('image')) {
    //   if ($oldRecord->image) {
    //     // $this->unlinkImage($oldRecord->image);
    //     Storage::disk('public')->delete($oldRecord->image);
    //   }
    //   $formData['image'] = $request->image->store('images/blog');
    // }

    if ($request->hasFile('image')) {
      if ($oldRecord->image) {
        Storage::delete($oldRecord->image);
      }
      $file = $request->image;
      $filename = time() . '-image.' . $file->getClientOriginalExtension();
      $path = $file->storeAs('public/packages', $filename);
      $formData['image'] = $path;
    }

    if ($request->hasFile('map_image')) {
      if ($oldRecord->map_image) {
        Storage::delete($oldRecord->map_image);
      }
      $file = $request->map_image;
      $filename = time() . '-image.' . $file->getClientOriginalExtension();
      $path = $file->storeAs('public/packages', $filename);
      $formData['map_image'] = $path;
    }

    if ($request->hasFile('package_pdf')) {
      if ($oldRecord->package_pdf) {
        $this->unlinkImage($oldRecord->package_pdf);
      }
      $formData['package_pdf'] = $this->documentProcessing($request->package_pdf);
    }

    $formData['published'] = is_null($request->published) ? 0 : 1;
    $formData['best_sells'] = is_null($request->best_sells) ? 0 : 1;
    $formData['popular_package'] = is_null($request->popular_package) ? 0 : 1;
    $formData['luxury_package'] = is_null($request->luxury_package) ? 0 : 1;
    $oldRecord->update($formData);
    return redirect()->back()->with('message', 'Package Edited Successfully.');
  }

  public function destroy($id)
  {
    $package = Package::findorfail($id);
    if ($package->map_image) {
      Storage::delete($package->map_image);
    }
    if ($package->image) {
      Storage::delete($package->image);
    }
    $package->delete();
    return redirect()->back()->with('message', 'Package Deleted Successfully.');
  }

  public function generateSlug($title, $slug, $oldRecord)
  {
    if (is_null($slug))
      $slugReturn = Str::slug($title);
    else
      $slugReturn = Str::slug($slug);

    $count = Package::where('slug', $slugReturn)->count();

    if (!is_null($oldRecord)) {
      if ($oldRecord->slug == $slugReturn) {
        return $slugReturn;
      } else {
        if ($count > 0)
          return $slugReturn . '-' . $count;
        else
          return $slugReturn;
      }
    } else {
      if ($count > 0)
        return $slugReturn . '-' . $count;
      else
        return $slugReturn;
    }
  }

  public function documentProcessing($document)
  {
    $input['documentName'] = "document-" . date('Ymdhis') . rand(0, 1234) . "." . $document->getClientOriginalExtension();
    $document->move(public_path('files'), $input['documentName']);
    return $input['documentName'];
  }

  public function getRegion(Request $request)
  {
    $categories = Region::where('category_id', $request->category_id)->get();
    return response()->json(['category' => $categories]);
  }
}
