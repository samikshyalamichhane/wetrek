<?php

Route::get('login', 'Admin\AdminLoginController@showLoginForm')->name('login');
Route::post('login', 'Admin\AdminLoginController@adminLogin');
Route::post('logout', 'Admin\AdminLoginController@logout')->name('logout');

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

  //Category
  Route::resource('category', 'CategoryController');


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

  // Package
  Route::resource('package', 'PackageController');
  Route::get('booking-lists', 'BookingController@bookingLists')->name('bookingLists');
  Route::get('quotes-lists', 'BookingController@quoteLists')->name('quoteLists');
  Route::post('view-booking', 'BookingController@viewBooking')->name('viewBooking');
  Route::post('view-quote', 'BookingController@viewQuote')->name('viewQuote');
  Route::delete('quote/remove/{id}', 'BookingController@removeQuote')->name('removeQuote');
  Route::delete('booking/remove/{id}', 'BookingController@removeBooking')->name('removeBooking');


  /*
*User Enquiry
*/
  Route::get('enquiry/lists', 'EnquiryController@enquiryList')->name('enquiryList');
  Route::get('package-enquiry/lists', 'EnquiryController@packageEnquiryList')->name('packageEnquiryList');
  
  Route::post('contact-view', 'EnquiryController@viewContact')->name('viewContact');
  Route::post('package-enquiry/view', 'EnquiryController@viewPackageEnquiry')->name('viewPackageEnquiry');


  Route::delete('enquiry/remove/{id}', 'EnquiryController@removeEnquiry')->name('userenquiry.destroy');
  Route::delete('package-enquiry/remove/{id}', 'EnquiryController@removePackageEnquiry')->name('removePackageEnquiry');

  //Suscriber
  Route::get('enquiry/subscriber', 'EnquiryController@subscriberList')->name('subscriberList');
  Route::post('newsletter-view', 'EnquiryController@viewNewsletter')->name('viewNewsletter');
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
  });
  Route::post('/packageitinerary/updateorder', 'PackageItineraryController@updateOrder')->name('packageitinerary.update.order');
  Route::post('/destinationtype/updateorder', 'DestinationtypeController@updateOrder')->name('destinationtype.update.order');

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

 });



/*
<-------------------------------------------------------Back End Route End----------------------------------------------------------->

*Front End Route Begins
*/

Route::group(['namespace' => 'Front'], function () {
  Route::get('/', 'HomeController@index')->name('indexHome');
  Route::get('/mail', 'HomeController@mail')->name('mail');
  
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
  Route::get('/our-specials', 'HomeController@specialPackageLists')->name('classicVacationList');
  Route::get('who-we-are', 'HomeController@whoweare')->name('whoweare');
  // Route::get('why-classic-vacations-nepal', 'HomeController@whyus')->name('whyus');
  Route::get('travel-styles', 'HomeController@travelStyle')->name('travelstyle');
  Route::get('travel-information', 'HomeController@travelGuide')->name('travelGuide');
  Route::get('about-us', 'HomeController@aboutus')->name('aboutus');
  Route::get('destination', 'HomeController@destinationList')->name('destinationList');
  // Route::get('package/{slug}', 'HomeController@packageDetails')->name('packageDetails');
  Route::get('travelers-reviews', 'HomeController@travelerReview')->name('travelerReview');
  Route::get('blog', 'HomeController@blogList')->name('blogList');
  Route::get('blog/{slug}', 'HomeController@blogDetails')->name('blogDetails');
  Route::get('customize-my-trip', 'HomeController@customizeTrip')->name('customizeTrip');
  Route::get('gallery/list', 'HomeController@galleryList')->name('galleryList');
  Route::get('booking-form', 'BookingController@bookingForm')->name('bookingForm');
  Route::get('team', 'HomeController@teams')->name('team');
  Route::get('testimonial', 'HomeController@testimonial')->name('getTestimonial');
  Route::get('contact-us', 'HomeController@contactUS')->name('contactUS');
  Route::get('thank-you', 'HomeController@thankyou')->name('thankyou');
  
   Route::get('card-payment','BookingController@PaymentForm')->name('PaymentForm');
  Route::post('payment-request','HblController@PaymentRequest')->name('PaymentRequest');
  
  //Redirect Url For payment process
  Route::post('get-response', 'RedirectUrlController@getPaymentResponse')->name('getPaymentResponse');
  Route::get('payment-success', 'RedirectUrlController@paymentSuccess')->name('paymentSuccess');
  Route::get('payment-fail', 'RedirectUrlController@paymentFailure')->name('paymentFailure');
  Route::get('payment-cancel', 'RedirectUrlController@paymentCancel')->name('paymentCancel');

  Route::post('/package-enquiry/{id}', 'HomeController@packageEnquiry')->name('packageEnquiry');
  // travel style
  Route::get('/travel-style/{slug}', 'HomeController@travelStyleDetail')->name('travelStyleDetail');
  Route::get('team/{slug}', 'HomeController@teamDetail')->name('teamDetail');
  // Route::get('/{destination}/{slug}', 'ResolveController@showTwoSlug')->name('resolvepath.showTwoSlug');
 Route::get('gallery/details/{slug}', 'HomeController@galleryDetails')->name('galleryDetails');

  Route::post('post-booking', 'BookingController@postBookingForm')->name('postBookingForm');
  Route::post('request-a-quote', 'BookingController@requestQuote')->name('requestQuote');
  Route::post('contactus-us/save', 'HomeController@saveEnquiry')->name('enquirySave');

  //save subscriber
  Route::post('subscriber/save', 'HomeController@saveSubscribers')->name('saveSubscribers');

  Route::get('{resolvePath}', 'ResolveController@show')->name('resolvepath.show');

  

  Route::get('{slug}', 'HomeController@dynamicPages')->name('pagesDetail');


});
