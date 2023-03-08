<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\BookingRequest;
use App\Mail\QuoteRequest;
use App\Models\BookingForm;
use App\Models\CostandDate;
use App\Models\Package;
use App\Models\Quote;
use Mail;
use Carbon\Carbon;

class BookingController extends Controller
{

    public function PaymentForm(){
        $og['title'] = 'Make Online Payment - Payment Form';
        $packages = Package::published()->get();
        return view('front.booking.payment-form',compact('packages','og'));
    }
    public function bookingForm(Request $request)
  {
    $start_date = $request->started_date;
    $end_date= $request->end_date;
    $costdate_id= $request->costanddate_id;
    $package_id= $request->package_id;
    $costanddates = CostandDate::where('package_id',$package_id)->get();
    // dd($costanddate);
    $packages = Package::latest()->get();
    return view('front.booking.bookingform', compact('packages','start_date','end_date','package_id','costanddates','costdate_id'));
  }


    public function postBookingForm(Request $request)
  {
    // dd($request->all());
    $request->validate([
      'package_id' => 'required',
      'first_name.*' => 'required',
      'last_name.*' => 'required',
      'email.*' => 'required',
      'dob.*' => 'nullable',
      'country.*' => 'required',
      'contact.*' => 'required|numeric|min:7',
      'how_found' => 'nullable',
      'spec_req' => 'nullable',
    //   'terms_and_conditions' => 'required',
    ],
    [
      'package_id.required' => 'Please Select any of the packages!',
      'first_name.*.required' => 'First Name field is required!',
      'last_name.*.required' => 'Last Name field is required!',
      'email.*.required' => 'Email field is required!',
      'dob.*.required' => 'Date of Birth field is required!',
      'country.*.required' => 'Country field is required!',
      'contact.*.required' => 'Contact Number field is required!',
      'contact.*.numeric' => 'Contact Number field must be a number!',
      'contact.*.min' => 'Contact Number field must have at least 7 numbers!',
  ]);
    $a = [];
    foreach ($request->first_name as $key => $val) {
      if (!empty($val)) {
        $booking = new BookingForm();
        $booking->package_id = $request->package_id;
        $booking->first_name = $val;
        $booking->last_name = $request->last_name[$key] ?? null;
        // $booking->dob = $request->dob[$key];
        $booking->country = $request->country[$key];
        $booking->email = $request->email[$key];
        $booking->contact = $request->contact[$key];
        $booking->name_title = $request->name_title[$key];
        // $booking->passport_no = $request->passport_no[$key];
        array_push($a, $booking);
      }
    }
    $booking->travellers_info = json_encode($a);
    $booking->package_id = $request->package_id;
    $booking->costanddate_id = $request->costanddate_id;
    $booking->no_of_traveller = $request->no_of_traveller;
    $booking->payment_type = $request->payment_type;
    $booking->from_date = $request->from_date;
    $booking->to_date = $request->to_date;
    $booking->ip_address = request()->ip();
    $booking->how_found = $request->how_found;
    $booking->spec_req = $request->spec_req;
    $booking->emer_title = $request->emer_title;
    $booking->emer_name = $request->emer_name;
    $booking->emer_relation = $request->emer_relation;
    $booking->emer_contact = $request->emer_contact;
    $now = Carbon::now();
    $orderNo = $now->getTimestampMs();
    $booking->order_id = $orderNo;
    $booking->terms_and_conditions = $request->has('terms_and_conditions') ? true : false;
    $data = [
      'emer_title' => $request->emer_title,
      'emer_name' => $request->emer_name,
      'emer_contact' => $request->emer_contact,
      'emer_relation' => $request->emer_relation,
  ];
    // dd($booking);

    $booking->save();
    $package_name = Package::findOrFail($request->package_id);
    $package = Package::where('id',$request->package_id)->first();
    $booking->destination_name = $package_name->package_name;
    
    Mail::to('info@adventuremagictreks.com')->send(new BookingRequest($booking,$package));
    if ($request->payment_type == 'hbl') {
			return view('front.booking.payment', compact('booking'));
		}
    return redirect()->route('thankyou')->with( ['booking-form'=>'booking-form'] );
  }

  public function requestQuote(Request $request){
    $request->validate([
        'package_id' => 'required',
        'full_name' => 'required',
        'nationality' => 'required',
        'email' => 'required',
        'phone_number' => 'nullable',
        'how_found' => 'nullable',
        'message' => 'required',
        'g-recaptcha-response' => 'required',
         ],[ 'g-recaptcha-response.required' => 'The recaptcha field is required.']);
        // 'g-recaptcha-response' => 'required',
    // ]);
    $value = $request->except('_token','g-recaptcha-response');
    $value['ip_address'] = request()->ip();
    $quote = Quote::create($value);
    $package = Package::where('id',$request->package_id)->first();
    Mail::to('info@adventuremagictreks.com')->send(new QuoteRequest($quote,$package));

    return redirect()->route('thankyou')->with( ['quote'=>'quote'] );

  }
}
