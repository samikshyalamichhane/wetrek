<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BookingForm;
use Payment;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Carbon\Carbon;

class HblController extends Controller
{
   public function PaymentRequest(Request $request){
    try {
        // dd($request->all());
        if($request->booking_id){
        $booking = BookingForm::where('order_id',$request->booking_id)->first();
        // dd($booking);
        $booking_id = $booking->order_id;
        $booking->update([
            'currency' => $request->input_currency,
            'amount' => $request->input_amount,
            // 'payment_type' => 'hbl',
        ]);
        }
        else{
            $now = Carbon::now();
            $orderNo = $now->getTimestampMs();
            $booking = BookingForm::create([
            'package_id'=>$request->package_id,
            'first_name'=>$request->name,
            'email'=>$request->email,
            'currency' => $request->input_currency,
            'amount' => $request->input_amount,
            'order_id'=>$orderNo,
            'ip_address'=>request()->ip()
        ]);
        // dd($booking);
        $booking_id = $booking->order_id;
        }
        
        
        if($request->input_currency == 'USD'){
            $api_key = 'f975523943b94e36b94ff6540d044fd1';
        } else{
            $api_key = '2e6d3d87f26548aea2c43777175eb161';
        }
        // dd($booking);
        //ExecuteFormJose($mid,$api_key,$curr,$amt,$threeD,$success_url,$failed_url,$cancel_url,$backend_url): string
        $payment = new Payment();  
        //echo "Payment jose request \n ";

        // $joseResponse = $payment->ExecuteFormJose($_POST['merchant_id'],$_POST['api_key'],$_POST['input_currency'],$_POST['input_amount'],$_POST['input_3d'],$_POST['success_url'],$_POST['fail_url'],$_POST['cancel_url'],$_POST['backend_url'],);
        $joseResponse = $payment->ExecuteFormJose($booking_id,$request->merchant_id,$api_key,$request->input_currency,$request->input_amount,$request->input_3d,$request->success_url,$request->fail_url,$request->cancel_url,$request->backend_url,);
        //echo "Response data : <pre>\n";
        //var_dump(json_decode($joseResponse));
        $response_obj = json_decode($joseResponse);
        //echo $response_obj->response->Data->paymentPage->paymentPageURL;
        header("Location: ".$response_obj->response->Data->paymentPage->paymentPageURL);
        exit();
       // echo "\n";
    
    } catch (GuzzleException $e) {
        throw $e;
        echo '\n Message: ' . $e->getMessage();
        echo '\n Trace: ' . $e->getTraceAsString();
    } catch (Exception $e) {
        throw $e;
        echo '\n Message: ' . $e->getMessage();
        echo '\n Trace: ' . $e->getTraceAsString();
    }
   }
}
