<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\AdminsRole;
use Auth;
use Illuminate\Support\Facades\Storage;
use Session;
use Image;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = Setting::first();
        $siteSettingModuleCount = AdminsRole::where(['admin_id'=>Auth::user()->id,'module'=>'siteSetting'])->count();
        if(Auth::user()->type=="superadmin"){
            $siteSettingModule['view_access'] = 1;
            $siteSettingModule['edit_access'] = 1;
            $siteSettingModule['full_access'] = 1;
        }else if($siteSettingModuleCount==0){
            $message= "Sorry, This Section is restricted for your role !!";
            session::flash('error',$message);
            return redirect('admin/dashboard');
        }else{
            $siteSettingModule = AdminsRole::where(['admin_id'=>Auth::user()->id,'module'=>'siteSetting'])->first()->toArray();
            // dd($siteSettingModule);die;
        }
        return view('admin.setting', compact('detail','siteSettingModule'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules());
        $formInput = $request->except(['contactus_image', 'featured_trips_image', 'slogan_imagefirst','tripadvisor__image', 'slogan_imagesecond','whoweare_banner','sqt_image1','sqt_image2','ps_image1','ps_image2','privacy_policy_banner','travel_term_banner','travelStyle_image','classicVacation_image','aboutus_image','travelGuide_image','destination_banner_image']);
        $oldRecord = Setting::find($id);

        if ($request->hasFile('logo')) {
          if ($oldRecord->logo) {
            Storage::delete($oldRecord->logo);
          }
          $file = $request->logo;
          $filename = time() . '-logo.' . $file->getClientOriginalExtension();
          $path = $file->storeAs('public/setting', $filename);
          $formInput['logo'] = $path;
        }
        if ($request->hasFile('favicon')) {
          if ($oldRecord->favicon) {
            Storage::delete($oldRecord->favicon);
          }
          $file = $request->favicon;
          $filename = time() . '-favicon.' . $file->getClientOriginalExtension();
          $path = $file->storeAs('public/setting', $filename);
          $formInput['favicon'] = $path;
        }
        if ($request->hasFile('aboutus_side_image_home')) {
          if ($oldRecord->aboutus_side_image_home) {
            Storage::delete($oldRecord->aboutus_side_image_home);
          }
          $file = $request->aboutus_side_image_home;
          $filename = time() . '-aboutus_side_image_home.' . $file->getClientOriginalExtension();
          $path = $file->storeAs('public/setting', $filename);
          $formInput['aboutus_side_image_home'] = $path;
        }
        if ($request->hasFile('whoweare_banner')) {
          if ($oldRecord->whoweare_banner) {
            Storage::delete($oldRecord->whoweare_banner);
          }
          $file = $request->whoweare_banner;
          $filename = time() . '-whoweare_banner.' . $file->getClientOriginalExtension();
          $path = $file->storeAs('public/setting', $filename);
          $formInput['whoweare_banner'] = $path;
        }
        if ($request->hasFile('sqt_image1')) {
          if ($oldRecord->sqt_image1) {
            Storage::delete($oldRecord->sqt_image1);
          }
          $file = $request->sqt_image1;
          $filename = time() . '-sqt_image1.' . $file->getClientOriginalExtension();
          $path = $file->storeAs('public/setting', $filename);
          $formInput['sqt_image1'] = $path;
        }
        if ($request->hasFile('sqt_image2')) {
          if ($oldRecord->sqt_image2) {
            Storage::delete($oldRecord->sqt_image2);
          }
          $file = $request->sqt_image2;
          $filename = time() . '-sqt_image2.' . $file->getClientOriginalExtension();
          $path = $file->storeAs('public/setting', $filename);
          $formInput['sqt_image2'] = $path;
        }
        if ($request->hasFile('team_banner_image')) {
          if ($oldRecord->team_banner_image) {
            Storage::delete($oldRecord->team_banner_image);
          }
          $file = $request->team_banner_image;
          $filename = time() . '-team_banner_image.' . $file->getClientOriginalExtension();
          $path = $file->storeAs('public/setting', $filename);
          $formInput['team_banner_image'] = $path;
        }
        if ($request->hasFile('blog_banner')) {
          if ($oldRecord->blog_banner) {
            Storage::delete($oldRecord->blog_banner);
          }
          $file = $request->blog_banner;
          $filename = time() . '-blog_banner.' . $file->getClientOriginalExtension();
          $path = $file->storeAs('public/setting', $filename);
          $formInput['blog_banner'] = $path;
        }
        if ($request->hasFile('contactus_image')) {
          if ($oldRecord->contactus_image) {
            Storage::delete($oldRecord->contactus_image);
          }
          $file = $request->contactus_image;
          $filename = time() . '-contactus_image.' . $file->getClientOriginalExtension();
          $path = $file->storeAs('public/setting', $filename);
          $formInput['contactus_image'] = $path;
        }
        if ($request->hasFile('contactus_banner_image')) {
          if ($oldRecord->contactus_banner_image) {
            Storage::delete($oldRecord->contactus_banner_image);
          }
          $file = $request->contactus_banner_image;
          $filename = time() . '-contactus_banner_image.' . $file->getClientOriginalExtension();
          $path = $file->storeAs('public/setting', $filename);
          $formInput['contactus_banner_image'] = $path;
        }
        if ($request->hasFile('testimonial_banner_image')) {
          if ($oldRecord->testimonial_banner_image) {
            Storage::delete($oldRecord->testimonial_banner_image);
          }
          $file = $request->testimonial_banner_image;
          $filename = time() . '-testimonial_banner_image.' . $file->getClientOriginalExtension();
          $path = $file->storeAs('public/setting', $filename);
          $formInput['testimonial_banner_image'] = $path;
        }

        $oldRecord->update($formInput);
        return redirect()->back()->with('message', 'Setting Edited Successfuly.');
    }

    public function rules()
    {
        $rules = [
          'site_name' => 'required',
          'logo' => 'mimes:jpg,jpeg,png,gif|max:3048',
          'contactus_image' => 'mimes:jpg,jpeg,png,gif|max:3048',
          'featured_trips_image' => 'mimes:jpg,jpeg,png,gif|max:3048',
          'slogan_image' => 'mimes:jpg,jpeg,png,gif|max:3048',
        ];
        return $rules;
    }

    public function imageProcessing($image, $width, $height, $otherpath){

      $input['imagename'] = Date("D-h-i-s") . '-' . rand() . '-' . $image->getClientOriginalName();
      $thumbPath = public_path('images/thumbnail');
      $mainPath = public_path('images/main');
      $listingPath= public_path('images/listing');

      // if(is_null($height))
      // {
      //   $img = Image::make($image->getRealPath());
      //   $img->resize($width, null, function($constraint){
      //     $constraint->aspectRatio();
      //   })->save($mainPath.'/'.$input['imagename']);
      // } else {
        $img = Image::make($image->getRealPath());
        $img->resize($width, $height)->save($mainPath.'/'.$input['imagename']);
      // }

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
