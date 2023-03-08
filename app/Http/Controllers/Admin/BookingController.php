<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\TourBooking;
use App\Models\AdventureBooking;
use App\Models\HelitourBooking;
use App\Models\NatureBooking;
use App\Models\AdminsRole;
use App\Models\BookingForm;
use App\Models\Quote;
use Auth;
use Session;

class BookingController extends Controller
{

    public function bookingLists(){
        $bookingLists = BookingForm::with('costanddate','package')->latest()->get();
        return view('admin.booking.booking-lists',compact('bookingLists'));
    }

    public function quoteLists(){
        $quoteLists = Quote::with('package')->latest()->get();
        return view('admin.booking.quote',compact('quoteLists'));
    }

    public function viewBooking(Request $request){
        $detail = BookingForm::with('costanddate','package')->findOrFail($request->id);
        return view('admin.booking.booking-lists-preview', compact('detail'));
    }
    
    public function viewQuote(Request $request){
        $detail = Quote::findOrFail($request->id);
        return view('admin.booking.quote-lists-preview', compact('detail'));
    }

    public function index()
    {
        $trekkingBooking = Booking::with('costanddate')->where('type','PackageBooking')->orderBy('created_at', 'desc')->get();
        
        $toursBooking = TourBooking::with('tourcostanddate')->where('type','TourPackageBooking')->orderBy('updated_at', 'desc')->get();
        $adventureBooking = AdventureBooking::where('type','AdventurePackageBooking')->orderBy('updated_at', 'desc')->get();
        $helitourBooking = HelitourBooking::where('type','HelitourPackageBooking')->orderBy('updated_at', 'desc')->get();
        $natureBooking = NatureBooking::where('type','NaturePackageBooking')->orderBy('updated_at', 'desc')->get();
        $packageBooking = $trekkingBooking->concat($toursBooking)->concat($adventureBooking)->concat($helitourBooking)->concat($natureBooking);
        // dd($packageBooking);

        $bookingListModuleCount = AdminsRole::where(['admin_id'=>Auth::user()->id,'module'=>'bookingList'])->count();
        if(Auth::user()->type=="superadmin"){
            $bookingListModule['view_access'] = 1;
            $bookingListModule['edit_access'] = 1;
            $bookingListModule['full_access'] = 1;
        }else if($bookingListModuleCount==0){
            $message= "Sorry, This Section is restricted for your role !!";
            session::flash('error',$message);
            return redirect('admin/dashboard');
        }else{
            $bookingListModule = AdminsRole::where(['admin_id'=>Auth::user()->id,'module'=>'bookingList'])->first()->toArray();
            // dd($bookingListModule);die;
        }
        return view('admin.booking.list', compact('bookingListModule','packageBooking'));
    }

    public function create()
    {
        $trekkingBookingInquiry = Booking::where('type','PackageInquire')->orderBy('created_at', 'desc')->get();
        $toursBookingInquiry = TourBooking::where('type','TourPackageInquire')->orderBy('created_at', 'desc')->get();
        $adventureBookingInquiry = AdventureBooking::where('type','AdventurePackageInquire')->orderBy('created_at', 'desc')->get();
        $helitourBookingInquiry = HelitourBooking::where('type','HelitourPackageInquire')->orderBy('created_at', 'desc')->get();
        $natureBookingInquiry = NatureBooking::where('type','NaturePackageInquire')->orderBy('created_at', 'desc')->get();
        $packageBookingInquiry = $trekkingBookingInquiry->concat($toursBookingInquiry)->concat($adventureBookingInquiry)->concat($helitourBookingInquiry)->concat($natureBookingInquiry);
        // dd($packageBookingInquiry);

        // dd($details);
        return view('admin.booking.booking_inquery', compact('packageBookingInquiry'));
        
    }
    
    public function removeQuote($id){
       $quote = Quote::findorfail($id);
        $quote->delete();
        return redirect()->back()->with('message', 'Quote Deleted Successfully.');
        
    }
    
    public function removeBooking($id){
        $booking = BookingForm::findorfail($id);
        $booking->delete();
        return redirect()->back()->with('message', 'Booking Deleted Successfully.');
    }

    public function store(Request $request)
    {
        abort('404');
    }

    public function show($id)
  {
    $trekkingandhikingBooking = Booking::findorfail($id);
    return view('admin.booking.details', compact('trekkingandhikingBooking'));

  }

    public function edit($id)
    {
        $trekkingandhikingBookingInquiry = Booking::findorfail($id);
        return view('admin.booking.trekking_inquire_details', compact('trekkingandhikingBookingInquiry'));
    }

    public function update(Request $request, $id)
    {
      abort('404');
    }

    public function destroy($id)
    {
        $booking = Booking::findorfail($id);
        $booking->delete();
        return redirect()->back()->with('message', 'Booking Deleted Successfully.');
    }
}
