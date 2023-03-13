@extends('front.layouts.app')
<title>We Trek | Who We Are</title>
@section('content')
<!-- breadcrumb area start -->
<div class="breadcrumb-area jarallax" style="background-image:url({{ $dashboard_settings->whoweare_bannerUrl() }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">About Us</h1>
                    <ul class="page-list">
                        <li><a href="index.html">About Us</a></li>
                        <li>Who We Are</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area End -->



<!-- about section area start -->
<div class="about-section pd-top-80 ">
    <div class="container">
        <div class="row ">
            <div class="col-lg-5 align-self-center">
                <div class="section-title mb-lg-0">
                    <h2 class="title">{{$dashboard_settings->title1}}</h2>
                    {!!$dashboard_settings->title2!!}
                </div>
            </div>
            <div class="col-lg-5 offset-lg-2">
                <div class="thumb about-section-right-thumb pd-bottom-120">
                    <img src="{{ $dashboard_settings->sqt_image1Url() }}" alt="img">
                    <img class="about-absolute-thumb" src="{{ $dashboard_settings->sqt_image2Url() }}" alt="img">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about section area end -->


<!-- intro area start -->
<div class="intro-area pd-top-108">
    <div class="container">
        <div class="section-title text-lg-center text-left">
            <h2 class="title">Why Choose <span>Us</span></h2>
        </div>
        <div class="row">
            @foreach($dashboard_whyWithUs as $data)
            <div class="col-lg-4 col-md-6">
                <div class="single-intro style-two">
                    <div class="thumb">
                        <img src="{{ $data->whywithus_iconUrl() }}" alt="img">
                    </div>
                    <h4 class="intro-title">{{$data->whywithus_title}}</h4>
                    {!! $data->description !!}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection