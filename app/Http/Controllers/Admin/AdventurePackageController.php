<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Adventure;
use App\Models\Activity;
use App\Models\AdventurePackage;
use App\Models\AdventurePackageEquipment;
use App\Models\AdventurePackageSlider;
use Auth;
use Session;
use Image;
use Illuminate\Support\Str;
use App\Traits\AdventurePackageMultipleImagesTrait;

class AdventurePackageController extends Controller
{
    use AdventurePackageMultipleImagesTrait;
    protected $adventurepackageslider;
    public function __construct(AdventurePackageSlider $adventurepackageslider)
    {
      $this->adventurepackageslider = $adventurepackageslider;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = AdventurePackage::orderBy('updated_at', 'desc')->get();
        return view('admin.adventure_package.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinations = Destination::orderBy('updated_at', 'desc')->get();
        $activities = Activity::orderBy('updated_at', 'desc')->get();
        $adventures = Adventure::orderBy('updated_at', 'desc')->get();
        return view('admin.adventure_package.create', compact('destinations','adventures','activities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $formData = $request->except(['slug', 'image', 'package_pdf','published','popular_tours',]);

        $formData['slug'] = $this->generateSlug($request->package_name, $request->slug, null);
        if ($request->hasFile('image')) {
          $formData['image'] = $this->imageProcessing($request->image, 1349, 470, 'yes');
        }
        if ($request->hasFile('package_pdf')) {
          $formData['package_pdf'] = $this->documentProcessing($request->package_pdf);
        }
        // dd($request->hasFile('package_pdf'));
        // $formData['featured_trips'] = is_null($request->featured_trips) ? 0 : 1;
        // $formData['popular_sales'] = is_null($request->popular_sales) ? 0 : 1;
        // $formData['outbound_trips'] = is_null($request->outbound_trips) ? 0 : 1;
        // $formData['holidays'] = is_null($request->holidays) ? 0 : 1;
        // $formData['trip_of_the_month'] = is_null($request->trip_of_the_month) ? 0 : 1;
        $formData['published'] = is_null($request->published) ? 0 : 1;
        $formData['trip_of_the_month'] = is_null($request->trip_of_the_month) ? 0 : 1;
        $formData['popular_tours'] = is_null($request->popular_tours) ? 0 : 1;


    
        $thatDesti = AdventurePackage::create($formData);
        return redirect()->route('adventurepackage.edit', $thatDesti->id)->with('message', 'Adventures Package Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = AdventurePackage::findorfail($id);
        $d_id = $id;
        $destinations = Destination::orderBy('updated_at', 'desc')->get();
        $adventures = Adventure::orderBy('updated_at', 'desc')->get();
        $activities = Activity::orderBy('updated_at', 'desc')->get();

        return view('admin.adventure_package.edit', compact('detail', 'destinations', 'd_id', 'adventures','activities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'package_name' => 'required',
            'destination_id' => 'required',
            'activity_id' => 'required',
            'adventure_id' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif',
      
          ]);
      
          $oldRecord = AdventurePackage::findorfail($id);
          $formData = $request->except(['slug', 'image', 'published','map_image', 'popular_tours']);
          $formData['slug'] = $this->generateSlug($request->package_name, $request->slug, $oldRecord);
      
          if ($request->hasFile('image')) {
            if ($oldRecord->image) {
              $this->unlinkImage($oldRecord->image);
            }
            $formData['image'] = $this->imageProcessing($request->image, 'no');
          }

          if ($request->hasFile('package_pdf')) {
            if ($oldRecord->package_pdf) {
              $this->unlinkImage($oldRecord->package_pdf);
            }
            $formData['package_pdf'] = $this->documentProcessing($request->package_pdf);
          }

          if ($request->hasFile('map_image')) {
            if ($oldRecord->map_image) {
              $this->unlinkImage($oldRecord->map_image);
            }
            $formData['map_image'] = $this->mapImageProcessing($request->map_image,  'no');
          }
        //   $formData['featured_trips'] = is_null($request->featured_trips) ? 0 : 1;
        //   $formData['outbound_trips'] = is_null($request->outbound_trips) ? 0 : 1;
        //   $formData['popular_sales'] = is_null($request->popular_sales) ? 0 : 1;
        //   $formData['holidays'] = is_null($request->holidays) ? 0 : 1;
        //   $formData['trip_of_the_month'] = is_null($request->trip_of_the_month) ? 0 : 1;
          $formData['published'] = is_null($request->published) ? 0 : 1;
          $formData['trip_of_the_month'] = is_null($request->trip_of_the_month) ? 0 : 1;
          $formData['popular_tours'] = is_null($request->popular_tours) ? 0 : 1;


          // dd($formData);
          $oldRecord->update($formData);
          return redirect()->route('adventurepackage.index')->with('message', 'Adventure Package Edited Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = AdventurePackage::findorfail($id);
        $package->delete();
        return redirect()->back()->with('message', 'Adventures Package Deleted Successfully.');
        
    }

    public function generateSlug($title, $slug, $oldRecord)
    {
      if (is_null($slug))
        $slugReturn = Str::slug($title);
      else
        $slugReturn = Str::slug($slug);
  
      $count = AdventurePackage::where('slug', $slugReturn)->count();
  
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

    public function imageProcessing($image, $otherpath)
    {
  
      $input['imagename'] = Date("D-h-i-s") . '-' . rand() . '-' . $image->getClientOriginalName();
      $thumbPath = public_path('images/thumbnail');
      $mainPath = public_path('images/main');
      $listingPath = public_path('images/listing');
  
      $img = Image::make($image->getRealPath());
      $img->save($mainPath . '/' . $input['imagename']);
      $img->save($listingPath . '/' . $input['imagename']);
      $img->save($thumbPath . '/' . $input['imagename']);
  
  
  
      //   if($otherpath == 'yes'){
      //     $img1 = Image::make($image->getRealPath());
      //     $img1->resize($width/2, null, function($constraint){
      //       $constraint->aspectRatio();
      //     })->save($listingPath.'/'.$input['imagename']);
  
      //     $img1->resize(200, null, function($constraint){
      //       $constraint->aspectRatio();
      //     })->save($thumbPath.'/'.$input['imagename']);
      //     $img1->destroy();
      //   }
  
      $img->destroy();
      return $input['imagename'];
    }
  

  public function mapImageProcessing($image, $otherpath)
  {

    $input['imagename'] = Date("D-h-i-s") . '-' . rand() . '-' . $image->getClientOriginalName();
    $thumbPath = public_path('images/thumbnail');
    $mainPath = public_path('images/main');
    $listingPath = public_path('images/listing');

    $img = Image::make($image->getRealPath());
    $img->save($listingPath . '/' . $input['imagename']);

    if ($otherpath == 'yes') {
      $img1 = Image::make($image->getRealPath());
      $img1->resize($width / 2, null, function ($constraint) {
        $constraint->aspectRatio();
      })->save($listingPath . '/' . $input['imagename']);

      $img1->resize(200, null, function ($constraint) {
        $constraint->aspectRatio();
      })->save($thumbPath . '/' . $input['imagename']);
      $img1->destroy();
    }

    $img->destroy();
    return $input['imagename'];
  }

  public function unlinkImage($imagename)
  {
    $thumbPath = public_path('images/thumbnail/') . $imagename;
    $mainPath = public_path('images/main/') . $imagename;
    $listingPath = public_path('images/listing/') . $imagename;
    if (file_exists($thumbPath))
      unlink($thumbPath);
    if (file_exists($mainPath))
      unlink($mainPath);
    if (file_exists($listingPath))
      unlink($listingPath);
    return;
  }
  public function documentProcessing($document)
  {
    $input['documentName'] = "document-" . date('Ymdhis') . rand(0, 1234) . "." . $document->getClientOriginalExtension();
    $document->move(public_path('files'), $input['documentName']);
    return $input['documentName'];
  }
}