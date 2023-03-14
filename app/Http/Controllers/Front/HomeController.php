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
use App\Models\CustomizeTrip;
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
use App\Models\PackageReview;
use Illuminate\Support\Collection;
use Mail;
use App\Mail\SubscriberRequest;
use App\Models\Category;
use App\Models\Galleryimage;
use App\Models\PackageEnquiry;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use SEOMeta;
use OpenGraph;
use App\Rules\GoogleRecaptcha;

class HomeController extends Controller
{
  public $info;
  use ValidatesRequests;
  public function __construct()
  {
    $this->info = Setting::first();
  }
  public function index()
  {

    SEOMeta::setTitle($this->info->meta_title ? $this->info->meta_title : $this->info->site_name);
    SEOMeta::setDescription($this->info->meta_description);
    SEOMeta::setCanonical($this->info->canonical_url);
    // SEOMeta::addMeta('article:published_time', $about->created_at->toW3CString(), 'property');
    SEOMeta::addKeyword($this->info->keyword);
    OpenGraph::setDescription($this->info->description);
    OpenGraph::setTitle($this->info->meta_title ? $this->info->meta_title : $this->info->site_name);
    OpenGraph::setUrl($this->info->canonical_url);
    OpenGraph::addProperty('type', 'articles');
    $sliders = Slider::where('published', 1)->get();
    $aboutUs = Page::where('slug', 'about-us')->first();
    $bestSells = Package::select('package_name', 'slug', 'image', 'price', 'days_and_nights')->where('best_sells', 1)->published()->take(6)->get();
    $popularPackages = Package::select('package_name', 'slug', 'image', 'price', 'days_and_nights')->where('popular_package', 1)->published()->take(6)->get();
    $destinations = Destination::select('country_name', 'slug', 'banner_image')->published()->get();
    $blogs = Blog::published()->take(4)->get();
    $reviews = Travelersreview::published()->get();
    $associates = Associate::published()->get();
    $galleryImages = Galleryimage::take(6)->get();
    return view('front.index', compact('sliders', 'aboutUs', 'bestSells', 'popularPackages', 'destinations', 'blogs', 'reviews', 'associates', 'galleryImages'));
  }

  //CV
  public function whoweare()
  {
    SEOMeta::setTitle('We Trek|Who We Are');
    SEOMeta::setDescription($this->info->meta_description);
    SEOMeta::setCanonical($this->info->canonical_url);
    // SEOMeta::addMeta('article:published_time', $about->created_at->toW3CString(), 'property');
    SEOMeta::addKeyword($this->info->keyword);
    OpenGraph::setDescription($this->info->description);
    OpenGraph::setTitle($this->info->meta_title ? $this->info->meta_title : $this->info->site_name);
    OpenGraph::setUrl($this->info->canonical_url);
    OpenGraph::addProperty('type', 'articles');
    return view('front.whoweare');
  }

  public function aboutus()
  {
    SEOMeta::setTitle('We Trek|Who We Are');
    SEOMeta::setDescription($this->info->meta_description);
    SEOMeta::setCanonical($this->info->canonical_url);
    // SEOMeta::addMeta('article:published_time', $about->created_at->toW3CString(), 'property');
    SEOMeta::addKeyword($this->info->keyword);
    OpenGraph::setDescription($this->info->description);
    OpenGraph::setTitle($this->info->meta_title ? $this->info->meta_title : $this->info->site_name);
    OpenGraph::setUrl($this->info->canonical_url);
    OpenGraph::addProperty('type', 'articles');
    $pages = Page::where('slug', 'privacy-policy')->published()->orderBy('created_at', 'asc')->get();
    return view('front.aboutus', compact('pages'));
  }

  public function thankyou()
  {
    SEOMeta::setTitle('We Trek|Thank You');
    SEOMeta::setDescription($this->info->meta_description);
    SEOMeta::setCanonical($this->info->canonical_url);
    // SEOMeta::addMeta('article:published_time', $about->created_at->toW3CString(), 'property');
    SEOMeta::addKeyword($this->info->keyword);
    OpenGraph::setDescription($this->info->description);
    OpenGraph::setTitle($this->info->meta_title ? $this->info->meta_title : $this->info->site_name);
    OpenGraph::setUrl($this->info->canonical_url);
    OpenGraph::addProperty('type', 'articles');
    return view('front.thankyou');
  }


