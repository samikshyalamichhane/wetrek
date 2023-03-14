<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dashboard;
use App\Models\Destinationtype;
use App\Models\Region;
use App\Models\Destination;
use App\Models\Package;
use App\Models\Group;
use App\Models\Activity;
use App\Models\Blog;
use App\Models\Booking;
use App\Models\Setting;
use App\Models\Subscriber;
use App\Models\History;
use App\Models\Associate;
use App\Models\Tour;
use App\Models\Adventure;
use App\Models\TourPackage;
use App\Models\AdventurePackage;
use App\Models\HelitourPackage;
use App\Models\NaturePackage;
use App\Models\Travelstyle;
use App\Models\Whywithus;
use App\Models\Piller;
use App\Models\Page;
use App\Models\Contactus;
use App\Models\BookingForm;
use App\Models\PackageEnquiry;
use App\Models\Quote;
use Image;

class DashboardController extends Controller
{
    public function index()
    {
        $detail = Dashboard::first();
    $packages = Package::published()->get();
		$destination_types=Destinationtype::orderBy('created_at','desc')->get();
		$regions=Region::publish()->orderBy('created_at','asc')->get();
		$settings=Setting::first();
		// dd($settings);
		$destinations = Destination::published()->orderBy('created_at','desc')->take(5)->get();
		$packages=Package::published()->orderBy('created_at','desc')->get();
		$blogs= Blog::get();
		$subscribers= Subscriber::get();
		$groups=Group::orderBy('created_at','asc')->take(2)->get();
		$activitys=Activity::orderBy('created_at','asc')->take(2)->get();
		$bookings=Booking::orderBy('created_at','desc')->take(5)->get();
		$historys=History::published()->orderBy('created_at','asc')->take(5)->get();
		$associates=Associate::published()->orderBy('created_at','asc')->get();
		$travelwithus = Whywithus::published()->orderBy('updated_at', 'desc')->get();
		$travelwithusAboutusPage = Whywithus::published()->whereNotNull('description')->orderBy('updated_at', 'desc')->get();
		$footerLink = Piller::orderBy('created_at','desc')->get();
		$pages = Page::where('slug','!=','privacy-policy')->Where('slug','!=','travels-term')->published()->orderBy('created_at','asc')->get();
		$contactMessage = Contactus::orderBy('updated_at', 'desc')->get();
		$footer_dest = Destination::with('destinationtype')->where('slug','nepal')->first();
		$bookingLists = BookingForm::with('costanddate','package')->latest()->get();
		$quoteLists = PackageEnquiry::latest()->get();
    return view('admin.dashboard')->with([
			'dashboard_subscriber'=>$subscribers,
			'dashboard_associates'=>$associates,
			'dashboard_historys'=>$historys,
			'dashboard_booking'=>$bookings,
			'dashboard_blogs'=>$blogs,
			'dashboard_regions'=>$regions,
			'dashboard_destination_types'=>$destination_types,
			'dashboard_settings'=>$settings,
			'dashboard_activitys'=>$activitys,
			'dashboard_groups'=>$groups,
			'dashboard_packages'=>$packages,
			'dashboard_destinations'=>$destinations,
			'dashboard_travelwithus'=>$travelwithus,
			'dashboard_travelwithusAboutusPage'=>$travelwithusAboutusPage,
			'dashboard_footerLink'=>$footerLink,
			'dashboard_pages'=>$pages,
			'dashboard_contactMessage'=>$contactMessage,
			'footer_dest'=>$footer_dest,
			'dashboard_bookingLists'=>$bookingLists,
			'dashboard_quoteLists'=>$quoteLists
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort('404');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
      $this->validate($request, $this->rules());
      $formInput = $request->except(['logo', 'contactus_image', 'featured_trips_image', 'slogan_imagefirst', 'slogan_imagesecond', 'tripadvisor__image']);
      $record = Dashboard::find($id);

      if($request->hasFile('logo')){
        if($record->logo)
          $this->unlinkImage($record->logo);
        list($width, $height) = getimagesize($request->file('logo')->getRealPath());
        $formInput['logo'] = $this->imageProcessing($request->file('logo'),$width,$height, 'no');
      }

      if($request->hasFile('favicon')){
        if($record->favicon)
          $this->unlinkImage($record->favicon);
        list($width, $height) = getimagesize($request->file('favicon')->getRealPath());
        $formInput['favicon'] = $this->imageProcessing($request->file('favicon'),$width,$height, 'no');
      }

      if($request->hasFile('contactus_image')){
        if($record->contactus_image)
            $this->unlinkImage($record->contactus_image);
        $formInput['contactus_image'] = $this->imageProcessing($request->contactus_image, 1349, 354, 'no');
      }

      if($request->hasFile('team_banner_image')){
        if($record->team_banner_image)
            $this->unlinkImage($record->team_banner_image);
        $formInput['team_banner_image'] = $this->imageProcessing($request->team_banner_image, 1349, 354, 'no');
      }

      if($request->hasFile('testimonial_banner_image')){
        if($record->testimonial_banner_image)
            $this->unlinkImage($record->testimonial_banner_image);
        $formInput['testimonial_banner_image'] = $this->imageProcessing($request->testimonial_banner_image, 1349, 354, 'no');
      }

      if($request->hasFile('featured_trips_image')){
        if($record->featured_trips_image)
            $this->unlinkImage($record->featured_trips_image);
        $formInput['featured_trips_image'] = $this->imageProcessing($request->featured_trips_image, 1346, 547, 'no');
      }

      if($request->hasFile('slogan_imagefirst')){
        if($record->slogan_imagefirst)
            $this->unlinkImage($record->slogan_imagefirst);
        $formInput['slogan_imagefirst'] = $this->imageProcessing($request->slogan_imagefirst, 1349, 384, 'no');
      }

      if($request->hasFile('slogan_imagesecond')){
        if($record->slogan_imagesecond)
            $this->unlinkImage($record->slogan_imagesecond);
        $formInput['slogan_imagesecond'] = $this->imageProcessing($request->slogan_imagesecond, 1349, 384, 'no');
      }

      if($request->hasFile('latest_video_backgroundimage')){
        if($record->latest_video_backgroundimage)
            $this->unlinkImage($record->latest_video_backgroundimage);
        $formInput['latest_video_backgroundimage'] = $this->imageProcessing($request->latest_video_backgroundimage, 1347, 578, 'no');
      }
      
       if ($request->hasFile('tripadvisor__image')) {
            if ($record->tripadvisor__image) {
                $this->unlinkImage($record->tripadvisor__image);
            }
            list($width, $height) = getimagesize($request->file('tripadvisor__image')->getRealPath());
            $formInput['tripadvisor__image'] = $this->imageProcessing($request->tripadvisor__image, $width, $height, 'no');
        }

      $record->update($formInput);
      return redirect()->back()->with('message', 'Dashboard Edited Successfuly.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
