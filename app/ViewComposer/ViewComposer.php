<?php
namespace App\ViewComposer;
use Illuminate\View\View;
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
use App\Models\Category;
use App\Models\Quote;

class ViewComposer {
	private $dashboard;

	public function __construct() {

	}
	public function compose(View $view) {
		$destination_types=Destinationtype::select('id','title','slug')->orderBy('created_at','asc')->get();
		$categories=Category::with('regions','packages')->publish()->orderBy('created_at','asc')->get();
		$settings=Setting::first();
		$destinations = Destination::with('destinationtype')->published()->take(5)->get();
		$luxurypackages=Package::select('package_name','slug')->where('luxury_package',1)->published()->orderBy('created_at','desc')->get();
		$whyWithUs=Whywithus::published()->get();
		$pages = Page::select('travel_guide','aboutus','title','slug')->published()->orderBy('created_at','asc')->get();
		$view->with([
			'dashboard_categories'=>$categories,
			'dashboard_destinations'=>$destinations,
			'dashboard_settings'=>$settings,
			'dashboard_destination_types'=>$destination_types,
			'dashboard_whyWithUs'=>$whyWithUs,
			'dashboard_luxurypackages'=>$luxurypackages,
			'dashboard_pages'=>$pages,
		]);
	}

}
