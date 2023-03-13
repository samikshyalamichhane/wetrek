<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Gallery;
use App\Models\Group;
use App\Models\Faq;
use App\Models\PackageFaq;
use App\Models\Package;
use App\Models\TourPackage;
use App\Models\AdventurePackage;
use App\Models\HelitourPackage;
use App\Models\NaturePackage;
use App\Models\Contactus;
use App\Models\Page;
use App\Models\Activity;
use PDF;
use App\Models\CostandDate;
use App\Models\TourCostandDate;
use App\Models\AdventurePackageCostandDate;
use App\Models\HelitourCostandDate;
use App\Models\NaturePackageCostandDate;
use App\Models\Booking;
use App\Models\TourBooking;
use App\Models\AdventureBooking;
use App\Models\HelitourBooking;
use App\Models\NatureBooking;
use App\Models\CustomizeTrip;

//CV
// use Illuminate\Support\Str;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Str;
use App\Models\Slider;
use App\Models\Whywithus;
use App\Models\Testimonial;
use App\Models\Travelersreview;
use App\Models\Blog;
use App\Models\Associate;
use App\Models\BookingForm;
use App\Models\Team;
use App\Models\Region;
use App\Models\Destination;
use App\Models\Destinationtype;
use App\Models\Travelstyle;
use App\Models\PackageReview;
use App\Models\Piller;
use Illuminate\Support\Collection;
use Mail;
use App\Mail\SubscriberRequest;
use App\Models\Category;
use App\Models\Galleryimage;
use App\Models\PackageEnquiry;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Rules\GoogleRecaptcha;


class HomeController extends Controller
{

  public $info;
  use ValidatesRequests;


  public function index()
  {
    $sliders = Slider::where('published', 1)->get();
    $aboutUs = Page::where('slug', 'about-us')->first();
    $bestSells = Package::select('package_name', 'slug', 'image', 'price', 'days_and_nights')->where('best_sells', 1)->published()->take(4)->get();
    $popularPackages = Package::select('package_name', 'slug', 'image', 'price', 'days_and_nights')->where('popular_package', 1)->published()->take(4)->get();
    $destinations = Destination::select('country_name', 'slug', 'banner_image')->published()->get();
    $blogs = Blog::published()->take(4)->get();
    $reviews = Travelersreview::published()->get();
    $associates = Associate::published()->get();
    $galleryImages = Galleryimage::take(6)->get();
    return view('front.index', compact('sliders', 'aboutUs', 'bestSells', 'popularPackages', 'destinations', 'blogs', 'reviews', 'associates', 'galleryImages'));
  }


  public function mail()
  {
    return view('front.mail');
  }

  //CV
  public function whoweare()
  {
    return view('front.whoweare');
  }

  public function whyus()
  {
    return view('front.whyus');
  }

  public function travelStyle()
  {
    return view('front.travelstyle');
  }

  public function travelGuide()
  {
    return view('front.travelGuide');
  }

  public function aboutus()
  {

    $pages = Page::where('slug', 'privacy-policy')->published()->orderBy('created_at', 'asc')->get();
    return view('front.aboutus', compact('pages'));
  }

  public function thankyou()
  {
    return view('front.thankyou');
  }


  public function destinationList()
  {
    $og['title'] = 'Destination Lists';
    return view('front.destinationList', $og);
  }

  public function teams()
  {
    $og['title'] = 'Team of WeTrek Nepal, Our Team,Best Trekking company in Nepal';
    $details = Team::published()->orderBy('position', 'asc')->get();
    return view('front.teams', compact('details', 'og'));
  }

  public function teamDetail($slug)
  {
    $details = Team::published()->whereSlug($slug)->first();
    return view('front.teamDetail', compact('details'));
  }

  //About-Us page - Privacy and policy page
  public static function dynamicPages($slug)
  {
    try {
      $detail = \App\Models\Page::published()->where('slug', $slug)->first();
      $og['title'] = $detail->page_title ?? $detail->title;
      $og['description'] = $detail->meta_description;
      $og['keywords'] = $detail->keywords;
      // $relatedDestination = Destination::published()->inRandomOrder()->take(3)->get();
      return view('front.pages.details', compact('detail', 'og'));
      die;
    } catch (\Exception $ae) {
      abort('404');
    }
  }

  public function blogList()
  {
    $details = Blog::published()->orderBy('updated_at', 'desc')->paginate(9);
    $relatedBlogs = Blog::published()->inRandomOrder()->orderBy('updated_at', 'desc')->take(5)->get();
    return view('front.blog.list', compact('details', 'relatedBlogs'));
  }

  public function blogDetails($slug)
  {
    $blog = Blog::published()->whereSlug($slug)->first();
    $og['title'] = $blog->page_title;
    $og['description'] = $blog->meta_description;
    $og['keywords'] = $blog->keyword;
    $relatedBlogs = Blog::published()->where('id', '!=', $blog->id)->inRandomOrder()->orderBy('updated_at', 'desc')->take(5)->get();
    return view('front.blog.details', compact('blog', 'relatedBlogs', 'og'));
  }

  public function pageDetail($slug)
  {
    $detail = Page::published()->whereSlug($slug)->first();
    $og['title'] = $detail->meta_title ?? $detail->title;
    $og['description'] = $detail->meta_description;
    $og['keywords'] = $detail->keyword;
    return view('front.footerLinkDetail', compact('detail', 'og'));
  }

  public function travelerReview()
  {
    $og['title'] = 'Travellers Review';
    $details = PackageReview::published()->orderBy('updated_at', 'desc')->paginate(14);
    return view('front.travelerReview', compact('details', 'og'));
  }


