<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::routes();

# Authentication Routes
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');



Route::get('forget-password', 'Auth\ForgotPasswordController@showForgetPasswordForm')->name('forget.password.get');
Route::post('forget-password', 'Auth\ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post');
Route::get('reset-password/{token}', 'Auth\ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');
Route::post('reset-password', 'Auth\ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');






Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {

  Route::resource('group', 'GroupController');
  Route::resource('region', 'RegionController');
  Route::resource('tour', 'TourController');
  Route::resource('adventure', 'AdventureController');
  Route::resource('activity', 'ActivityController');

  /*
  *Dashboard
*/
  Route::get('dashboard', 'DashboardController@index')->name('dashboard');
  Route::put('dashboard/save/{id}', 'DashboardController@update')->name('dashboard.save');

  //Role and permission
  Route::get('admins-subadmins', 'AdminController@adminsSubadmins')->name('admins-subadmins');
  Route::match(['get', 'post'], 'add-edit-admin-subadmin/{id?}', 'AdminController@addEditAdminSubadmin');
  Route::post('update-admin-status', 'AdminController@updateAdminStatus');
  Route::delete('user/remove/{id}', 'AdminController@removeUser')->name('userdestroy');
  Route::match(['get', 'post'], '/update-role/{id}', 'AdminController@updateRole');



  /*
  *Setting
*/
  Route::get('setting', 'SettingController@index')->name('setting');

  Route::put('setting/save/{id}', 'SettingController@update')->name('setting.save');
  /*


/*
*Destinationtype
*/
  Route::resource('destinationtype', 'DestinationtypeController');

  /*
*Blogs
*/
  Route::resource('blog', 'BlogController');

  //   *Travel Style*/
  Route::resource('travelstyle', 'TravelstyleController');

  //Why With US
  Route::resource('whywithus', 'WhywithusController');


  /*
*Event
*/
  Route::resource('team', 'TeamController');

  //Our History in Service Excellence (This section is used in package in last part)
  Route::resource('history', 'HistoryController');

  //WE ARE ASSOCIATED WITH (This section is used in package in last part)
  Route::resource('associate', 'AssociateController');


  /*
*Gallery
*/
  Route::resource('gallery', 'GalleryController');

  Route::post('remove/image', 'GalleryController@removeParticularImage')->name('removeImage');

  /*
*Slider
*/
  Route::resource('slider', 'SliderController');

  /*
*Pages
*/
  Route::resource('pages', 'PagesController');

  /*
*Testimonial
*/
  Route::resource('testimonial', 'TestimonialController');

  //   *Testimonial
  // */
  Route::resource('travelersreview', 'TravelersreviewController');
  /*
*Frequently Asked question
*/
  // Route::resource('faq', 'FaqController');

  /*
*Video
*/
  Route::resource('video', 'VideoController');

  /*
*Piller
*/
  Route::resource('piller', 'PillerController');

  /*
*Destinations
*/

  Route::resource('destination', 'DestinationController');
  Route::group(['prefix' => 'destination/{destination}',], function () {
    Route::resource('destinationfaq', 'FaqController');
    // Route::resource('packagefaq', 'PackageFaqController');
  });



  // Route::get('destination-faq/index', 'FaqController@index')->name('destinationFaq.index');
  // Route::get('destination-faq/create/{id}', 'FaqController@create')->name('destinationFaq.create');
  // Route::post('destination-faq/upload/{id}', 'FaqController@store')->name('destinationFaq.store');
  // Route::get('destination/{id}/destination-faq/edit/{id}', 'FaqController@edit')->name('destinationFaq.edit');
  // Route::delete('destination-faq/update/{id}', 'FaqController@update')->name('destinationFaq.update');
  // Route::delete('destination-faq/destroy/{id}', 'FaqController@deleteEventImage')->name('destinationFaq.destroy');




  // Package
  Route::resource('package', 'PackageController');
  // Tour Package
  Route::resource('tourpackage', 'TourPackageController');
  // Adventure Package
  Route::resource('adventurepackage', 'AdventurePackageController');
  // Heli Tour Package
  Route::resource('helitourpackage', 'HelitourPackageController');
  // Nature Package
  Route::resource('naturepackage', 'NaturePackageController');

  /*
*Booking List
*/
  Route::resource('bookings', 'BookingController');
  Route::resource('tourbookings', 'TourBookingController');
  Route::resource('adventurebookings', 'AdventureBookingController');
  Route::resource('helitourbookings', 'HelitourBookingController');
  Route::resource('naturebookings', 'NatureBookingController');
  Route::resource('customize', 'CustomizeTripController');
  Route::get('booking-lists', 'BookingController@bookingLists')->name('bookingLists');
  Route::get('quotes-lists', 'BookingController@quoteLists')->name('quoteLists');
  Route::post('view-booking', 'BookingController@viewBooking')->name('viewBooking');


  /*
*User Enquiry
*/
  Route::get('enquiry/lists', 'EnquiryController@enquiryList')->name('enquiryList');
  Route::post('contact-view', 'EnquiryController@viewContact')->name('viewContact');


  Route::delete('enquiry/remove/{id}', 'EnquiryController@removeEnquiry')->name('userenquiry.destroy');

  //Suscriber
  Route::get('enquiry/subscriber', 'EnquiryController@subscriberList')->name('subscriberList');
  Route::delete('enquiry/subscriber/remove/{id}', 'EnquiryController@removeSubscriber')->name('removeSubscriber');



  // Package Group Route
  Route::group(['prefix' => 'package/{package}',], function () {

    Route::resource('packageitinerary', 'PackageItineraryController');
    Route::resource('packageequipment', 'PackageEquipmentController');
    Route::resource('packagefaq', 'PackageFaqController');
    Route::resource('packagereview', 'PackageReviewController');
    Route::resource('packagegdp', 'PackageGdpController'); //gdp = Ground Discount Price
    // Route::resource('faq', 'FaqController');
    // Route::resource('review', 'ReviewController');
    Route::resource('costanddate', 'CostandDateController');

    //Tour package
    Route::resource('tourpackageitinerary', 'TourPackageItineraryController');
    Route::resource('tourpackageequipment', 'TourPackageEquipmentController');
    Route::resource('tourcostanddate', 'TourCostandDateController');
    Route::resource('tourpackagegdp', 'TourPackageGdpController'); //gdp = Ground Discount Price
    Route::resource('tourpackagefaq', 'TourPackageFaqController');


    //Adventure package
    Route::resource('adventurepackageitinerary', 'AdventurePackageItineraryController');
    Route::resource('adventurepackageequipment', 'AdventurePackageEquipmentController');
    Route::resource('adventurepackagecostanddate', 'AdventurePackageCostandDateController');
    Route::resource('adventurepackagegdp', 'AdventurePackageGdpController'); //gdp = Ground Discount Price
    Route::resource('adventurepackagefaq', 'AdventurePackageFaqController');

    //Heli Tour package
    Route::resource('helitourpackageitinerary', 'HelitourPackageItineraryController');
    Route::resource('helitourpackageequipment', 'HelitourPackageEquipmentController');
    Route::resource('helitourcostanddate', 'HelitourCostandDateController');
    Route::resource('helitourpackagegdp', 'HelitourPackageGdpController'); //gdp = Ground Discount Price
    Route::resource('helitourpackagefaq', 'HelitourPackageFaqController');

    //Nature package
    Route::resource('naturepackageitinerary', 'NaturePackageItineraryController');
    Route::resource('naturepackageequipment', 'NaturePackageEquipmentController');
    Route::resource('naturepackagecostanddate', 'NaturePackageCostandDateController');
    Route::resource('naturepackagegdp', 'NaturePackageGdpController'); //gdp = Ground Discount Price
    Route::resource('naturepackagefaq', 'NaturePackageFaqController');
  });
  Route::post('/packageitinerary/updateorder', 'PackageItineraryController@updateOrder')->name('packageitinerary.update.order');
  Route::post('/tourpackageitinerary/updateorder', 'tourpackageitineraryController@updateOrder')->name('tourpackageitinerary.update.order');
  Route::post('/adventurepackageitinerary/updateorder', 'adventurepackageitineraryController@updateOrder')->name('adventurepackageitinerary.update.order');
  Route::post('/helitourpackageitinerary/updateorder', 'helitourpackageitineraryController@updateOrder')->name('helitourpackageitinerary.update.order');
  Route::post('/naturepackageitinerary/updateorder', 'naturepackageitineraryController@updateOrder')->name('naturepackageitinerary.update.order');


  /**
   * Store and Delete Slider in Destination detail page
   */

  Route::get('multipleimages/create/{id}', 'DestinationController@getMultipleImages')->name('multipleimages.create');
  Route::post('multipleimages/upload', 'DestinationController@multipleImagesStore')->name('multipleimages.store');
  Route::delete('multipleimages/destroy/{id}', 'DestinationController@deleteEventImage')->name('multipleimages.destroy');


  //Package Multiple image slider
  Route::get('packagemultipleimages/create/{id}', 'PackageController@getMultipleImages')->name('packagemultipleimages.create');
  Route::post('packagemultipleimages/upload', 'PackageController@multipleImagesStore')->name('packagemultipleimages.store');
  Route::delete('packagemultipleimages/destroy/{id}', 'PackageController@deleteEventImage')->name('packagemultipleimages.destroy');

  //Tour Multiple Image SLider
  Route::get('tourpackagemultipleimages/create/{id}', 'TourPackageController@getMultipleImages')->name('tourpackagemultipleimages.create');
  Route::post('tourpackagemultipleimages/upload', 'TourPackageController@multipleImagesStore')->name('tourpackagemultipleimages.store');
  Route::delete('tourpackagemultipleimages/destroy/{id}', 'TourPackageController@deleteEventImage')->name('tourpackagemultipleimages.destroy');

  //Adventure Multiple Image SLider
  Route::get('adventurepackagemultipleimages/create/{id}', 'AdventurePackageController@getMultipleImages')->name('adventurepackagemultipleimages.create');
  Route::post('adventurepackagemultipleimages/upload', 'AdventurePackageController@multipleImagesStore')->name('adventurepackagemultipleimages.store');
  Route::delete('adventurepackagemultipleimages/destroy/{id}', 'AdventurePackageController@deleteEventImage')->name('adventurepackagemultipleimages.destroy');

  //Heli Tour Multiple Image SLider
  Route::get('helitourpackagemultipleimages/create/{id}', 'HelitourPackageController@getMultipleImages')->name('helitourpackagemultipleimages.create');
  Route::post('helitourpackagemultipleimages/upload', 'HelitourPackageController@multipleImagesStore')->name('helitourpackagemultipleimages.store');
  Route::delete('helitourpackagemultipleimages/destroy/{id}', 'HelitourPackageController@deleteEventImage')->name('helitourpackagemultipleimages.destroy');

  //Nature Multiple Image SLider
  Route::get('naturepackagemultipleimages/create/{id}', 'NaturePackageController@getMultipleImages')->name('naturepackagemultipleimages.create');
  Route::post('naturepackagemultipleimages/upload', 'NaturePackageController@multipleImagesStore')->name('naturepackagemultipleimages.store');
  Route::delete('naturepackagemultipleimages/destroy/{id}', 'NaturePackageController@deleteEventImage')->name('naturepackagemultipleimages.destroy');
});



