<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class PagesController extends Controller
{
     public $readonlyslugpages;

     public function __construct(){
       //page slug can not be edited if the page slug is inside this array
       $this->readonlyslugpages = ['about-us', 'privacy-policy','travel-terms-bookings','nepal-visa','accommodations','best-time-to-travel','travel-safety-tips','packing-list','altitude-sickness-treatment','travel-insurance-and-vaccinations','vaccination'];
     }
    public function index()
    {
      $details = Page::orderBy('updated_at','desc')->get();

      //to display delete buttom only if user have created the page
      $readonlyslug = $this->readonlyslugpages;
      return view('admin.pages.list',compact('details', 'readonlyslug'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'title' => 'required',
        // 'short_description' => 'required',
        'image' => 'mimes:jpg,jpeg,png,gif|max:3048',
      ]);
      $formInput = $request->except(['image', 'published', 'slug', 'travel_guide', 'aboutus']);
      $formInput['slug'] = $this->generateSlug($request->title, $request->slug, null);
      $formInput['published'] = is_null($request->published) ? 0 : 1;
      $formInput['travel_guide'] = is_null($request->travel_guide) ? 0 : 1;
      $formInput['aboutus'] = is_null($request->aboutus) ? 0 : 1;
      if ($request->hasFile('image')) {
        $file = $request->image;
        $filename = time() . '-image.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/pages', $filename);
        $formData['image'] = $path;
      }
      if ($request->hasFile('banner_image')) {
        $file = $request->banner_image;
        $filename = time() . '-image.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/pages', $filename);
        $formData['banner_image'] = $path;
      }
      Page::create($formInput);
      return redirect()->route('pages.index')->with('message', 'Page Create Successfuly.');
    }

    public function edit($id)
    {
      $detail = Page::findorfail($id);
      //to display delete buttom only if user have created the page
      $readonlyslug = $this->readonlyslugpages;
      return view('admin.pages.edit', compact('detail', 'readonlyslug'));
    }

    public function update(Request $request, $id)
    {
      $request->validate([
        'title' => 'required',
        'image' => 'mimes:jpg,png,jpeg,gif|max:3048',
      ]);
      $oldRecord = Page::findorfail($id);

      $formInput = $request->except(['slug', 'published', 'image', 'travel_guide', 'aboutus']);
      $formInput['slug'] = $this->generateSlug($request->title, $request->slug, $oldRecord);
      $formInput['published'] = is_null($request->published) ? 0 : 1;
      $formInput['travel_guide'] = is_null($request->travel_guide) ? 0 : 1;
      $formInput['aboutus'] = is_null($request->aboutus) ? 0 : 1;
      if ($request->hasFile('image')) {
        if ($oldRecord->image) {
          Storage::delete($oldRecord->image);
        }
        $file = $request->image;
        $filename = time() . '-image.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/pages', $filename);
        $formInput['image'] = $path;
      }
      if ($request->hasFile('banner_image')) {
        if ($oldRecord->banner_image) {
              Storage::delete($oldRecord->banner_image);
            }
        $fileIcon = $request->banner_image;
        $fileIconname = time() . '-banner_image.' . $fileIcon->getClientOriginalExtension();
        $pathIcon = $fileIcon->storeAs('public/pages', $fileIconname);
        $formInput['banner_image'] = $pathIcon;
    }
      $oldRecord->update($formInput);
      return redirect()->route('pages.index')->with('message', 'Page Edited Successfuly.');
    }

    public function destroy($id)
    {
      $record = Page::findorfail($id);
      if ($record->image) {
        Storage::delete($record->image);
      }
      if ($record->map_image) {
        Storage::delete($record->map_image);
      }
      $record->delete();
      return redirect()->route('pages.index')->with('message', 'Page Deleted Successfuly.');
    }

    public function generateSlug($title, $slug, $oldRecord)
    {
       if(is_null($slug))
          $slugReturn = Str::slug($title);
       else
         $slugReturn = Str::slug($slug);

      $count = Page::where('slug', $slugReturn)->count();

        if(!is_null($oldRecord)){
          if($oldRecord->slug == $slugReturn){
            return $slugReturn;
          }else{
            if($count > 0)
              return $slugReturn . '-' . $count;
            else
              return $slugReturn;
          }
        } else {
            if($count > 0)
              return $slugReturn . '-' . $count;
            else
              return $slugReturn;
        }
    }

    public function imageProcessing($image, $width, $height, $otherpath){

      $input['imagename'] = Date("D-h-i-s") . '-' . rand() . '-' . $image->getClientOriginalName();
      $thumbPath = public_path('images/thumbnail');
      $mainPath = public_path('images/main');
      $listingPath= public_path('images/listing');

      $img = Image::make($image->getRealPath());
      $img->resize($width, $height)->save($mainPath.'/'.$input['imagename']);

      if($otherpath == 'yes'){
        $img1 = Image::make($image->getRealPath());
        $img1->resize($width/2, null, function($constraint){
          $constraint->aspectRatio();
        })->save($listingPath.'/'.$input['imagename']);

        $img1->fit(200, null, function($constraint){
          $constraint->aspectRatio();
        })->save($thumbPath.'/'.$input['imagename']);
        $img1->destroy();
      }

        $img->destroy();
        return $input['imagename'];
    }

    public function unlinkImage($imagename)
    {
      $thumbPath = public_path('images/thumbnail/') . $imagename;
      $mainPath = public_path('images/main/') . $imagename;
      $listingPath= public_path('images/listing/') . $imagename;
       if(file_exists($thumbPath))
          unlink($thumbPath);
       if(file_exists($mainPath))
          unlink($mainPath);
       if(file_exists($listingPath))
          unlink($listingPath);
      return;
    }

}
