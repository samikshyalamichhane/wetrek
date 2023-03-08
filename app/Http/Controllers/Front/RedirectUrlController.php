<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BookingForm;

class RedirectUrlController extends Controller
{
    public function paymentSuccess(Request $request){
        $order = BookingForm::where('order_id',$request->orderNo)->first();
            $order->update([
                'payment_status' => 'paid',
            ]);
        return redirect('/')->with('success','Payment Suceessfull');

    }

    public function paymentFailure(Request $request){
        $order = BookingForm::where('order_id',$request->orderNo)->first();
            $order->update([
                'payment_status' => 'failed',
            ]);
        return redirect('/')->with('failed','Payment Failed');
    }

    public function paymentCancel(Request $request){
        $order = BookingForm::where('order_id',$request->orderNo)->first();
            $order->update([
                'payment_status' => 'cancel',
            ]);
        return redirect('/')->with('cancel','Payment Cancelled');

    }
}