  public function destinationList()
  {
    $og['title'] = 'Destination Lists';
    SEOMeta::setTitle('We Trek|Destination Lists');
    SEOMeta::setDescription($this->info->meta_description);
    SEOMeta::setCanonical($this->info->canonical_url);
    // SEOMeta::addMeta('article:published_time', $about->created_at->toW3CString(), 'property');
    SEOMeta::addKeyword($this->info->keyword);
    OpenGraph::setDescription($this->info->description);
    OpenGraph::setTitle($this->info->meta_title ? $this->info->meta_title : $this->info->site_name);
    OpenGraph::setUrl($this->info->canonical_url);
    OpenGraph::addProperty('type', 'articles');
    return view('front.destinationList', $og);
  }

  public function teams()
  {
    $og['title'] = 'Team of WeTrek Nepal, Our Team,Best Trekking company in Nepal';
    SEOMeta::setTitle('Team of WeTrek Nepal, Our Team,Best Trekking company in Nepal');
    SEOMeta::setDescription($this->info->meta_description);
    SEOMeta::setCanonical($this->info->canonical_url);
    // SEOMeta::addMeta('article:published_time', $about->created_at->toW3CString(), 'property');
    SEOMeta::addKeyword($this->info->keyword);
    OpenGraph::setDescription($this->info->description);
    OpenGraph::setTitle($this->info->meta_title ? $this->info->meta_title : $this->info->site_name);
    OpenGraph::setUrl($this->info->canonical_url);
    OpenGraph::addProperty('type', 'articles');
    $details = Team::published()->orderBy('position', 'asc')->get();
    return view('front.teams', compact('details', 'og'));
  }

  public function teamDetail($slug)
  {
    SEOMeta::setTitle('Team of WeTrek Nepal, Our Team,Best Trekking company in Nepal');
    SEOMeta::setDescription($this->info->meta_description);
    SEOMeta::setCanonical($this->info->canonical_url);
    // SEOMeta::addMeta('article:published_time', $about->created_at->toW3CString(), 'property');
    SEOMeta::addKeyword($this->info->keyword);
    OpenGraph::setDescription($this->info->description);
    OpenGraph::setTitle($this->info->meta_title ? $this->info->meta_title : $this->info->site_name);
    OpenGraph::setUrl($this->info->canonical_url);
    OpenGraph::addProperty('type', 'articles');
    $details = Team::published()->whereSlug($slug)->first();
    return view('front.teamDetail', compact('details'));
  }

  //About-Us page - Privacy and policy page
  public static function dynamicPages($slug)
  {
    try {
      $detail = \App\Models\Page::published()->where('slug', $slug)->first();
      $og['title'] = $detail->meta_title ?? $detail->title;
      $og['description'] = $detail->meta_description;
      $og['keywords'] = $detail->keywords;
      SEOMeta::setTitle($detail->meta_title ?? $detail->title);
    SEOMeta::setDescription($detail->meta_description);
    SEOMeta::setCanonical($detail->canonical_url);
    // SEOMeta::addMeta('article:published_time', $about->created_at->toW3CString(), 'property');
    SEOMeta::addKeyword($detail->keywords);
    OpenGraph::setDescription($detail->meta_description);
    OpenGraph::setTitle($detail->meta_title ? $detail->meta_title : $detail->title);
    OpenGraph::setUrl($detail->canonical_url ? $detail->canonical_url : url()->current());
    OpenGraph::addProperty('type', 'articles');
      // $relatedDestination = Destination::published()->inRandomOrder()->take(3)->get();
      return view('front.pages.details', compact('detail', 'og'));
      die;
    } catch (\Exception $ae) {
      abort('404');
    }
  }

