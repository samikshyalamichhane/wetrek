<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PackageReview;
use App\Models\Package;
use Image;
use Illuminate\Support\Str;

class PackageReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packagereview = PackageReview::get();
        // $packagereview = PackageReview::published()->get();
        return view('admin.packagereview.list',compact('packagereview'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$package_id)
    {
        $details = Package::findorfail($package_id)->packagereview()->latest()->take(7)->get();
      $d_id = $package_id;
      return view('admin.package.packagereview.create', compact('details', 'd_id'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$package_id)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'country' => 'required',
        //   ]);

        //   $formData = $request->all();
        // $formData['published'] = is_null($request->published) ? 0 : 1;


        //   Package::findorfail($package_id)->packagereview()->create($formData);
        //   return redirect()->route('packagereview.create', [$request->package])->with('message', 'FAQ Added Successfully.');


          $request->validate([
            'name' => 'required',
            'country' => 'required',
            'description' => 'required|max:1500',
            'image' => 'mimes:pdf,jpg,jpeg,png,gif|max:3500',
          ]);
          $formData = $request->except(['image', 'published']);
          $formData['published'] = is_null($request->published) ? 0 : 1;

          if($request->hasFile('image')){
            $formData['image'] = $this->imageProcessing($request->image, 250, 250, 'yes');
          }
          Package::findorfail($package_id)->packagereview()->create($formData);
          return redirect()->route('packagereview.create', [$request->package])->with('message', 'Review Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($package_id, $packagereview_id)
    {
       $packagereview = Package::findorfail($package_id)->packagereview;
    //    dd($packagereview);
       $detail = PackageReview::findorfail($packagereview_id);
       $d_id = $package_id;

       return view('admin.package.packagereview.edit', compact('packagereview', 'detail', 'd_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $package_id, $id)
    {
      $request->validate([
        'name' => 'required',
        'country' => 'required',
        'description' => 'required|max:1500',
        'image' => 'mimes:jpg,png,jpeg,gif|max:3500',
      ]);
      $data = PackageReview::findorfail($id);

      $formData = $request->except(['published', 'image']);
      $formData['published'] = is_null($request->published) ? 0 : 1;
      if($request->hasFile('image')){
        if($data->image){
          $this->unlinkImage($data->image);
        }
        $formData['image'] = $this->imageProcessing($request->image, 250, 250, 'yes');
      }
      $data->update($formData);
      return redirect()->route('packagereview.create', [$request->package])->with('message', 'PackageReview Edited Successfully.');
    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($package_id, $packagereview_id)
    {
       $data = PackageReview::findorfail($packagereview_id);

       $data->delete();
       return redirect()->route('packagereview.create', [$package_id])->with('message', 'PackageReview Deleted Successfully.');
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