  //package details
  public static function packageDetails($package_slug)
  {
    $package = Package::published()->whereSlug($package_slug)->first();
    $og['title'] = $package->meta_title ?? $package->package_name;
    $og['description'] = $package->meta_description;
    $og['keywords'] = $package->keyword;
    return view('front.package.details', compact('package', 'og'));
    // return view('front.package.details', compact('packages', 'similarTrekkingPackage', 'otherPackage', 'og'));
  }


  //Showing the distance related all package
  public static function destinationCategoryDetail($slug)
  {

    $destinationType = Destinationtype::with('packages')->published()->whereSlug($slug)->first();
    $og['title'] = $destinationType->meta_title ?? $destinationType->title;
    $og['description'] = $destinationType->meta_description;
    $og['keywords'] = $destinationType->keyword;
    $destinationCategoryPackages = Package::where('destinationtype_id', $destinationType->id)->where('published', 1)->orderBy('updated_at', 'desc')->paginate(12);
    return view('front.destinationCategoryDetail', compact('destinationType', 'destinationCategoryPackages', 'og'));
  }

  public static function destinationCategoriesDetail($slug)
  {

    $destinationType = Category::with('regions')->where('published', 1)->where('slug', $slug)->first();
    $og['title'] = $destinationType->meta_title ?? $destinationType->title;
    $og['description'] = $destinationType->meta_description;
    $og['keywords'] = $destinationType->keyword;
    $destinationCategoryPackages = Package::where('destinationtype_id', $destinationType->id)->where('published', 1)->orderBy('updated_at', 'desc')->paginate(12);
    return view('front.categorydetail', compact('destinationType', 'destinationCategoryPackages', 'og'));
  }


  public static function destinationDetail($slug)
  {
    $destination = Destination::published()->whereSlug($slug)->first();
    $og['title'] = $destination->meta_title ?? $destination->country_name;
    $og['description'] = $destination->meta_description;
    $og['keywords'] = $destination->meta_keyword;
    $destinationType = Destinationtype::with('packages')->where('destination_id', $destination->id)->where('published', 1)->limit(6)->get();
    // $mountainTrekPackages = Destinationtype::with('packages')->where('destination_id', $destination->id)->where('published', 1)->limit(3)->get();

    // $popularTourPackages = Destinationtype::with('packages')->where('destination_id', $destination->id)->where('published', 1)->limit(3)->get();
    // $peakClimbingExpeditionsPackages = Destinationtype::with('packages')->where('destination_id', $destination->id)->where('published', 1)->limit(3)->get();
    // $adventureRoadTripPackages = Destinationtype::with('packages')->where('destination_id', $destination->id)->where('published', 1)->limit(3)->get();
    // dd($destinationType);

    return view('front.destinationDetail', compact('destinationType', 'destination', 'og'));
    // return view('front.destinationDetail', compact('destinationType', 'destination', 'mountainTrekPackages', 'popularTourPackages', 'peakClimbingExpeditionsPackages', 'adventureRoadTripPackages'));
  }

  public function destinationPackage($slug)
  {
    $destination = Destination::published()->whereSlug($slug)->first();
    $destinationPackages = Destinationtype::with('packages')->where('destination_id', $destination->id)->where('published', 1)->paginate(12);
    return view('front.destination.allDestinationPackage', compact('destination', 'destinationPackages'));
  }




  public function mountainTrekPackage($slug)
  {
    $destination = Destination::published()->whereSlug($slug)->first();
    $mountainTrekPackages = Destinationtype::with('packages')->where('destination_id', $destination->id)->where('published', 1)->paginate(12);
    // $mountainTrekPackages = Package::where('destination_id',$destination->id)->where('mountain_trek', 1)->where('published',1)->paginate(12);
    return view('front.destination.allmountainTrekPackage', compact('destination', 'mountainTrekPackages'));
  }

  public function popularTourPackage($slug)
  {
    $destination = Destination::published()->whereSlug($slug)->first();
    $popularTourPackages = Destinationtype::with('packages')->where('destination_id', $destination->id)->where('published', 1)->paginate(12);
    // $popularTourPackages = Package::where('destination_id',$destination->id)->where('popular_tours', 1)->where('published',1)->paginate(12);
    return view('front.destination.allpopularTourPackage', compact('destination', 'popularTourPackages'));
  }

  public function peakClimbingExpeditionsPackage($slug)
  {
    $destination = Destination::published()->whereSlug($slug)->first();
    $peakClimbingExpeditionsPackages = Destinationtype::with('packages')->where('destination_id', $destination->id)->where('published', 1)->paginate(12);
    // $peakClimbingExpeditionsPackages = Package::where('destination_id',$destination->id)->where('peak_climbing_expeditions', 1)->where('published',1)->paginate(12);
    return view('front.destination.allpeakClimbingExpeditionsPackage', compact('destination', 'peakClimbingExpeditionsPackages'));
  }

  public function adventureRoadTripPackage($slug)
  {
    $destination = Destination::published()->whereSlug($slug)->first();
    $adventureRoadTripPackages = Destinationtype::with('packages')->where('destination_id', $destination->id)->where('published', 1)->paginate(12);
    // $adventureRoadTripPackages = Package::where('destination_id',$destination->id)->where('adventure_road_trip', 1)->where('published',1)->paginate(12);
    return view('front.destination.alladventureRoadTripPackage', compact('destination', 'adventureRoadTripPackages'));
  }