  public function blogList()
  {
    SEOMeta::setTitle($detail->meta_title ?? $detail->title);
    SEOMeta::setDescription($detail->meta_description);
    SEOMeta::setCanonical($detail->canonical_url);
    // SEOMeta::addMeta('article:published_time', $about->created_at->toW3CString(), 'property');
    SEOMeta::addKeyword($detail->keywords);
    OpenGraph::setDescription($detail->meta_description);
    OpenGraph::setTitle($detail->meta_title ? $detail->meta_title : $detail->title);
    OpenGraph::setUrl($detail->canonical_url ? $detail->canonical_url : url()->current());
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
    SEOMeta::setTitle($blog->meta_title ?? $blog->title);
    SEOMeta::setDescription($blog->meta_description);
    SEOMeta::setCanonical($blog->canonical_url);
    // SEOMeta::addMeta('article:published_time', $about->created_at->toW3CString(), 'property');
    SEOMeta::addKeyword($blog->keyword);
    OpenGraph::setDescription($blog->meta_description);
    OpenGraph::setTitle($blog->meta_title ? $blog->meta_title : $blog->title);
    OpenGraph::setUrl($blog->canonical_url ? $blog->canonical_url : url()->current());
    OpenGraph::addProperty('type', 'articles');
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
    SEOMeta::setTitle('Travellers Review|WeTrek Nepal, Our Team,Best Trekking company in Nepal');
    SEOMeta::setDescription($this->info->meta_description);
    SEOMeta::setCanonical($this->info->canonical_url);
    // SEOMeta::addMeta('article:published_time', $about->created_at->toW3CString(), 'property');
    SEOMeta::addKeyword($this->info->keyword);
    OpenGraph::setDescription($this->info->description);
    OpenGraph::setTitle($this->info->meta_title ? $this->info->meta_title : $this->info->site_name);
    OpenGraph::setUrl($this->info->canonical_url);
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
    SEOMeta::setTitle($package->meta_title ?? $package->package_name);
    SEOMeta::setDescription($package->meta_description);
    SEOMeta::setCanonical($package->canonical_url ? $package->canonical_url : url()->current());
    // SEOMeta::addMeta('article:published_time', $about->created_at->toW3CString(), 'property');
    SEOMeta::addKeyword($package->keyword);
    OpenGraph::setDescription($package->meta_description);
    OpenGraph::setTitle($package->meta_title ? $package->meta_title : $package->title);
    OpenGraph::setUrl($package->canonical_url ? $package->canonical_url : url()->current());
    OpenGraph::addProperty('type', 'articles');
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
    SEOMeta::setTitle($destinationType->meta_title ?? $destinationType->title);
    SEOMeta::setDescription($destinationType->meta_description);
    SEOMeta::setCanonical($destinationType->canonical_url ? $destinationType->canonical_url : url()->current());
    // SEOMeta::addMeta('article:published_time', $about->created_at->toW3CString(), 'property');
    SEOMeta::addKeyword($destinationType->keyword);
    OpenGraph::setDescription($destinationType->meta_description);
    OpenGraph::setTitle($destinationType->meta_title ? $destinationType->meta_title : $destinationType->title);
    OpenGraph::setUrl($destinationType->canonical_url ? $destinationType->canonical_url : url()->current());
    OpenGraph::addProperty('type', 'articles');
    $destinationCategoryPackages = Package::where('destinationtype_id', $destinationType->id)->where('published', 1)->orderBy('updated_at', 'desc')->paginate(12);
    return view('front.destinationCategoryDetail', compact('destinationType', 'destinationCategoryPackages', 'og'));
  }

  public static function destinationCategoriesDetail($slug)
  {

    $destinationType = Category::with('regions')->where('published', 1)->where('slug', $slug)->first();
    $og['title'] = $destinationType->meta_title ?? $destinationType->title;
    $og['description'] = $destinationType->meta_description;
    $og['keywords'] = $destinationType->keyword;
    SEOMeta::setTitle($destinationType->meta_title ?? $destinationType->title);
    SEOMeta::setDescription($destinationType->meta_description);
    SEOMeta::setCanonical($destinationType->canonical_url ? $destinationType->canonical_url : url()->current());
    // SEOMeta::addMeta('article:published_time', $about->created_at->toW3CString(), 'property');
    SEOMeta::addKeyword($destinationType->keyword);
    OpenGraph::setDescription($destinationType->meta_description);
    OpenGraph::setTitle($destinationType->meta_title ? $destinationType->meta_title : $destinationType->title);
    OpenGraph::setUrl($destinationType->canonical_url ? $destinationType->canonical_url : url()->current());
    OpenGraph::addProperty('type', 'articles');
    $destinationCategoryPackages = Package::where('destinationtype_id', $destinationType->id)->where('published', 1)->orderBy('updated_at', 'desc')->paginate(12);
    return view('front.categorydetail', compact('destinationType', 'destinationCategoryPackages', 'og'));
  }


