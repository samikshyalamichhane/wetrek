@extends('front.layouts.app')
@section('content')

 <!-- breadcrumb area start -->
 <div class="breadcrumb-area jarallax" style="background-image:url({{asset('images/main/'.$destinationType->banner_image) ? asset('images/main/'.$destinationType->banner_image) :  $dashboard_settings->contactus_banner_imageUrl() }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="page-title">{{$destinationType->title}}</h1>
                        <ul class="page-list">
                            <li><a href="index.html">Home</a></li>
                            <li>{{$destinationType->title}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area End -->

    <!-- tour list area End -->
    <div class="tour-list-area pd-top-120">
        <div class="container">
            <div class="row">
                @foreach($destinationType->packages as $destination)
                <div class="col-lg-6">
                    <div class="single-destinations-list style-four">
                        <div class="blur-thumb" style="background-image:url({{ $destination->imageUrl() }});"></div>
                        <div class="details newdetail">
                          
                            
                            <h4 class="title"><a href="{{ route('resolvepath.show',$destination->slug) }}">{{$destination->package_name}}</a></h4>
                            <p class="content">{!! Illuminate\Support\Str::limit($destination->overview_description, 150) !!}</p>
                            <div class="list-price-meta">
                                <!-- <ul class="tp-list-meta d-inline-block">
                                    <li><i class="fa-solid fa-person-snowboarding"></i>{{count($destinationType->packages)}} packages</li>
                                </ul> -->
                                <div class="tp-price-meta d-inline-block">
                                    <p>Start With</p>
                                    <h2 class="tour-pric" style="color:#00ADE8">{{ $destination->price }} </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- tour list area End -->

@endsection
