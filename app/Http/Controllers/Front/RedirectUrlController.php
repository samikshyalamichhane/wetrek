<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\BookingMail;
use App\Mail\BookingMailReply;
use App\Models\BookingForm;
use Illuminate\Support\Facades\Mail;

class RedirectUrlController extends Controller
{
    public function paymentSuccess(Request $request){
        $booking = BookingForm::where('booking_id',$request->orderNo)->first();

            $booking->update([
                'payment_status' => 'paid',
            ]);
    Mail::to('info@wetreknepal.com')->send(new BookingMail($booking));
    Mail::to('info@wetreknepal.com')->send(new BookingMailReply($booking));
    return redirect()->route('thankyou')->with(['booking-successfull' => 'booking-successfull']);
        // return redirect()->route('indexHome')->with( ['successfull'=>'Payment Successfull'] );

    }

    public function paymentFailure(Request $request){
        $order = BookingForm::where('booking_id',$request->orderNo)->first();
            $order->update([
                'payment_status' => 'failed',
            ]);
        return redirect()->route('indexHome')->with( ['failure'=>'Payment Failed'] );
    }

    public function paymentCancel(Request $request){
        $order = BookingForm::where('booking_id',$request->orderNo)->first();
            $order->update([
                'payment_status' => 'cancel',
            ]);
        return redirect()->route('indexHome')->with(['cancel'=>'Payment Cancelled']);

    }
}
