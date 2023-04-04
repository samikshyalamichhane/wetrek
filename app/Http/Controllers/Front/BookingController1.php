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

  public $merchantId;
    public $api_key;
    public $input_currency;
    public $input_3d;

    public function __construct()
    {
        $this->merchantId = config('hbl.hbl.merchant_id');
        $this->api_key = config('hbl.hbl.api_key');
        $this->input_currency = config('hbl.hbl.input_currency');
        $this->input_3d = config('hbl.hbl.input_3d');
    }

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
    'g-recaptcha-response' => 'required',
      //   ],[ 'g-recaptcha-response.required' => 'The recaptcha field is required.']);
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
    
    Mail::to('info@wetreknepal.com')->send(new BookingRequest($booking,$package));
    if ($request->payment_type == 'hbl') {
			return view('front.booking.payment', compact('booking'));
		}
    return redirect()->route('thankyou')->with( ['booking-form'=>'booking-form'] );
  }

  public function cardPaymentBooking(Request $request){
    try{
    $request->validate([
      'package_id' => 'required',
      'name' => 'required',
      'email' => 'required',
      'amount' =>'required'
    ],
    [
      'package_id.required' => 'Please Select any of the packages!',
      'name.required' => 'Name field is required!',
      'email.required' => 'Email field is required!',
      'amount.required' => 'Please Enter Valid Amount!',
      
  ]);
    $booking = new BookingForm();
    $booking->package_id = $request->package_id;
    $booking->first_name = $request->name;
    $booking->email = $request->email;
    $booking->amount = $request->amount;
    $booking->ip_address = request()->ip();
    $booking->booking_id = Carbon::now()->getTimestampMs();
    // dd($booking);
    $booking->save();
// dd($booking->booking_id,$this->merchantId ,$this->api_key,$this->input_currency,$request->amount,$this->input_3d,$request->success_url,$request->fail_url,$request->cancel_url,$request->backend_url);
    // Mail::to('info@classicvacationsnepal.com')->send(new BookingRequest($booking));
      $payment = new Payment();  
       // $joseResponse = $payment->ExecuteFormJose($_POST['merchant_id'],$_POST['api_key'],$_POST['input_currency'],$_POST['input_amount'],$_POST['input_3d'],$_POST['success_url'],$_POST['fail_url'],$_POST['cancel_url'],$_POST['backend_url'],);
        $joseResponse = $payment->ExecuteFormJose($booking->booking_id,$this->merchantId ,$this->api_key,$this->input_currency,$request->amount,$this->input_3d,$request->success_url,$request->fail_url,$request->cancel_url,$request->backend_url);
        $response_obj = json_decode($joseResponse);
        //echo $response_obj->response->Data->paymentPage->paymentPageURL;
        header("Location: ".$response_obj->response->Data->paymentPage->paymentPageURL);
        exit();
      } catch (GuzzleException $e) {
        throw $e;
        echo '\n Message: ' . $e->getMessage();
        echo '\n Trace: ' . $e->getTraceAsString();
    } catch (Exception $e) {
        throw $e;
        echo '\n Message: ' . $e->getMessage();
        echo '\n Trace: ' . $e->getTraceAsString();
    }
    // return redirect()->route('PaymentRequest')->with( ['booking'=>$booking] );
  }

  public function requestQuote(Request $request){
    $request->validate([
        'package_id' => 'required',
        'full_name' => 'required',
        'nationality' => 'required',
        'email' => 'required',
        'phone_number' => 'nullable',
        'how_found' => 'nullable',
        'message1' => 'required',
        'g-recaptcha-response' => 'required',
      //   ],[ 'g-recaptcha-response.required' => 'The recaptcha field is required.']);
        // 'g-recaptcha-response' => 'required',
        //  ]
        //  ,[ 'g-recaptcha-response.required' => 'The recaptcha field is required.']
        // );
        // 'g-recaptcha-response' => 'required',
    ]);
    $value = $request->except('_token','g-recaptcha-response');
    $value['ip_address'] = request()->ip();
    $quote = Quote::create($value);
    $package = Package::where('id',$request->package_id)->first();
    Mail::to('info@wetreknepal.com')->send(new QuoteRequest($quote,$package));

    return redirect()->route('thankyou')->with( ['quote'=>'quote'] );

  }
}
