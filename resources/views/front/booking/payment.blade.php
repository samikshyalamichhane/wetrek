
@extends('front.layouts.app')
@section('title','Adventure Magic | Payment Form')
@section('content')

<!-- <div class="tour-detail-top-image" style="background-image:url(/assets/front/images/banner.png)">
   <div class="container">
   </div>
</div> -->
<div class="tourmaster-single-header inner-image" style="background-image: url('assets/front/images/banner.png');">
    <div class="inner-overlay"></div>
    <div class="tourmaster-single-header-background-overlay"></div>
    <div class="tourmaster-single-header-overlay"></div>

    <div class="tourmaster-single-header-container tourmaster-container">
        <div class="tourmaster-single-header-container-inner">
            <div class="tourmaster-single-header-title-wrap tourmaster-item-pdlr">
                <div class="container">
                    <div class="row">
                        <div class="COL-12 trip-topic triphead-block p-0">
                            <div class="tourmaster-single-header-gallery-wrap"></div>

                            <h1 class="tourmaster-single-header-title">Payment Form<p></p>
                            </h1>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="container payment-request">
    <form method="post" action="{{route('PaymentRequest')}}">
      @csrf
      
      <input type="text" id="api_key" name="api_key" value="f975523943b94e36b94ff6540d044fd1" hidden/>
      <input type="text" id="merchant_id" name="merchant_id" value="9103335782" hidden />
      <input type="text" id="merchant_id" name="booking_id" value="{{$booking->order_id}}" hidden />
      <div class="row booking-form payment-form">
          <input type="tel" id="input_currency" name="input_currency" class="form-textbox" size="50" value="USD" hidden>
      <!--    <div class="col-12 style="d-none">-->
      <!--<label class="form-sub-label" for="success_url" id="sublebel_success_url" style="min-height:13px"> Select Currency </label>-->
      <!--<select name="input_currency" id="input_currency" data-validation="required" class="form-dropdown validate[required]">-->
						<!--   <option value="NPR">NPR</option>-->
						<!--   <option value="USD">USD</option>-->
						<!--  </select>-->
						<!--  </div>-->
						  <div class="col-12">
						  <label class="form-sub-label" for="success_url" id="sublebel_success_url" style="min-height:13px"> Enter Amount  </label>
      <input type="text" id="input_amount" name="input_amount" />
      </div>
      <div class="col-12">
      <!--<label class="form-sub-label" for="success_url" id="sublebel_success_url" style="min-height:13px">Select Any One  </label>-->
      <select name="input_3d" id="input_3d" data-validation="required" class="form-dropdown validate[required]" hidden>
						   <option value="Y">Yes</option>
						   <!--<option value="N">No</option>-->
						  </select>
						  </div>
                    <span>
						 <input type="tel" id="success_url" name="success_url" class="form-textbox" size="50" value="{{env('APP_URL'). '/payment-success/'}}" hidden>
						  <!--<label class="form-sub-label" for="success_url" id="sublebel_success_url" style="min-height:13px"> Success URL </label> -->
					 </span>
                <span>
						 <input type="tel" id="fail_url" name="fail_url" class="form-textbox" size="50" value="{{env('APP_URL'). '/payment-fail/'}}" hidden>
						 <!-- <label class="form-sub-label" for="fail_url" id="sublebel_fail_url" style="min-height:13px"> Failed URL </label> -->
					    </span>
                   <span>
						 <input type="tel" id="cancel_url" name="cancel_url" class="form-textbox" size="50" value="{{env('APP_URL'). '/payment-cancel/'}}" hidden>
						 <!-- <label class="form-sub-label" for="cancel_url" id="sublebel_cancel_url" style="min-height:13px"> Cancel URL </label> -->
					    </span>
                   <span>
						 <input type="tel" id="backend_url" name="backend_url" class="form-textbox" size="50" value="{{env('APP_URL'). '/get-response/'}}" hidden>
						 <!-- <label class="form-sub-label" for="backend_url" id="sublebel_backendurl" style="min-height:13px"> Backend URL </label> -->
					    </span>
      
     <div class="col-12 button-pay">
      <button class="btn btn-primary">Pay</button>
      </div>
      </div>
   </form>
   </div>

   

   

@endsection