<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Destinationtype;
use Auth;
use Session;
use Image;
use App\Models\AdminsRole;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Destination::orderBy('updated_at', 'desc')->get();
        $destinationModuleCount = AdminsRole::where(['admin_id'=>Auth::user()->id,'module'=>'destination'])->count();
        if(Auth::user()->type=="superadmin"){
            $destinationModule['view_access'] = 1;
            $destinationModule['edit_access'] = 1;
            $destinationModule['full_access'] = 1;
        }else if($destinationModuleCount==0){
            $message= "Sorry, This Section is restricted for your role !!";
            session::flash('error',$message);
            return redirect('admin/dashboard');
        }else{
            $destinationModule = AdminsRole::where(['admin_id'=>Auth::user()->id,'module'=>'destination'])->first()->toArray();
            // dd($destinationModule);die;
        }
        return view('admin.destination.list', compact('details','destinationModule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.destination.create');
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
          'country_name' => 'required',
          'banner_image' => 'mimes:pdf,jpg,jpeg,png,gif|max:3500',
        ]);
        $formInput = $request->except(['banner_image', 'published', 'slug']);
        $formInput['slug'] = $this->generateSlug($request->country_name, $request->slug, null);
        $formInput['published'] = is_null($request->published) ? 0 : 1;

        if($request->hasFile('banner_image')){
          $formInput['banner_image'] = $this->imageProcessing($request->banner_image, 1920, 886, 'yes');
        }
        Destination::create($formInput);
        return redirect()->route('destination.index')->with('message', 'Destination Create Successfuly.');
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
        $detail = Destination::findorfail($id);
        $d_id = $id;
      return view('admin.destination.edit', compact('detail','d_id'));
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
        'country_name' => 'required',
          'banner_image' => 'mimes:jpg,png,jpeg,gif|max:3500',
      ]);
      $oldRecord = Destination::findorfail($id);

      $formInput = $request->except(['slug', 'published', 'banner_image']);
      $formInput['slug'] = $this->generateSlug($request->country_name, $request->slug, $oldRecord);
      $formInput['published'] = is_null($request->published) ? 0 : 1;
      if($request->hasFile('banner_image')){
        if($oldRecord->banner_image){
          $this->unlinkImage($oldRecord->banner_image);
        }
        $formInput['banner_image'] = $this->imageProcessing($request->banner_image, 1920, 886, 'yes');
      }
      $oldRecord->update($formInput);
      return redirect()->route('destination.index')->with('message', 'Destination Edited Successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Destination::findorfail($id);
        if($record->banner_image){
          $this->unlinkImage($record->banner_image);
        }
        $record->delete();
        return redirect()->route('destination.index')->with('message', 'Destination Deleted Successfuly.');
    }

    public function generateSlug($country_name, $slug, $oldRecord)
    {
       if(is_null($slug))
          $slugReturn = Str::slug($country_name);
       else
         $slugReturn = Str::slug($slug);

      $count = Destination::where('slug', $slugReturn)->count();

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
