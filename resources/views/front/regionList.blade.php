@extends('front.layouts.app')
@section('content')
<!-- breadcrumb area start -->
<div class="breadcrumb-area jarallax" style="background-image:url({{asset('images/main/'. $region->banner_image)}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">{{$region->name}}</h1>
                    <ul class="page-list">
                        <li><a href="{{route('indexHome')}}">Home</a></li>
                        <li>{{$region->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area End -->

<!-- package area end -->
<div class="package-area pd-top-105 pd-bottom-70">
    <div class="container">

        <div class="row">
            <div class="col-md-10">
                <div class="section-title section-title-left-border style-two">
                    <!--<h2 class="title">Best Packages For You</h2>-->
                    {!! $region->description !!}
                </div>
            </div>
        </div>

        <div class="section-title">
            <h2 class="title">Our Offers For<span> {{$region->name}}</span></h2>

        </div>
        <div class="row dest-img">
            @foreach($regionPackages as $package )
            <div class="col-lg-4 col-sm-6 mb-4">
                <a href="{{ route('resolvepath.show',$package->slug) }}">
                    <div class="single-destinations-list style-two wow animated fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.1s">
                        <div class="thumb">
                            <img src="{{ $package->imageUrl() }}" alt="list">
                        </div>
                        <div class="details">

                            <h4 class="title">{{$package->package_name}}</h4>

                            <div class="tp-price-meta">
                                <p class="location"><img src="{{ asset('assets/front/img/icons/days-1.png') }}" alt="map" class="float-left">Duration<br>{{ $package->days_and_nights }}</p>
                                <h2>{{ $package->price }}</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            {{--<div class="col-lg-4 col-sm-6 mb-4">
                <a href="single-dtlpage.html">
                <div class="single-destinations-list style-two wow animated fadeInUp" data-wow-duration="0.4s"
                    data-wow-delay="0.1s">
                    <div class="thumb">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/Annapurna_II_north.jpg"
                            alt="list">
                    </div>
                    <div class="details">
                        
                        <h4 class="title">Bhaktapur half day tour</h4>
                        
                        <div class="tp-price-meta">
                            <p class="location"><img src="assets/img/icons/days-1.png" alt="map" class="float-left">Duration<br>1 Day</p>
                            <h2>$620 </h2>
                        </div>
                    </div>
                </div>
                </a>
            </div>


            <div class="col-lg-4 col-sm-6 mb-4">
                <a href="single-dtlpage.html">
                <div class="single-destinations-list style-two wow animated fadeInUp" data-wow-duration="0.4s"
                    data-wow-delay="0.1s">
                    <div class="thumb">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/Annapurna_II_north.jpg"
                            alt="list">
                    </div>
                    <div class="details">
                        
                        <h4 class="title">Bhaktapur half day tour</h4>
                        
                        <div class="tp-price-meta">
                            <p class="location"><img src="assets/img/icons/days-1.png" alt="map" class="float-left">Duration<br>1 Day</p>
                            <h2>$620 </h2>
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-lg-4 col-sm-6 mb-4">
                <a href="single-dtlpage.html">
                <div class="single-destinations-list style-two wow animated fadeInUp" data-wow-duration="0.4s"
                    data-wow-delay="0.1s">
                    <div class="thumb">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/Annapurna_II_north.jpg"
                            alt="list">
                    </div>
                    <div class="details">
                        
                        <h4 class="title">Bhaktapur half day tour</h4>
                        
                        <div class="tp-price-meta">
                            <p class="location"><img src="assets/img/icons/days-1.png" alt="map" class="float-left">Duration<br>1 Day</p>
                            <h2>$620 </h2>
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-lg-4 col-sm-6 mb-4">
                <a href="single-dtlpage.html">
                <div class="single-destinations-list style-two wow animated fadeInUp" data-wow-duration="0.4s"
                    data-wow-delay="0.1s">
                    <div class="thumb">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/Annapurna_II_north.jpg"
                            alt="list">
                    </div>
                    <div class="details">
                        
                        <h4 class="title">Bhaktapur half day tour</h4>
                        
                        <div class="tp-price-meta">
                            <p class="location"><img src="assets/img/icons/days-1.png" alt="map" class="float-left">Duration<br>1 Day</p>
                            <h2>$620 </h2>
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-lg-4 col-sm-6 mb-4">
                <a href="single-dtlpage.html">
                <div class="single-destinations-list style-two wow animated fadeInUp" data-wow-duration="0.4s"
                    data-wow-delay="0.1s">
                    <div class="thumb">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/Annapurna_II_north.jpg"
                            alt="list">
                    </div>
                    <div class="details">
                        
                        <h4 class="title">Bhaktapur half day tour</h4>
                        
                        <div class="tp-price-meta">
                            <p class="location"><img src="assets/img/icons/days-1.png" alt="map" class="float-left">Duration<br>1 Day</p>
                            <h2>$620 </h2>
                        </div>
                    </div>
                </div>
                </a>
            </div>--}}

        </div>
    </div>
</div>
<!-- package area end -->
@endsection