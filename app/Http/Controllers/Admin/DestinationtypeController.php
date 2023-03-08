<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Destinationtype;
use App\Models\Destination;
use Image;
use Illuminate\Support\Str;

class DestinationtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Destinationtype::orderBy('order_row')->get();
        return view('admin.destinationtype.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // abort('404');
        $destinations = Destination::orderBy('updated_at', 'desc')->get();
        return view('admin.destinationtype.create', compact('destinations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // abort('404');
        $request->validate([
          'title' => 'required',
            'destination_id' => 'required',
            // 'short_description' => 'required',
          // 'banner_image' => 'mimes:jpg,jpeg,png,gif|max:3048',
        ]);
        $formInput = $request->except(['banner_image', 'published', 'slug']);
        $formInput['slug'] = $this->generateSlug($request->title, $request->slug, null);
        $formInput['published'] = is_null($request->published) ? 0 : 1;
        if($request->hasFile('banner_image')){
          $formInput['banner_image'] = $this->imageProcessing($request->banner_image, 1024, 500, 'no');
        }
        Destinationtype::create($formInput);
        return redirect()->route('destinationtype.index')->with('message', 'Destinationtype Create Successfuly.');
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
        $detail = Destinationtype::findorfail($id);
        $destinations = Destination::orderBy('updated_at', 'desc')->get();
        return view('admin.destinationtype.edit', compact('detail','destinations'));
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
        'title' => 'required',
        'slug' => "unique:destinationtypes,slug,$id",
            'destination_id' => 'required',
            // 'short_description' => 'required',
        // 'banner_image' => 'mimes:jpg,png,jpeg,gif|max:3048',
      ]);
      $oldRecord = Destinationtype::findorfail($id);

      $formInput = $request->except(['slug', 'published', 'banner_image']);
      $formInput['slug'] = $this->generateSlug($request->title, $request->slug, $oldRecord);
      $formInput['published'] = is_null($request->published) ? 0 : 1;
      if($request->hasFile('banner_image')){
        if($oldRecord->banner_image){
          $this->unlinkImage($oldRecord->banner_image);
        }
        $formInput['banner_image'] = $this->imageProcessing($request->banner_image, 1024, 500, 'no');
      }
      $oldRecord->update($formInput);
      return redirect()->route('destinationtype.index')->with('message', 'Destinationtype Edited Successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     public function updateOrder(Request $request){
      // dd('Hello');
      $data =[];
      foreach($request->data as $row){
        Destinationtype::where('id',$row['id'])->update(['order_row'=>$row['order_row']+1]);
      }
      return response()->json([],200);
  }
  
  
    public function destroy($id)
    {
        $record = Destinationtype::findorfail($id);
        if($record->banner_image){
          $this->unlinkImage($record->banner_image);
        }
        $record->delete();
        return redirect()->route('destinationtype.index')->with('message', 'Destinationtype Deleted Successfuly.');
    }

    public function generateSlug($title, $slug, $oldRecord)
    {
       if(is_null($slug))
          $slugReturn = Str::slug($title);
       else
         $slugReturn = Str::slug($slug);

      $count = Destinationtype::where('slug', $slugReturn)->count();

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

      $input['imagename'] = Date("D-h-i-s") . '-' . rand() . '-'. $image->getClientOriginalName();
      $thumbPath = public_path('images/thumbnail');
      $mainPath = public_path('images/main');
      $listingPath= public_path('images/listing');

      $img = Image::make($image->getRealPath());
      $img->resize($width, $height)->save($mainPath.'/'.$input['imagename']);

      if($otherpath == 'yes'){
        $img->resize($width/2, null, function($constraint){
          $constraint->aspectRatio();
        })->save($listingPath.'/'.$input['imagename']);

        $img->fit(200, null, function($constraint){
          $constraint->aspectRatio();
        })->save($thumbPath.'/'.$input['imagename']);
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
