@extends('front.layouts.app')

@section('content')

<main class="mainpart">
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5422.34478941875!2d83.96086745779989!3d28.20866149578054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3995951c1e27b3f9%3A0xdc8b48fb01c20eac!2sNorth%20Nepal%20Travel%20%26%20Trek%20Pvt.Ltd!5e0!3m2!1sen!2snp!4v1634538683898!5m2!1sen!2snp" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>


    <div class="container py-4">
        <div class="px-4 border bg-light">
            <div class="row">
                <address class="py-4 mb-0 text-center col-md-4 border-right pr-md-4">
                    <ul class="mb-0 list-unstyled contatadd">
                        <li class="p-3 mb-3 bg-white border">
                            <i class="fa fa-map-marker fa-2x text-primary"></i>
                            <h5>Address</h5>
                            {{$dashboard_settings->address}}
                        </li>
                        <li class="p-3 mb-3 bg-white border">
                            <i class="fa fa-mobile fa-2x text-primary"></i>
                            <h5>Phone</h5>
                            <a href="tel:{{$dashboard_settings->telephone}}" class="text-dark">{{$dashboard_settings->telephone}}</a> <br>
                            <a href="tel:{{$dashboard_settings->mobile}}" class="text-dark">{{$dashboard_settings->mobile}}</a> 
                        </li>
                        <li class="p-3 bg-white border">
                            <i class="fa fa-at fa-2x text-primary"></i>
                            <h5>Email Address</h5>
                            <span>
                            <a href="mailto:{{$dashboard_settings->email}}" class="text-dark">{{$dashboard_settings->email}}</a></span>
                        </li>
                    </ul>
                </address>

                <!-- aside -->
                <aside class="py-3 col-md-8 contactbox">
                    <h3>Ask any kind of questions</h3>
                    <p>If you have any messages or suggestions then please fill the form below and submit to us. We appreciate your advice.</p>

                    <div class="form-wrapper">
                        @if(session('message'))
                            <div class="alert alert-info alert-dismissible" id="successMessage">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{session('message')}}
                            </div>
                        @endif
                        <form class="form" method="post" action="{{route('enquirySave')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <span class="form-group-wrap">
                                        <input type="text" name="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Your Name*" required>
                                    </span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <span class="form-group-wrap">
                                        <input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" aria-required="true" aria-invalid="false" placeholder="Email Address*" required>
                                    </span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <span class="form-group-wrap">
                                        <input type="text" name="number" value="" size="40" class="wpcf7-form-control wpcf7-text form-control" aria-invalid="false" placeholder="Phone Number">    
                                    </span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <span class="form-group-wrap">
                                        <input type="text" name="country" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Country*" required>
                                    </span>
                                </div>
                                <div class="col-md-12 form-group">
                                    <span class="form-group-wrap">
                                        <textarea name="message" cols="40" rows="7" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Message"></textarea>
                                    </span>
                                </div>

                                <div class="col-md-12 form-group">
                                    <input type="submit" name="contactus" value="Submit" class="wpcf7-form-control wpcf7-submit btn btn-submit">
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <ul class="mb-0 list-unstyled social-icons">
                        <h6>Follow us on</h6>
                        <a href="{{$dashboard_settings->facebook}}" target="_blank">
                            <i class="fa fa-facebook-f"></i>
                        </a>
                        <a href="{{$dashboard_settings->twitter}}" target="_blank">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="{{$dashboard_settings->youtube}}" target="_blank">
                            <i class="fa fa-youtube"></i>
                        </a>
                        <a href="{{$dashboard_settings->instagram}}" target="_blank">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a href="{{$dashboard_settings->pinterest}}" target="_blank">
                            <i class="fa fa-pinterest-p"></i>
                        </a>
                        <a href="https://www.tripadvisor.com/Attraction_Review-g293891-d14099173-Reviews-North_Nepal_Travels_Treks-Pokhara_Gandaki_Zone_Western_Region.html" target="_blank">
                            <i class="fa fa-tripadvisor"></i>
                        </a>                 
                    </ul>

                </aside>
                <!-- end of aside -->
            </div>
        </div>
    </div>
</main>

<section class="py-3 bg-light socialbox border-top">
    <div class="container">
        <ul class="mb-0 row list-unstyled">
            <li class="py-3 col-6 col-md-2">
                <span class="pr-2 align-middle d-table-cell">
                <i class="fa fa-facebook"></i>
                </span>
                <a href="{{$dashboard_settings->facebook}}" class="align-middle d-table-cell">
                <p>Find us on Facebook</p>
                </a>
            </li>
            <li class="py-3 col-6 col-md-2">
                <span class="pr-2 align-middle d-table-cell">
                <i class="fa fa-instagram"></i>
                </span>
                <a href="{{$dashboard_settings->instagram}}" class="align-middle d-table-cell">
                <p>Follow us on Instagram</p>
                </a>
            </li>
             <li class="py-3 col-6 col-md-2">
                <span class="pr-2 align-middle d-table-cell">
                <i class="fa fa-pinterest"></i>
                </span>
                <a href="{{$dashboard_settings->pinterest}}" class="align-middle d-table-cell">
                <p>
                    Follow us on Pinterest
                    </p>
                </a>
            </li>
            <li class="py-3 col-6 col-md-2">
                <span class="pr-2 align-middle d-table-cell">
                <i class="fa fa-twitter"></i>
                </span>
                <a href="{{$dashboard_settings->twitter}}" class="align-middle d-table-cell">
                <p>
                    Follow us on Twitter
                    </p>
                </a>
            </li>
            <li class="py-3 col-6 col-md-2">
                <span class="pr-2 align-middle d-table-cell">
                <i class="fa fa-youtube"></i>
                </span>
                <a href="{{$dashboard_settings->youtube}}" class="align-middle d-table-cell">
                <p>
                    Watch us on YouTube
                    </p>
                </a>
            </li>
            <li class="py-3 col-6 col-md-2">
                <span class="pr-2 align-middle d-table-cell">
                <i class="fa fa-tripadvisor"></i>
                </span>
                <a href="https://www.tripadvisor.com/Attraction_Review-g293891-d14099173-Reviews-North_Nepal_Travels_Treks-Pokhara_Gandaki_Zone_Western_Region.html" class="align-middle d-table-cell">
                <p>
                    Find us on TripAdvisor
                    </p>
                </a>
            </li>
        </ul>
    </div>
</section>


  @endsection
