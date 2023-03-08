<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BookingForm;
use App\Models\Package;
use Hbl;
use Thebikramlama\Hbl\Hbl as HblHbl;

class PaymentController extends Controller
{
    public function payment__hbl()
	{
	    $og['title'] = 'Make Online Payment - Payment Form';
		$packages = Package::published()->get();
		return view('front.booking.payment',compact('packages','og'));
	}

	public function getPaymentResponse(Request $request)
	{
		if (is_null($request->respCode)) {
			return redirect()->route('indexHome')->with('message', 'Payment is canceled');
		}
		if ($request->respCode == '00') {

			$oldRecord = BookingForm::findOrFail($request->userDefined2);

			$oldRecord->update([
				'amount' => $request->userDefined1,
			]);

			$formData = [
				'email' => $oldRecord->email,
				'amount' =>  $request->userDefined1,
				'destination_name' => $oldRecord->destination_name,
			];

			// Mail::send('email.paymentSuccess', $formData, function ($message) use ($formData, $request) {
			// 	$message->to($formData['email'])->from('info@bline.com');
			// 	$message->subject('Payment Successfull');
			// });

			return redirect()->route('indexHome')->with('message', 'Payment was successfull');
		}
		return redirect()->route('indexHome')->with('message', 'Payment is not successfull');
	}

	public function paymentSuccess()
	{
		return redirect()->route('indexHome')->with('message', 'Payment was successfull');
	}
}