  //all region related package listed is know as category
  public static function category($slug)
  {

    $region = Region::where('publish', 1)->whereSlug($slug)->first();
    $regionPackages = Package::where('region_id', $region->id)->where('published', 1)->orderBy('updated_at', 'desc')->paginate(12);
    // dd($regionPackages);
    return view('front.regionList', compact('region', 'regionPackages'));
  }


  //Showing the trave style related all package

  public function travelStyleDetail($slug)
  {
    $travelStyle = Travelstyle::published()->whereSlug($slug)->first();
    $og['title'] = $travelStyle->title;
    $travelStylePackages = $this->paginate($travelStyle->packages);
    return view('front.travelStyleDetail', compact('travelStyle', 'travelStylePackages', 'og'));
  }

  public function paginate($items, $perPage = 20, $page = null, $options = [])
  {
    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);
    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
  }


  // public function findAll()
  // {
  //    $title = request()->get('title');
  //    if ($title != null) {
  //       $searched = Package::latest()->published()
  //          ->where('package_name', 'like', '%' . $title . '%')
  //          ->get();
  //    }
  //    return view('front.searchPackage', compact('searched'));
  // }




  public function findAll()
  {
    // dd(request()->all());
    $title = request()->get('title');
    $trekkingPackageSearch = Package::latest()->published()
    ->whereHas('destinationtype', function ($q) {
      $q->where('destinationtype_id', request()->destinationtype_id);
    })
    ->orWhereHas('destinations', function ($q) {
      $q->where('destination_id', request()->destination_id);
    })
      ->where('days_and_nights', 'like', '%' . request()->days_and_nights . '%')
      ->where('destination_id', request()->destination_id )
      ->get();

    // dd($trekkingPackageSearch);

    // }
    return view('front.searchPackage', compact('trekkingPackageSearch', 'title'));
  }


  public function saveSubscribers(Request $request)
  {
    $request->validate([
      // 'first_name' => 'required',
      'email' => 'required',
    ]);
    $value = $request->all();
    $subscribe = \App\Models\Subscriber::create($value);
    // Mail::to('info@adventuremagictreks.com')->send(new SubscriberRequest($subscribe));
    return redirect()->route('thankyou')->with(['subscribe' => 'subscribe']);
  }


  public function contactUS()
  {
    //   $og['title']='Contact Us,Adventure Magic Treks';
    return view('front.contact');
  }


  public function saveEnquiry(Request $request)
  {
    $request->validate(
      [
        'name' => 'required',
        'email' => 'required',
        // 'how_found' => 'required',
        'message' => 'required',
        // 'g-recaptcha-response' => 'required',
      ]
      // , ['g-recaptcha-response.required' => 'The recaptcha field is required.']
    );
    // ]);

    if ($request->contactus) {
      $data = $request->except(['contactus', 'g-recaptcha-response']);
      $data['ip_address'] = request()->ip();
      $data['type'] = 'contactus';
      \App\Models\Contactus::create($data);

      $email = $request->email;
      // $messageData = [
      //   'name' => $data['name'],
      //   'email' => $data['email'],
      //   'number' => $data['number'],
      //   'travel_date' => $data['suitable_time'],
      //   'comment' => $data['message'],
      //   'how_found' => $data['how_found'],
      //   'ip_address' => $data['ip_address'],

      // ];

      // Mail::send('email.contact', $messageData, function ($message) use ($request, $email) {
      //   $message->to('info@adventuremagictreks.com');
      //   $message->from($email);
      //   $message->subject('Feedback Received');
      // });

      return redirect()->route('thankyou')->with(['contact' => 'contact']);
    }
  }


  public function specialPackageLists()
  {
    $classicVacations = Package::published()->where('special_package', '1')->orderBy('created_at', 'desc')->paginate(12);
    return view('front.classicVacationList', compact('classicVacations'));
  }



  public function searchOnKeyUp(Request $request)
  {
    $title = request()->get('title');

    if ($title != null) {
      $searched = Blog::published()
        ->orderBy('created_at', 'desc')
        ->where('title', 'LIKE', "%" . $title . "%")
        ->limit(5)->get();
    }
    return response()->json(['data' => $searched]);
  }





















































  //CV end





  // public function findAll()
  //  {
  //     // $advertisements = Advertisement::Published()
  //     //    ->where('place', 'left_sidebar')
  //     //    ->first();
  //     $title = request()->get('title');
  //     if ($title != null) {
  //        $trekkingPackageSearch = Package::latest()->published()
  //           ->where('package_name', 'like', '%' . $title . '%')
  //           // ->orWhere('description', 'like', '%' . $title . '%')
  //           // ->orWhere('accommodation', 'like', '%' . $title . '%')
  //           ->get();

  //           $tourPackageSearch = TourPackage::latest()->published()
  //           ->where('package_name', 'like', '%' . $title . '%')
  //           // ->orWhere('description', 'like', '%' . $title . '%')
  //           // ->orWhere('accommodation', 'like', '%' . $title . '%')
  //           ->get();

  //           $adventurePackageSearch = AdventurePackage::latest()->published()
  //           ->where('package_name', 'like', '%' . $title . '%')
  //           // ->orWhere('description', 'like', '%' . $title . '%')
  //           // ->orWhere('accommodation', 'like', '%' . $title . '%')
  //           ->get();

  //           $helitourPackageSearch = HelitourPackage::latest()->published()
  //           ->where('package_name', 'like', '%' . $title . '%')
  //           // ->orWhere('description', 'like', '%' . $title . '%')
  //           // ->orWhere('accommodation', 'like', '%' . $title . '%')
  //           ->get();

  //           $naturePackageSearch = NaturePackage::latest()->published()
  //           ->where('package_name', 'like', '%' . $title . '%')
  //           // ->orWhere('description', 'like', '%' . $title . '%')
  //           // ->orWhere('accommodation', 'like', '%' . $title . '%')
  //           ->get();

  //     $searched = $trekkingPackageSearch->concat($tourPackageSearch)->concat($adventurePackageSearch)->concat($helitourPackageSearch)->concat($naturePackageSearch);

  //     }
  //     return view('front.searchpage', compact('searched'));
  //  }




  //   public function searchDestination(Request $request)
  //   {
  //     //  dd($request->all());
  //       $activity = request()->get('activity');
  //       $destination =  request()->get('destination');
  //       // dd($destination);
  //       $duration =  request()->get('duration');
  //       $trekkingPackageSearch = Package::published()
  //          ->where('days_and_nights', 'LIKE', "%" . $duration . "%")

  //          ->orWhereHas('activity', function ($query) use ($activity) {
  //             $query->where('slug', 'like', '%' . $activity . '%');
  //          })
  //          ->orWhereHas('destination', function ($query) use ($destination) {
  //           $query->where('country_name', 'like', '%' . $destination . '%');
  //       })->get();

  //       $tourPackageSearch = TourPackage::published()
  //          ->where('days_and_nights', 'LIKE', "%" . $duration . "%")

  //          ->orWhereHas('activity', function ($query) use ($activity) {
  //             $query->where('slug', 'like', '%' . $activity . '%');
  //          })
  //          ->orWhereHas('destination', function ($query) use ($destination) {
  //           $query->where('country_name', 'like', '%' . $destination . '%');
  //       })->get();

  //       $adventurePackageSearch = AdventurePackage::published()
  //          ->where('days_and_nights', 'LIKE', "%" . $duration . "%")

  //          ->orWhereHas('activity', function ($query) use ($activity) {
  //             $query->where('slug', 'like', '%' . $activity . '%');
  //          })
  //          ->orWhereHas('destination', function ($query) use ($destination) {
  //           $query->where('country_name', 'like', '%' . $destination . '%');
  //       })->get();

  //       $helitourPackageSearch = HelitourPackage::published()
  //          ->where('days_and_nights', 'LIKE', "%" . $duration . "%")

  //          ->orWhereHas('activity', function ($query) use ($activity) {
  //             $query->where('slug', 'like', '%' . $activity . '%');
  //          })
  //          ->orWhereHas('destination', function ($query) use ($destination) {
  //           $query->where('country_name', 'like', '%' . $destination . '%');
  //       })->get();


  //       $naturePackageSearch = NaturePackage::published()
  //          ->where('days_and_nights', 'LIKE', "%" . $duration . "%")

  //          ->orWhereHas('activity', function ($query) use ($activity) {
  //             $query->where('slug', 'like', '%' . $activity . '%');
  //          })
  //          ->orWhereHas('destination', function ($query) use ($destination) {
  //           $query->where('country_name', 'like', '%' . $destination . '%');
  //       })->get();

  //       $searchPackage = $trekkingPackageSearch->concat($tourPackageSearch)->concat($adventurePackageSearch)->concat($helitourPackageSearch)->concat($naturePackageSearch);

  //         //  ->paginate(6);
  //         //  dd($searchPackage);
  //       return view('front.searchpage', compact('searchPackage'));
  //   }



  //Tour package details
  public function tourPackageDetails($slug)
  {
    try {
      $tourPackage = TourPackage::published()->whereSlug($slug)->first();
      // dd($tourPackage);
      $og['title'] = $tourPackage->meta_title;
      $og['description'] = $tourPackage->meta_description;
      $og['keywords'] = $tourPackage->keyword;

      if (is_null(@$tourPackage)) {
        abort('404');
      } else {
        $similarTourPackage = Activity::findorfail($tourPackage->activity_id)->tourpackages()->where('id', '!=', $tourPackage->id)->published()->take(4)->get();
        // dd($similarTourPackage);
        //if similar package is null then random will be passed to view
        if (@$similarTourPackage->count() == 0) {
          $similarTourPackage = TourPackage::published()->inRandomOrder()->take(4)->get();
          // dd($similarTourPackage);

        }
        $otherPackage = TourPackage::published()->inRandomOrder()->take(3)->get();
        return view('front.package.tour_package_details', compact('tourPackage', 'similarTourPackage', 'otherPackage', 'og'));
      }
    } catch (\Exception $e) {
      abort('404');
    }
  }

  //Adventure Package Details
  public function adventurePackageDetails($slug)
  {
    try {
      $adventurePackage = AdventurePackage::published()->whereSlug($slug)->first();
      // dd($adventurePackage);
      $og['title'] = $adventurePackage->meta_title;
      $og['description'] = $adventurePackage->meta_description;
      $og['keywords'] = $adventurePackage->keyword;

      if (is_null(@$adventurePackage)) {
        abort('404');
      } else {
        $similarAdventurePackage = Activity::findorfail($adventurePackage->activity_id)->adventurepackages()->where('id', '!=', $adventurePackage->id)->published()->take(4)->get();
        // dd($similarAdventurePackage);
        //if similar package is null then random will be passed to view
        if (@$similarAdventurePackage->count() == 0) {
          $similarAdventurePackage = AdventurePackage::published()->inRandomOrder()->take(4)->get();
          // dd($similarAdventurePackage);

        }
        $otherPackage = AdventurePackage::published()->inRandomOrder()->take(3)->get();
        return view('front.package.adventure_package_details', compact('adventurePackage', 'similarAdventurePackage', 'otherPackage', 'og'));
      }
    } catch (\Exception $e) {
      abort('404');
    }
  }

  //Heli Tour Package Details
  public function helitourPackageDetails($slug)
  {
    try {
      $helitourPackage = HelitourPackage::published()->whereSlug($slug)->first();
      // dd($helitourPackage);
      $og['title'] = $helitourPackage->meta_title;
      $og['description'] = $helitourPackage->meta_description;
      $og['keywords'] = $helitourPackage->keyword;

      if (is_null(@$helitourPackage)) {
        abort('404');
      } else {
        $similarHelitourPackage = Activity::findorfail($helitourPackage->activity_id)->helitourpackages()->where('id', '!=', $helitourPackage->id)->published()->take(4)->get();
        // dd($similarHelitourPackage);
        //if similar package is null then random will be passed to view
        if (@$similarHelitourPackage->count() == 0) {
          $similarHelitourPackage = HelitourPackage::published()->inRandomOrder()->take(4)->get();
          // dd($similarHelitourPackage);

        }
        $otherPackage = HelitourPackage::published()->inRandomOrder()->take(3)->get();
        return view('front.package.helitour_package_details', compact('helitourPackage', 'similarHelitourPackage', 'otherPackage', 'og'));
      }
    } catch (\Exception $e) {
      abort('404');
    }
  }
  //Nature and Wildlife Tour Package Details
  public function naturePackageDetails($slug)
  {
    try {
      $naturePackage = NaturePackage::published()->whereSlug($slug)->first();
      // dd($naturePackage);
      $og['title'] = $naturePackage->meta_title;
      $og['description'] = $naturePackage->meta_description;
      $og['keywords'] = $naturePackage->keyword;

      if (is_null(@$naturePackage)) {
        abort('404');
      } else {
        $similarNaturePackage = Activity::findorfail($naturePackage->activity_id)->naturepackages()->where('id', '!=', $naturePackage->id)->published()->take(4)->get();
        // dd($similarNaturePackage);
        //if similar package is null then random will be passed to view
        if (@$similarNaturePackage->count() == 0) {
          $similarNaturePackage = NaturePackage::published()->inRandomOrder()->take(4)->get();
          // dd($similarNaturePackage);

        }
        $otherPackage = NaturePackage::published()->inRandomOrder()->take(3)->get();
        return view('front.package.nature_and_wildlife_package_details', compact('naturePackage', 'similarNaturePackage', 'otherPackage', 'og'));
      }
    } catch (\Exception $e) {
      abort('404');
    }
  }




  public function destinationCountry($slug)
  {
    try {
      $destination = Destination::where('slug', $slug)->firstOrFail();
      $trekkingPackages = Package::where('destination_id', $destination->id)->where('published', 1)->paginate(9);
      $tourPackages = TourPackage::where('destination_id', $destination->id)->where('published', 1)->paginate(9);
      $adventurePackages = AdventurePackage::where('destination_id', $destination->id)->where('published', 1)->paginate(9);
      $helitourPackages = HelitourPackage::where('destination_id', $destination->id)->where('published', 1)->paginate(9);
      $naturePackages = NaturePackage::where('destination_id', $destination->id)->where('published', 1)->paginate(9);
      $destinationPackages = $trekkingPackages->concat($tourPackages)->concat($adventurePackages)->concat($helitourPackages)->concat($naturePackages);
      // dd($naturePackages);
      return view('front.package.destination_list', compact('destination', 'destinationPackages'));
    } catch (\Exception $e) {
      abort('404');
    }
  }



  //Not used
  public function galleryList()
  {

    try {
      $details = Gallery::published()->orderBy('updated_at', 'desc')->paginate(6);
      $bannerGallery = Gallery::published()->inRandomOrder()->first();
      if (!is_null($bannerGallery)) {
        $bannerImage = $bannerGallery->imagegallery()->inRandomOrder()->first();
      }
      return view('front.gallery.list', compact('details', 'bannerImage'));
    } catch (\Exception $e) {
      abort('404');
    }
  }
  //Not Used
  public function galleryDetails($slug)
  {

    try {
      $details = Gallery::published()->whereSlug($slug)->with('imagegallery')->first();
      $og['title'] = $details->meta_title;
      $og['description'] = $details->meta_description;
      $og['keywords'] = $details->keyword;
      $galleryImages = $details->imagegallery;
      $bannerImage = $details->imagegallery()->inRandomOrder()->first();

      return view('front.gallery.details', compact('galleryImages', 'details', 'bannerImage', 'og'));
    } catch (\Exception $e) {
      abort('404');
    }
  }

  //Not Use
  public function testimonial()
  {

    $details = Testimonial::published()->orderBy('updated_at', 'desc')->take(10)->get();
    return view('front.testimonials', compact('details'));
  }



  public function packageBook($id)
  {
    try {
      $costanddate = CostandDate::with('package')->where('id', $id)->first();
      return view('front.booking.package', compact('costanddate'));
    } catch (\Exception $e) {
      abort('404');
    }
  }

  public function bookTourPackage($id)
  {
    try {
      $tourcostanddate = TourCostandDate::with('tourpackage')->where('id', $id)->first();
      return view('front.booking.tourpackage', compact('tourcostanddate'));
    } catch (\Exception $e) {
      abort('404');
    }
  }

  public function bookAdventurePackage($id)
  {
    try {
      $adventurecostanddate = AdventurePackageCostandDate::with('adventurepackage')->where('id', $id)->first();
      return view('front.booking.adventurepackage', compact('adventurecostanddate'));
    } catch (\Exception $e) {
      abort('404');
    }
  }

  public function bookHelitourPackage($id)
  {
    try {
      $helitourcostanddate = HelitourCostandDate::with('helitourpackage')->where('id', $id)->first();
      return view('front.booking.helitourpackage', compact('helitourcostanddate'));
    } catch (\Exception $e) {
      abort('404');
    }
  }

  public function bookNaturePackage($id)
  {
    try {
      $naturecostanddate = NaturePackageCostandDate::with('naturepackage')->where('id', $id)->first();
      return view('front.booking.naturepackage', compact('naturecostanddate'));
    } catch (\Exception $e) {
      abort('404');
    }
  }


  public function savePackageBooking(Request $request, $id)
  {
    // dd($request->all());

    $request->validate([
      'full_name' => 'required',
      'email' => 'required',
      'country' => 'required',
      'contact_no' => 'required',
      'emergency_contact_number' => 'required',
      'number_of_person' => 'required',
      'agree_terms_condition' => 'required',
    ]);

    $data = $request->except(['costanddate_id', 'agree_terms_condition']);
    // dd($data);
    $data['agree_terms_condition'] = is_null($request->agree_terms_condition) ? 0 : 1;
    $data['costanddate_id'] = $id;
    $data['type'] = 'PackageBooking';
    $status = Booking::create($data);
    // return redirect()->back()->with('message', 'Package Booked Successfully.');
    return redirect()->route('indexHome')->with('message', 'Package Booked Successfully.');
  }

  public function saveTourPackageBooking(Request $request, $id)
  {
    $request->validate([
      'full_name' => 'required',
      'email' => 'required',
      'country' => 'required',
      'contact_no' => 'required',
      'emergency_contact_number' => 'required',
      'number_of_person' => 'required',
      'agree_terms_condition' => 'required',
    ]);

    $data = $request->except(['tourcostanddate_id', 'agree_terms_condition']);
    $data['agree_terms_condition'] = is_null($request->agree_terms_condition) ? 0 : 1;
    $data['tourcostanddate_id'] = $id;
    $data['type'] = 'TourPackageBooking';
    // dd($data);
    $status = TourBooking::create($data);
    return redirect()->back()->with('message', 'Tour Package Booked Successfully.');
  }

  public function saveAdventurePackageBooking(Request $request, $id)
  {
    $request->validate([
      'full_name' => 'required',
      'email' => 'required',
      'country' => 'required',
      'contact_no' => 'required',
      'emergency_contact_number' => 'required',
      'number_of_person' => 'required',
      'agree_terms_condition' => 'required',
    ]);

    $data = $request->except(['adventurepackagecostanddate_id', 'agree_terms_condition']);
    $data['agree_terms_condition'] = is_null($request->agree_terms_condition) ? 0 : 1;
    $data['adventurepackagecostanddate_id'] = $id;
    $data['type'] = 'AdventurePackageBooking';
    // dd($data);
    $status = AdventureBooking::create($data);
    return redirect()->back()->with('message', 'Adventure Package Booked Successfully.');
  }


  public function saveHelitourPackageBooking(Request $request, $id)
  {
    $request->validate([
      'full_name' => 'required',
      'email' => 'required',
      'country' => 'required',
      'contact_no' => 'required',
      'emergency_contact_number' => 'required',
      'number_of_person' => 'required',
      'agree_terms_condition' => 'required',
    ]);

    $data = $request->except(['helitourcostanddate_id', 'agree_terms_condition']);
    $data['agree_terms_condition'] = is_null($request->agree_terms_condition) ? 0 : 1;
    $data['helitourcostanddate_id'] = $id;
    $data['type'] = 'HelitourPackageBooking';
    // dd($data);
    $status = HelitourBooking::create($data);
    return redirect()->back()->with('message', 'Helitour Package Booked Successfully.');
  }

  public function saveNaturePackageBooking(Request $request, $id)
  {
    $request->validate([
      'full_name' => 'required',
      'email' => 'required',
      'country' => 'required',
      'contact_no' => 'required',
      'emergency_contact_number' => 'required',
      'number_of_person' => 'required',
      'agree_terms_condition' => 'required',
    ]);

    $data = $request->except(['naturepackagecostanddate_id', 'agree_terms_condition']);
    $data['agree_terms_condition'] = is_null($request->agree_terms_condition) ? 0 : 1;
    $data['naturepackagecostanddate_id'] = $id;
    $data['type'] = 'NaturePackageBooking';
    // dd($data);
    $status = NatureBooking::create($data);
    return redirect()->back()->with('message', 'Nature and Wildlife Package Booked Successfully.');
  }


  public function packageEnquiry(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required',
      'message1' => 'required',
      'phone' => 'required',
      'how_found' => 'required',
      'nationality' => 'required',
    ]);
    $formInput = $request->all();
    $formInput['ip_address'] = request()->ip();
    PackageEnquiry::create($formInput);
    return redirect()->back()->with('message', 'Form Submitted Successfuly.');
  }

  public function faq()
  {
    // $faqs = Faq::get();
    $faqs = Faq::published()->get();

    return view('front.faq', compact('faqs'));
  }

  // public function pdfStream(Request $request, $id){
  //   $details = Package::find($id);
  //   $data["info"] = $details;
  //   $pdf = PDF::loadView('front.package.details', compact('details'))->setOptions(['defaultFont' => 'sans-serif']);
  //   return $pdf->stream('package.pdf');
  // }


  public function populartours()
  {
    // $PopularToursPackage = Package::published()->populartours()->orderBy('updated_at', 'desc')->paginate(9);
    // FIND OUR POPULAR TOOLS
    $trekkingPackage = Package::published()->populartours()->orderBy('updated_at', 'desc')->get();
    $toursPackage = TourPackage::published()->populartours()->orderBy('updated_at', 'desc')->get();
    $adventurePackage = AdventurePackage::published()->populartours()->orderBy('updated_at', 'desc')->get();
    $helitourPackage = HelitourPackage::published()->populartours()->orderBy('updated_at', 'desc')->get();
    $naturePackage = NaturePackage::published()->populartours()->orderBy('updated_at', 'desc')->get();
    $popularPackage = $trekkingPackage->concat($toursPackage)->concat($adventurePackage)->concat($helitourPackage)->concat($naturePackage);
    // dd($popularPackage);
    return view('front.package.popular_tour_list', compact('popularPackage'));
  }


  public function popularPackageDetails($slug)
  {
    // dd($slug);
    $trekkingandhikingPackage = Package::where('slug', $slug)->first();
    $tourPackage = TourPackage::where('slug', $slug)->first();
    $adventurePackage = AdventurePackage::where('slug', $slug)->first();
    $helitourPackage = HelitourPackage::where('slug', $slug)->first();
    $naturePackage = NaturePackage::where('slug', $slug)->first();

    if ($trekkingandhikingPackage) {
      $similarTrekkingPackage = Activity::findorfail($trekkingandhikingPackage->activity_id)->packages()->where('id', '!=', $trekkingandhikingPackage->id)->take(4)->get();
      $otherPackage = Package::published()->inRandomOrder()->take(3)->get();
      return view('front.package.details', compact('trekkingandhikingPackage', 'similarTrekkingPackage', 'otherPackage'));
    } else if ($tourPackage) {
      $similarTourPackage = Activity::findorfail($tourPackage->activity_id)->tourpackages()->where('id', '!=', $tourPackage->id)->take(4)->get();
      $otherPackage = TourPackage::published()->inRandomOrder()->take(3)->get();
      return view('front.package.tour_package_details', compact('tourPackage', 'similarTourPackage', 'otherPackage'));
    } else if ($adventurePackage) {
      $similarAdventurePackage = Activity::findorfail($adventurePackage->activity_id)->adventurepackages()->where('id', '!=', $adventurePackage->id)->take(4)->get();
      $otherPackage = AdventurePackage::published()->inRandomOrder()->take(3)->get();
      return view('front.package.adventure_package_details', compact('adventurePackage', 'similarAdventurePackage', 'otherPackage'));
    } else if ($helitourPackage) {
      $similarHelitourPackage = Activity::findorfail($helitourPackage->activity_id)->helitourpackages()->where('id', '!=', $helitourPackage->id)->take(4)->get();
      $otherPackage = HelitourPackage::published()->inRandomOrder()->take(3)->get();
      return view('front.package.helitour_package_details', compact('helitourPackage', 'similarHelitourPackage', 'otherPackage'));
    } else if ($naturePackage) {
      $similarNaturePackage = Activity::findorfail($naturePackage->activity_id)->naturepackages()->where('id', '!=', $naturePackage->id)->take(4)->get();
      $otherPackage = NaturePackage::published()->inRandomOrder()->take(3)->get();
      return view('front.package.nature_and_wildlife_package_details', compact('naturePackage', 'similarNaturePackage', 'otherPackage'));
    }
  }

  //Package Inquire
  public function packageInquire($slug)
  {
    try {
      $data['trekkingPackage'] = $pack = Package::published()->whereSlug($slug)->first();
      return view('front.booking.inquire.package_inquire', $data);
    } catch (\Exception $e) {
      abort('404');
    }
  }

  public function tourPackageInquire($slug)
  {
    try {
      $data['tourPackage'] = $pack = TourPackage::published()->whereSlug($slug)->first();
      return view('front.booking.inquire.tour_package_inquire', $data);
    } catch (\Exception $e) {
      abort('404');
    }
  }

  public function adventurePackageInquire($slug)
  {
    try {
      $data['adventurePackage'] = $pack = AdventurePackage::published()->whereSlug($slug)->first();
      return view('front.booking.inquire.adventure_package_inquire', $data);
    } catch (\Exception $e) {
      abort('404');
    }
  }


  public function helitourPackageInquire($slug)
  {
    try {
      $data['helitourPackage'] = $pack = HelitourPackage::published()->whereSlug($slug)->first();
      return view('front.booking.inquire.helitour_package_inquire', $data);
    } catch (\Exception $e) {
      abort('404');
    }
  }


  public function naturePackageInquire($slug)
  {
    try {
      $data['naturePackage'] = $pack = NaturePackage::published()->whereSlug($slug)->first();
      return view('front.booking.inquire.nature_package_inquire', $data);
    } catch (\Exception $e) {
      abort('404');
    }
  }


  public function savePackageInquire(Request $request, $id)
  {
    $request->validate([
      'departure_date' => 'required',
      'full_name' => 'required',
      'email' => 'required',
      'country' => 'required',
      'contact_no' => 'required',
    ]);

    $data = $request->except(['package_id']);
    // dd($data);

    $data['package_id'] = $id;
    $data['type'] = 'PackageInquire';

    $status = Booking::create($data);
    return redirect()->back()->with('message', 'Package Inquire send Successfully.');
  }

  public function saveTourPackageInquire(Request $request, $id)
  {
    $request->validate([
      'departure_date' => 'required',
      'full_name' => 'required',
      'email' => 'required',
      'country' => 'required',
      'contact_no' => 'required',
    ]);

    $data = $request->except(['tourpackage_id']);
    // dd($data);

    $data['tourpackage_id'] = $id;
    $data['type'] = 'TourPackageInquire';
    $status = TourBooking::create($data);
    return redirect()->back()->with('message', 'Tour Package Inquire send Successfully.');
  }


  public function saveAdventurePackageInquire(Request $request, $id)
  {
    $request->validate([
      'departure_date' => 'required',
      'full_name' => 'required',
      'email' => 'required',
      'country' => 'required',
      'contact_no' => 'required',
    ]);

    $data = $request->except(['adventurepackage_id']);
    // dd($data);

    $data['adventurepackage_id'] = $id;
    $data['type'] = 'AdventurePackageInquire';
    $status = AdventureBooking::create($data);
    return redirect()->back()->with('message', 'Adventure Package Inquire send Successfully.');
  }


  public function saveHelitourPackageInquire(Request $request, $id)
  {
    $request->validate([
      'departure_date' => 'required',
      'full_name' => 'required',
      'email' => 'required',
      'country' => 'required',
      'contact_no' => 'required',
    ]);

    $data = $request->except(['helitourpackage_id']);
    // dd($data);

    $data['helitourpackage_id'] = $id;
    $data['type'] = 'HelitourPackageInquire';
    $status = HelitourBooking::create($data);
    return redirect()->back()->with('message', 'Helitour Package Inquire send Successfully.');
  }


  public function saveNaturePackageInquire(Request $request, $id)
  {
    $request->validate([
      'departure_date' => 'required',
      'full_name' => 'required',
      'email' => 'required',
      'country' => 'required',
      'contact_no' => 'required',
    ]);

    $data = $request->except(['naturepackage_id']);
    // dd($data);

    $data['naturepackage_id'] = $id;
    $data['type'] = 'NaturePackageInquire';
    $status = NatureBooking::create($data);
    return redirect()->back()->with('message', 'Nature And Wildlife Package Inquire send Successfully.');
  }



  //Treking and hikking booking price increase
  public function trekkingBookingPrice(Request $request)
  {
    // dd($request->all());
    $totalPrice = Costanddate::where('id', $request->trekking_package_vendorid)->first();
    $trekking_booking_price = $totalPrice->cad_discount_price * $request->qty;
    return response()->json(['status' => 'trekking_price_successful', 'message' => 'Price Updated Successfully.', 'data' => $trekking_booking_price]);
    // dd($price);
  }

  //Tour booking price increase
  public function tourBookingPrice(Request $request)
  {
    // dd($request->all());
    $totalPrice = TourCostandDate::where('id', $request->vendorid)->first();
    $price = $totalPrice->cad_discount_price * $request->qty;
    return response()->json(['status' => 'successful', 'message' => 'Price Updated Successfully.', 'data' => $price]);
    // dd($price);
  }

  //Adventure booking price increase
  public function adventureBookingPrice(Request $request)
  {
    // dd($request->all());
    $totalPrice = AdventurePackageCostandDate::where('id', $request->vendorid)->first();
    $price = $totalPrice->cad_discount_price * $request->qty;
    return response()->json(['status' => 'successful', 'message' => 'Price Updated Successfully.', 'data' => $price]);
    // dd($price);
  }

  //HeliTour booking price increase
  public function helitourBookingPrice(Request $request)
  {
    // dd($request->all());
    $totalPrice = HelitourCostandDate::where('id', $request->vendorid)->first();
    $price = $totalPrice->cad_discount_price * $request->qty;
    return response()->json(['status' => 'successful', 'message' => 'Price Updated Successfully.', 'data' => $price]);
    // dd($price);
  }

  //Nature booking price increase
  public function natureBookingPrice(Request $request)
  {
    // dd($request->all());
    $totalPrice = NaturePackageCostandDate::where('id', $request->vendorid)->first();
    $price = $totalPrice->cad_discount_price * $request->qty;
    return response()->json(['status' => 'successful', 'message' => 'Price Updated Successfully.', 'data' => $price]);
    // dd($price);
  }

  public function customizeTrip()
  {
    $trekkingPackage = Package::published()->orderBy('updated_at', 'desc')->get();
    $toursPackage = TourPackage::published()->orderBy('updated_at', 'desc')->get();
    $adventurePackage = AdventurePackage::published()->orderBy('updated_at', 'desc')->get();
    $helitourPackage = HelitourPackage::published()->orderBy('updated_at', 'desc')->get();
    $naturePackage = NaturePackage::published()->orderBy('updated_at', 'desc')->get();
    $Packages = $trekkingPackage->concat($toursPackage)->concat($adventurePackage)->concat($helitourPackage)->concat($naturePackage);
    // dd($Packages);
    return view('front.customize_trip', compact('Packages'));
  }


  public function customizeTripBooking(Request $request)
  {
    $request->validate([
      'package_name' => 'required',
      'accommodation_category' => 'required',
      'arrival_date' => 'required',
      'name' => 'required',
      'email' => 'required',
      'country' => 'required',
      'contact_no' => 'required',
    ]);

    $data = $request->all();
    // dd($data);
    $data['type'] = 'CustomizeTrip';
    $status = CustomizeTrip::create($data);
    return redirect()->back()->with('message', 'Customized Trip send Successfully.');
  }

  public function bookingForm()
  {
    return view('front.booking.bookingform');
  }
}
