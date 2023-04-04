@extends('front.layouts.app')
@section('content')
<!-- breadcrumb area start -->
<div class="breadcrumb-area jarallax" style="background-image:url({{ $dashboard_settings->contactus_banner_imageUrl() }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">Payment Form</h1>
                    <ul class="page-list">
                        <li><a href="{{route('indexHome')}}">Home</a></li>
                        <li>Payment Form</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area End -->
<div class="container">
    <div class="booking-form">
        <div class="booking-inner">
            <form method="post" action="{{route('PaymentRequest')}}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="name" class=""><i class="fa fa-calendar" aria-hidden="true"></i>Enter Amount To Pay:</label>
                                </div>
                                <div class="col-md-3">
                                <input type="text" id="input_amount" name="input_amount" value="{{$booking->amount}}" />

                                    </div>
                                <input type="text" id="merchant_id" name="booking_id" value="{{$booking->booking_id}}" hidden />
                                <!-- <input type="text" id="input_3d" name="input_3d" value="N"  hidden/> -->
                                <!-- <select name="input_3d" id="input_3d" data-validation="required" class="form-dropdown validate[required]">
            <option value="Y">Yes</option>
            <option value="N">No</option>
        </select> -->
                                <span>
                                    <input type="tel" id="success_url" name="success_url" class="form-textbox" size="50" value="{{env('APP_URL'). '/payment-success/'}}" hidden>
                                </span>
                                <span>
                                    <input type="tel" id="fail_url" name="fail_url" class="form-textbox" size="50" value="{{env('APP_URL'). '/payment-fail/'}}" hidden>
                                </span>
                                <span>
                                    <input type="tel" id="cancel_url" name="cancel_url" class="form-textbox" size="50" value="{{env('APP_URL'). '/payment-cancel/'}}" hidden>
                                </span>
                                <span>
                                    <input type="tel" id="backend_url" name="backend_url" class="form-textbox" size="50" value="{{env('APP_URL'). '/get-response/'}}" hidden>
                                </span>
                                <br>
                                <button class="btn btn-primary">Pay</button>
                            </div>
                            </div>
                            </div>
                            </div>
            </form>
        </div>
    </div>
</div>
@endsection