/*
<-------------------------------------------------------Back End Route End----------------------------------------------------------->

*Front End Route Begins
*/

Route::group(['namespace' => 'Front'], function () {
  /*
*Home Page Index page

*/


  Route::get('/', 'HomeController@index')->name('indexHome');
  Route::get('home', 'HomeController@index')->name('home');
  // Route::get('/pdf/{id}', 'HomeController@pdfStream')->name('pdfStream');
  Route::get('popular-tours', 'HomeController@populartours')->name('populartours');

  /*
*search
*/
  //   Route::get('search', 'HomeController@searchDestination')->name('searchDestination');
  Route::get('search-packages', 'HomeController@findAll')->name('findAll');
  Route::get('search-on-key-up', 'HomeController@searchOnKeyUp')->name('searchOnKeyUp');
  

  //CV
  Route::get('/classic-vacation-list', 'HomeController@classicVacationList')->name('classicVacationList');
  Route::get('who-we-are', 'HomeController@whoweare')->name('whoweare');
  Route::get('why-us', 'HomeController@whyus')->name('whyus');
  Route::get('travel-style', 'HomeController@travelStyle')->name('travelstyle');
  Route::get('travel-guide', 'HomeController@travelGuide')->name('travelGuide');
  Route::get('about-us', 'HomeController@aboutus')->name('aboutus');
  Route::get('destination-list', 'HomeController@destinationList')->name('destinationList');
  Route::get('travelers-review', 'HomeController@travelerReview')->name('travelerReview');
  Route::get('blog', 'HomeController@blogList')->name('blogList');
  Route::get('customize-my-trip', 'HomeController@customizeTrip')->name('customizeTrip');
  Route::get('gallery/list', 'HomeController@galleryList')->name('galleryList');
  Route::get('booking-form', 'BookingController@bookingForm')->name('bookingForm');
  Route::get('teams', 'HomeController@teams')->name('team');
  Route::get('testimonial', 'HomeController@testimonial')->name('getTestimonial');
  Route::get('contact-us', 'HomeController@contactUS')->name('contactUS');
  // Route::get('faq', 'HomeController@faq')->name('faq');

  Route::get('{resolvePath}', 'ResolveController@show')->name('resolvepath.show');
   
   /*Destination -or- package Related Routes
*/
 
  // Route::get('/category/{slug}', 'HomeController@category')->name('category');
  //Trekking and Hikking Package
  Route::get('/package/{slug}', 'HomeController@packageDetails')->name('packageDetails');
  //Tour Package
  Route::get('/tour-package/{slug}', 'HomeController@tourPackageDetails')->name('tourPackageDetails');
  //Adventure Package
  Route::get('/adventure-package/{slug}', 'HomeController@adventurePackageDetails')->name('adventurePackageDetails');
  //Heli Tour Package
  Route::get('/helitour-package/{slug}', 'HomeController@helitourPackageDetails')->name('helitourPackageDetails');
  //Nature and Wildlife Tour Package
  Route::get('/nature-and-wildlife-package/{slug}', 'HomeController@naturePackageDetails')->name('naturePackageDetails');
  // popular package
  Route::get('packages/{slug}', 'HomeController@popularPackageDetails')->name('popularPackageDetails');

  //Destination Detail
  Route::get('/destination-category/{slug}', 'HomeController@destinationCategoryDetail')->name('destinationCategoryDetail');
  Route::get('/destination/{slug}', 'HomeController@destinationDetail')->name('destinationDetail');
  Route::get('/destinations/country/{slug}', 'HomeController@destinationPackage')->name('destinationPackage');
  Route::get('/destinations/mountain-trek/{slug}', 'HomeController@mountainTrekPackage')->name('mountainTrekPackage');
  Route::get('/destinations/popular-tour/{slug}', 'HomeController@popularTourPackage')->name('popularTourPackage');
  Route::get('/destinations/peak-climbing-expeditions/{slug}', 'HomeController@peakClimbingExpeditionsPackage')->name('peakClimbingExpeditionsPackage');
  Route::get('/destinations/adventure-road-trip/{slug}', 'HomeController@adventureRoadTripPackage')->name('adventureRoadTripPackage');

  Route::get('/destination/country/{slug}', 'HomeController@destinationCountry')->name('destinationCountry');
  // Route::get('destination/{slug}', 'HomeController@packageList')->name('packageList');

  // travel style
  Route::get('/travel-style/{slug}', 'HomeController@travelStyleDetail')->name('travelStyleDetail');


  /*
*Blog Related Routes
*/
  // Route::get('blog/list', 'HomeController@blogList')->name('blogList');

  Route::post('blog-us', 'HomeController@saveBlogEnquiry')->name('blogEnquirySave');
  Route::get('blog/{slug}', 'HomeController@blogDetails')->name('blogDetails');


  //Package Enquery
  Route::get('package-inquire/{slug}', 'HomeController@packageInquire')->name('packageInquire');
  Route::get('tour-package-inquire/{slug}', 'HomeController@tourPackageInquire')->name('tourPackageInquire');
  Route::get('adventure-package-inquire/{slug}', 'HomeController@adventurePackageInquire')->name('adventurePackageInquire');
  Route::get('helitour-package-inquire/{slug}', 'HomeController@helitourPackageInquire')->name('helitourPackageInquire');
  Route::get('nature-and-wildlife-package-inquire/{slug}', 'HomeController@naturePackageInquire')->name('naturePackageInquire');

  //Customize your trip
 
  Route::post('customize-trip-booking', 'HomeController@customizeTripBooking')->name('customizeTripBooking');

  // Package inquire Save
  Route::post('package-inquiries/save/{id}', 'HomeController@savePackageInquire')->name('savePackageInquire');
  Route::post('tour-package-inquiries/save/{id}', 'HomeController@saveTourPackageInquire')->name('saveTourPackageInquire');
  Route::post('adventure-package-inquiries/save/{id}', 'HomeController@saveAdventurePackageInquire')->name('saveAdventurePackageInquire');
  Route::post('helitour-package-inquiries/save/{id}', 'HomeController@saveHelitourPackageInquire')->name('saveHelitourPackageInquire');
  Route::post('nature-wildlife-package-inquiries/save/{id}', 'HomeController@saveNaturePackageInquire')->name('saveNaturePackageInquire');

  /*
*Gallery Related Routes
*/


  Route::get('gallery/details/{slug}', 'HomeController@galleryDetails')->name('galleryDetails');

  /*
*Testimonial Related
*/


  /*
*Team Related Route
*/

  Route::get('teams/{slug}', 'HomeController@teamDetail')->name('teamDetail');




  /*
*Booking Related Route
*/
  Route::get('booking/{id}', 'HomeController@packageBook')->name('bookPackage');
  Route::get('tour-booking/{id}', 'HomeController@bookTourPackage')->name('bookTourPackage');
  Route::get('adventure-booking/{id}', 'HomeController@bookAdventurePackage')->name('bookAdventurePackage');
  Route::get('helitour-booking/{id}', 'HomeController@bookHelitourPackage')->name('bookHelitourPackage');
  Route::get('nature-and-wildlife-booking/{id}', 'HomeController@bookNaturePackage')->name('bookNaturePackage');


  Route::post('post-booking', 'BookingController@postBookingForm')->name('postBookingForm');
  Route::post('request-a-quote', 'BookingController@requestQuote')->name('requestQuote');

  //Boking different packages
  Route::post('package/booking/save/{id}', 'HomeController@savePackageBooking')->name('savePackageBooking');
  Route::post('trekking-booking-price', 'HomeController@trekkingBookingPrice')->name('trekkingBookingPrice');

  Route::post('tour-package/booking/save/{id}', 'HomeController@saveTourPackageBooking')->name('saveTourPackageBooking');
  Route::post('tour-booking-price', 'HomeController@tourBookingPrice')->name('tourBookingPrice');

  Route::post('adventure-package/booking/save/{id}', 'HomeController@saveAdventurePackageBooking')->name('saveAdventurePackageBooking');
  Route::post('adventure-booking-price', 'HomeController@adventureBookingPrice')->name('adventureBookingPrice');

  Route::post('helitour-package/booking/save/{id}', 'HomeController@saveHelitourPackageBooking')->name('saveHelitourPackageBooking');
  Route::post('helitour-booking-price', 'HomeController@helitourBookingPrice')->name('helitourBookingPrice');

  Route::post('nature-and-wildlife-package/booking/save/{id}', 'HomeController@saveNaturePackageBooking')->name('saveNaturePackageBooking');
  Route::post('nature-booking-price', 'HomeController@natureBookingPrice')->name('natureBookingPrice');



  /*
*Pages Related Route
*/
  //contact us and enquiry with slider
  // Route::get('contact-us' ,function(){
  //     return view('front.contact');
  // });
 
  Route::post('contactus-us/save', 'HomeController@saveEnquiry')->name('enquirySave');

  //save subscriber
  Route::post('subscriber/save', 'HomeController@saveSubscribers')->name('saveSubscribers');
  


  // Route::get('pages/{slug}', 'HomeController@pageDetail')->name('pageDetail');

});
