@extends('front.layouts.app')
@section('content')

 <!-- breadcrumb area start -->
 <div class="breadcrumb-area jarallax" style="background-image:url({{ $dashboard_settings->contactus_banner_imageUrl() }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="page-title">Contact Us</h1>
                        <ul class="page-list">
                            <li><a href="index.html">Home</a></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area End -->

    <!-- contact area End -->
    <div class="contact-area pd-top-108">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-lg-center text-left">
                        <h2 class="title">Get In Touch!</h2>
                        {!!$dashboard_settings->contactus_description!!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <div class="thumb">
                        <img src="{{ $dashboard_settings->contactus_imageUrl() }}" alt="img">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <form class="tp-form-wrap" method="post" action="{{route('enquirySave')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Name</span>
                                    <input type="text" name="name">
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Number</span>
                                    <input type="text" name="number">
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Email</span>
                                    <input type="email" name="email">
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Message</span>
                                    <textarea name="message"></textarea>
                                </label>
                            </div>
                            <div class="col-12">
                                <!-- <a class="btn btn-yellow" href="#">Send Message</a> -->
                                <button type="submit" name="contactus" value="Submit" class="btn btn-yellow">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area End -->
    
    <!-- contact info area End -->
    <div class="contact-info-area pd-top-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 order-lg-12">
                    <iframe class="contact-map" src="{{$dashboard_settings->googlemap}}"></iframe>
                </div>
                <div class="col-xl-4 col-lg-4 order-lg-1">
                    <div class="contact-info bg-gray">
                        <p>
                            <i class="fa fa-map-marker"></i> 
                            <span>{{$dashboard_settings->nepal_location}}</span>
                        </p>
                        <p>
                            <i class="fa fa-clock-o"></i> 
                            <span>Office Hour 9:00 to 7:00 Sunday 10:00 to 5:00</span>
                        </p>
                        <p>
                            <i class="fa fa-envelope"></i> 
                            <span>Email: <span>{{$dashboard_settings->nepal_email}}</span></span>
                        </p>
                        <p>
                            <i class="fa fa-phone"></i> 
                            <span>
                                Cell phone: <span>{{$dashboard_settings->nepal_cell}}</span> <br>
                                Telephone: <span>{{$dashboard_settings->nepal_office_phone}}</span>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact info area End -->
@endsection
@push('scripts')
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>



@endpush