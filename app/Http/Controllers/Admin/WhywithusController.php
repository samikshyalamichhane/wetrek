<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Whywithus;
use Image;
use Illuminate\Support\Str;

class WhywithusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Whywithus::orderBy('updated_at', 'desc')->get();
        return view('admin.whywithus.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.whywithus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'whywithus_title' => 'required',
        ]);
        $formInput = $request->except(['published', 'slug','image1','image2']);
        // dd($formInput);

        $formInput['slug'] = $this->generateSlug($request->whywithus_title, $request->slug, null);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        // if($request->hasFile('whywithus_icon')){
        //   $formInput['whywithus_icon'] = $this->imageProcessing($request->whywithus_icon, 1349, 356, 'yes');
        // }
        if($request->hasFile('image1')){
          $formInput['image1'] = $this->imageProcessing($request->image1, 300, 200, 'yes');
        }
        if($request->hasFile('image2')){
          $formInput['image2'] = $this->imageProcessing($request->image2, 300, 200, 'yes');
        }
        Whywithus::create($formInput);
        return redirect()->route('whywithus.index')->with('message', 'Whywithus Create Successfuly.');
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
        $detail = Whywithus::findorfail($id);
        return view('admin.whywithus.edit', compact('detail'));
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
        'whywithus_title' => 'required',
      ]);
      $oldRecord = Whywithus::findorfail($id);

      $formInput = $request->except(['slug', 'published','image1','image2']);
      $formInput['slug'] = $this->generateSlug($request->whywithus_title, $request->slug, $oldRecord);
      $formInput['published'] = is_null($request->published) ? 0 : 1;
      // if($request->hasFile('whywithus_icon')){
      //   if($oldRecord->whywithus_icon){
      //     $this->unlinkImage($oldRecord->whywithus_icon);
      //   }
      //   $formInput['whywithus_icon'] = $this->imageProcessing($request->whywithus_icon, 1349, 356, 'yes');
      // }

      if($request->hasFile('image1')){
        if($oldRecord->image1){
          $this->unlinkImage($oldRecord->image1);
        }
        $formInput['image1'] = $this->imageProcessing($request->image1, 300, 200, 'yes');
      }

      if($request->hasFile('image2')){
        if($oldRecord->image2){
          $this->unlinkImage($oldRecord->image2);
        }
        $formInput['image2'] = $this->imageProcessing($request->image2, 300, 200, 'yes');
      }
      $oldRecord->update($formInput);
      return redirect()->route('whywithus.index')->with('message', 'Why with us Edited Successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Whywithus::findorfail($id);
        if($record->whywithus_icon){
          $this->unlinkImage($record->whywithus_icon);
        }
        $record->delete();
        return redirect()->route('whywithus.index')->with('message', 'Whywithus Deleted Successfuly.');
    }

    public function generateSlug($whywithus_title, $slug, $oldRecord)
    {
       if(is_null($slug))
          $slugReturn = Str::slug($whywithus_title);
       else
         $slugReturn = Str::slug($slug);

      $count = Whywithus::where('slug', $slugReturn)->count();

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