  public static function destinationDetail($slug)
  {
    $destination = Destination::published()->whereSlug($slug)->first();
    $og['title'] = $destination->meta_title ?? $destination->country_name;
    $og['description'] = $destination->meta_description;
    $og['keywords'] = $destination->meta_keyword;
    SEOMeta::setTitle($destination->meta_title ?? $destination->country_name);
    SEOMeta::setDescription($destination->meta_description);
    SEOMeta::setCanonical($destination->canonical_url ? $destination->canonical_url : url()->current());
    // SEOMeta::addMeta('article:published_time', $about->created_at->toW3CString(), 'property');
    SEOMeta::addKeyword($destination->keyword);
    OpenGraph::setDescription($destination->meta_description);
    OpenGraph::setTitle($destination->meta_title ? $destination->meta_title : $destination->title);
    OpenGraph::setUrl($destination->canonical_url ? $destination->canonical_url : url()->current());
    OpenGraph::addProperty('type', 'articles');
    $destinationType = Destinationtype::with('packages')->where('destination_id', $destination->id)->where('published', 1)->limit(6)->get();
    return view('front.destinationDetail', compact('destinationType', 'destination', 'og'));
    // return view('front.destinationDetail', compact('destinationType', 'destination', 'mountainTrekPackages', 'popularTourPackages', 'peakClimbingExpeditionsPackages', 'adventureRoadTripPackages'));
  }

  public function destinationPackage($slug)
  {
    $destination = Destination::published()->whereSlug($slug)->first();
    $destinationPackages = Destinationtype::with('packages')->where('destination_id', $destination->id)->where('published', 1)->paginate(12);
    return view('front.destination.allDestinationPackage', compact('destination', 'destinationPackages'));
  }

  public function popularTourPackage($slug)
  {
    $destination = Destination::published()->whereSlug($slug)->first();
    $popularTourPackages = Destinationtype::with('packages')->where('destination_id', $destination->id)->where('published', 1)->paginate(12);
    // $popularTourPackages = Package::where('destination_id',$destination->id)->where('popular_tours', 1)->where('published',1)->paginate(12);
    return view('front.destination.allpopularTourPackage', compact('destination', 'popularTourPackages'));
  }


  //all region related package listed is know as category
  public static function category($slug)
  {

    $region = Region::where('publish', 1)->whereSlug($slug)->first();
    SEOMeta::setTitle($region->meta_title ?? $region->name);
    SEOMeta::setDescription($region->description);
    SEOMeta::setCanonical($region->canonical_url ? $region->canonical_url : url()->current());
    // SEOMeta::addMeta('article:published_time', $about->created_at->toW3CString(), 'property');
    SEOMeta::addKeyword($region->keyword);
    OpenGraph::setDescription($region->description);
    OpenGraph::setTitle($region->meta_title ? $region->meta_title : $region->name);
    OpenGraph::setUrl($region->canonical_url ? $region->canonical_url : url()->current());
    OpenGraph::addProperty('type', 'articles');
    $regionPackages = Package::where('region_id', $region->id)->where('published', 1)->orderBy('updated_at', 'desc')->paginate(12);
    // dd($regionPackages);
    return view('front.regionList', compact('region', 'regionPackages'));
  }


  public function paginate($items, $perPage = 20, $page = null, $options = [])
  {
    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);
    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
  }

  public function findAll()
  {
    $title = request()->get('title');
    $trekkingPackageSearch = Package::latest()->published()
      ->whereHas('destinationtype', function ($q) {
        $q->where('destinationtype_id', request()->destinationtype_id);
      })
      ->orWhereHas('destinations', function ($q) {
        $q->where('destination_id', request()->destination_id);
      })
      ->where('days_and_nights', 'like', '%' . request()->days_and_nights . '%')
      ->where('destination_id', request()->destination_id)
      ->get();

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
    SEOMeta::setTitle('We Trek|Contact Us');
    SEOMeta::setDescription($this->info->meta_description.'|Contact Us');
    SEOMeta::setCanonical(url()->current());
    // SEOMeta::addMeta('article:published_time', $about->created_at->toW3CString(), 'property');
    SEOMeta::addKeyword($this->info->keyword);
    OpenGraph::setDescription($this->info->description);
    OpenGraph::setTitle('We Trek|Contact Us');
    OpenGraph::setUrl(url()->current());
    OpenGraph::addProperty('type', 'articles');
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

  public function bookingForm()
  {
    return view('front.booking.bookingform');
  }
}
