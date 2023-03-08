<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Region;
use Image;
use Auth;
use Session;
use Illuminate\Support\Str;

class RegionController extends Controller
{
    public function index()
    {
        $details = Region::orderBy('created_at', 'desc')->get();
        return view('admin.region.list', compact('details'));
    }

    public function create()
    {
      $categories = Category::publish()->get();
        return view('admin.region.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
          ]);
          $formInput = $request->except(['publish', 'slug','banner_image']);
          $formInput['slug'] = $this->generateSlug($request->name, $request->slug, null);
          $formInput['publish'] = is_null($request->publish) ? 0 : 1;
          if($request->hasFile('banner_image')){
            $formInput['banner_image'] = $this->imageProcessing($request->banner_image, 1920, 886, 'yes');
          }
          Region::create($formInput);
          return redirect()->route('region.index')->with('message', 'Region Create Successfuly.');
    }

    public function edit($id)
    {
        $detail=Region::findOrFail($id);
        return view('admin.region.edit',compact('detail'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',

          ]);
          $oldRecord = Region::findorfail($id);

          $formInput = $request->except(['slug', 'publish','banner_image']);
          $formInput['slug'] = $this->generateSlug($request->name, $request->slug, $oldRecord);
          $formInput['publish'] = is_null($request->publish) ? 0 : 1;
          if($request->hasFile('banner_image')){
            if($oldRecord->banner_image){
              $this->unlinkImage($oldRecord->banner_image);
            }
            $formInput['banner_image'] = $this->imageProcessing($request->banner_image, 1920, 886, 'yes');
          }
          $oldRecord->update($formInput);
          return redirect()->route('region.index')->with('message', 'Region Edited Successfuly.');
    }

    public function destroy($id)
    {
        Region::find($id)->delete();
        return redirect()->route('region.index')->with('message', 'Region Deleted Successfuly.');
    }


    public function generateSlug($name, $slug, $oldRecord)
    {
       if(is_null($slug))
          $slugReturn = Str::slug($name);
       else
         $slugReturn = Str::slug($slug);

      $count = Region::where('slug', $slugReturn)->count();

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


