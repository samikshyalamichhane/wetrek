@extends('front.layouts.app')
@section('content')
{{-- {{asset('assets/front/    ')}} --}}


    <!-- ========== Banner Dynamic ========== -->
    <!--<section class="banner-area" style="background-image:url(-->
    <!--    @if (isset($sliders->image))-->
    <!--    {{asset('images/main/'.$sliders->image)}}-->
    <!--    @endif-->
    <!--    )">-->
    <!--    <div class="overlay overlay-bg"></div>-->
    <!--    <div class="container">-->
    <!--        <div class="row fullscreen align-items-center justify-content-between">-->
    <!--            <div class="col-lg-12 col-md-12 banner-left text-center">-->


    <!--                <div class="row mt-5">-->
    <!--                    <div class="col-lg-8 col-md-10 col-12 mx-auto">-->
    <!--                        <form action="{{ route('findAll') }}" method="get" class="banner-area-form">-->
    <!--                            <div class="input-group mb-3">-->
    <!--                                <input type="text" class="form-control" name="title" id="title" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2" required>-->
    <!--                                <div class="input-group-append">-->
    <!--                                    <button class="btn primary-btn" type="submit" id="button-addon2">-->
    <!--                                        <i class="fa fa-search mr-2"></i>-->
    <!--                                        Search-->
    <!--                                    </button>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </form>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <div class="banner-area">
       <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($sliders as $key=>$slider)
                    <div class="carousel-item {{ $key==0?'carousel-item active item':'' }}">
                        @if (isset($slider->image))

                            <img class="animate__animated animate__bounce d-block w-100" src="{{asset('images/main/'.$slider->image)}}" alt="First slide">
                        @endif
                        <div class="carousel-caption">
                        <div class="container">
                            <div class="row mt-md-5 mt-0 fullscreen align-items-center justify-content-between">
                                <div class="col-lg-8 col-md-10 col-12 mx-auto px-0">
                                    <div class="banner-text">
                                    <h3 class="slide-up"><a href="{{$slider->link}}">{{  $slider->title }}</a></h3>
                                    <p class="slide-up">{{ $slider->subtitle}}</p>
                                    </div>
                                    <!--<div class="banner-overlay"></div>-->
                                    <form action="{{ route('findAll') }}" method="get" class="banner-area-form">
                                        <div class="input-group mb-md-3 mb-0">
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2" required>
                                            <div class="input-group-append">
                                                <button class="btn primary-btn" type="submit" id="button-addon2">
                                                        <i class="fa fa-search mr-2"></i>
                                                    Search
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
    {{-- <div class="carousel-item">
      <img class="d-block w-100" src="http://classic.webhousejapan.com/images/main/Wed-07-23-37-1176753327-EBC.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
          <div class="row mt-5 fullscreen align-items-center justify-content-between">
                    <div class="col-lg-8 col-md-10 col-12 mx-auto">
                    <form action="{{ route('findAll') }}" method="get" class="banner-area-form">
                   <div class="input-group mb-3">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2" required>
                                 <div class="input-group-append">
                                   <button class="btn primary-btn" type="submit" id="button-addon2">
                                        <i class="fa fa-search mr-2"></i>
                                     Search
                                    </button>
                               </div>
                           </div>
                            </form>
                       </div>
                   </div>
        </div>
    </div>
    <div class="carousel-item item">
      <img class="d-block w-100" src="http://classic.webhousejapan.com/images/main/Wed-07-23-37-1176753327-EBC.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
          <div class="row mt-5 fullscreen align-items-center justify-content-between">
                    <div class="col-lg-8 col-md-10 col-12 mx-auto">
                    <form action="{{ route('findAll') }}" method="get" class="banner-area-form">
                   <div class="input-group mb-3">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2" required>
                                 <div class="input-group-append">
                                   <button class="btn primary-btn" type="submit" id="button-addon2">
                                        <i class="fa fa-search mr-2"></i>
                                     Search
                                    </button>
                               </div>
                           </div>
                            </form>
                       </div>
                   </div>
      </div>
    </div> --}}
            </div>
            <div class="container">
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
</div>
</div>
<div class="newoverlay"></div>
    @if(session('message1'))
        <div class="alert alert-info alert-dismissible" id="successMessage">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{session('message1')}}
        </div>
    @endif
    <!-- ========== End of Banner ========== -->

    <!-- ========== About Dynamic ========== -->
    <section class="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1>Welcome to <span>Classic Vacations Nepal !</span></h1>
                    <p>
                        {!!@$dashboard_settings->vacation_detail !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- ========== End of About ========== -->

    <!-- ========== Features Dynamic ========== -->
        <section class="feature newspace">
            <div class="feature-wrapper">
                <div class="container">
                    <div class="section-title color-title">
                        <h1>Why Travel <span>With Us!</span></h1>
                        <p>
                            {!! $dashboard_settings->travelwithus_detail !!}
                        </p>
                    </div>

                    <div class="row">
                        @foreach ($travelwithuss as $travel)
                            @if (isset($travel->whywithus_description))
                                <div class="col-md-4 col-sm-6 col-12 mx-auto mb-4">
                                    <div class="media feature-card">
                                        <div class="icon-box mr-3">
                                            {!! $travel->whywithus_icon !!}
                                        </div>
                                        <div class="media-body newwhyus">
                                            <h5 class="mt-0"><a href="{{ route('whyus') }}">{{ $travel->whywithus_title }}</a></h5>
                                            <p>{!! $travel->whywithus_description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        {{-- <div class="col-md-4 col-sm-6 col-12 mx-auto mb-4">
                            <div class="media feature-card">
                                <div class="icon-box mr-3">
                                    <i class="lnr lnr-users"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0">Personalized, Private Or Small Group Travel Trip </h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 mx-auto mb-4">
                            <div class="media feature-card">
                                <div class="icon-box mr-3">
                                    <i class="lnr lnr-bus"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0">Fun, Flexibility & Authentic Experience Travel </h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 mx-auto mb-4">
                            <div class="media feature-card">
                                <div class="icon-box mr-3">
                                    <i class="lnr lnr-calendar-full"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0">Book & Travel with Confidence Trip </h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 mx-auto mb-4">
                            <div class="media feature-card">
                                <div class="icon-box mr-3">
                                    <i class="lnr lnr-heart-pulse"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0">Price Guarantee & Guaranteed Departure </h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 mx-auto mb-4">
                            <div class="media feature-card">
                                <div class="icon-box mr-3">
                                    <i class="lnr lnr-car"></i>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0">Responsible Travel</h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
    <!-- ========== End of Features ========== -->

    <!-- ========== Upcoming Trips Dynamic========== -->
    <section class="upcoming-trips newspace">
        <div class="container">
            <div class="section-title nnt">
                <h1>Upcoming <span>Trips</span></h1>
                <p>
                    {!! $dashboard_settings->upcoming_description !!}
                    {{-- List below are our upcoming trips this month and next few months so you are never too late to book your adventure vacations in Nepal. You are welcome to join our small group departure or write to us for a private trip. --}}
                </p>
            </div>

            <div class="row">
                @foreach ($upcomingTrek as $package)
                <div class="col-lg-4 col-md-6 mx-auto">
                    <div class="card single_place border-0 newtrips">
                        <div class="thumb">
                            <a href="{{route('packageDetails', $package->slug)}}">
                                <img src="{{asset('images/main/'.$package->image)}}" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="place_info card-body tripinfo">
                            <a href="{{route('packageDetails', $package->slug)}}" class="place_info-title">
                                <h3>{{ $package->package_name }}</h3>
                            </a>
                            <span class="d-flex rating">
                                {!! str_repeat('<span><i class="fa fa-star"></i></span>', $package->star) !!}
                                {!! str_repeat('<span><i class="fa fa-star-o"></i></span>', 5 - $package->star) !!}
                                {{-- <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i> --}}
                            </span>
                            <div class="price_days d-flex justify-content-between">
                                <div class="days">
                                    <i class="lnr lnr-calendar-full"></i>
                                    <a href="{{route('packageDetails', $package->slug)}}">{{ $package->days_and_nights }}</a>
                                </div>

                                <div class="price">
                                    <span>{{ $package->price }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach

                {{-- <div class="col-lg-4 col-md-6 mx-auto">
                    <div class="card single_place border-0">
                        <div class="thumb">
                            <img src="{{asset('assets/front/img/place-2.png')}}" alt="" class="img-fluid">
                        </div>
                        <div class="place_info card-body">
                            <a href="#" class="place_info-title">
                                <h3>Classic Vacation in Nepal</h3>
                            </a>
                            <span class="d-flex rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </span>
                            <div class="price_days d-flex justify-content-between">
                                <div class="days">
                                    <i class="lnr lnr-calendar-full"></i>
                                    <a href="#">10 Days</a>
                                </div>

                                <div class="price">
                                    <span>USD $4,690</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mx-auto">
                    <div class="card single_place border-0">
                        <div class="thumb">
                            <img src="{{asset('assets/front/img/place-2.png')}}" alt="" class="img-fluid">
                        </div>
                        <div class="place_info card-body">
                            <a href="#" class="place_info-title">
                                <h3>Classic Vacation in Nepal</h3>
                            </a>
                            <span class="d-flex rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </span>
                            <div class="price_days d-flex justify-content-between">
                                <div class="days">
                                    <i class="lnr lnr-calendar-full"></i>
                                    <a href="#">10 Days</a>
                                </div>

                                <div class="price">
                                    <span>USD $4,690</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- ========== End of Upcoming Trips ========== -->

    <!-- ========== Best Seller Dynamic========== -->
    <section class="best-seller newspace">
        <div class="container">
            <div class="section-title nnt nns">
                <h1>Our Best Seller For <span>2022/2023</span></h1>
                <p>
                    {!! $dashboard_settings->best_seller_description !!}
                    {{-- Here, below, we have our best seller packages for the travel year of 2022 & 2023. We carefully define our best seller packages every year from the customer booking a package with us. So, if you are looking for a best seller package and vacations, book one of these without any hesitation. --}}
                </p>
            </div>

            <div class="row">
                @foreach ($bestSells as $package)
                    <div class="col-lg-4 col-md-6 mx-auto">
                        <div class="card single_place border-0 newtrips">
                            <div class="thumb">
                                <a href="{{route('packageDetails', $package->slug)}}">
                                    <img src="{{asset('images/main/'.$package->image)}}" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="place_info card-body tripinfo">
                                <a href="{{route('packageDetails', $package->slug)}}" class="place_info-title">
                                    <h3>{{ $package->package_name }}</h3>
                                </a>
                                <span class="d-flex rating">
                                    {!! str_repeat('<span><i class="fa fa-star"></i></span>', $package->star) !!}
                                    {!! str_repeat('<span><i class="fa fa-star-o"></i></span>', 5 - $package->star) !!}
                                    {{-- <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i> --}}
                                </span>
                                <div class="price_days d-flex justify-content-between">
                                    <div class="days">
                                        <i class="lnr lnr-calendar-full"></i>
                                        <a href="{{route('packageDetails', $package->slug)}}">{{ $package->days_and_nights }}</a>
                                    </div>

                                    <div class="price">
                                        <span>{{ $package->price }}</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-lg-4 col-md-6 mx-auto">
                    <div class="card single_place border-0">
                        <div class="thumb">
                            <img src="{{asset('assets/front/img/place-2.png')}}" alt="" class="img-fluid">
                        </div>
                        <div class="place_info card-body">
                            <a href="#" class="place_info-title">
                                <h3>Classic Vacation in Nepal</h3>
                            </a>
                            <span class="d-flex rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </span>
                            <div class="price_days d-flex justify-content-between">
                                <div class="days">
                                    <i class="lnr lnr-calendar-full"></i>
                                    <a href="#">10 Days</a>
                                </div>

                                <div class="price">
                                    <span>USD $4,690</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mx-auto">
                    <div class="card single_place border-0">
                        <div class="thumb">
                            <img src="{{asset('assets/front/img/place-2.png')}}" alt="" class="img-fluid">
                        </div>
                        <div class="place_info card-body">
                            <a href="#" class="place_info-title">
                                <h3>Classic Vacation in Nepal</h3>
                            </a>
                            <span class="d-flex rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </span>
                            <div class="price_days d-flex justify-content-between">
                                <div class="days">
                                    <i class="lnr lnr-calendar-full"></i>
                                    <a href="#">10 Days</a>
                                </div>

                                <div class="price">
                                    <span>USD $4,690</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mx-auto">
                    <div class="card single_place border-0">
                        <div class="thumb">
                            <img src="{{asset('assets/front/img/place-2.png')}}" alt="" class="img-fluid">
                        </div>
                        <div class="place_info card-body">
                            <a href="#" class="place_info-title">
                                <h3>Classic Vacation in Nepal</h3>
                            </a>
                            <span class="d-flex rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </span>
                            <div class="price_days d-flex justify-content-between">
                                <div class="days">
                                    <i class="lnr lnr-calendar-full"></i>
                                    <a href="#">10 Days</a>
                                </div>

                                <div class="price">
                                    <span>USD $4,690</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mx-auto">
                    <div class="card single_place border-0">
                        <div class="thumb">
                            <img src="{{asset('assets/front/img/place-2.png')}}" alt="" class="img-fluid">
                        </div>
                        <div class="place_info card-body">
                            <a href="#" class="place_info-title">
                                <h3>Classic Vacation in Nepal</h3>
                            </a>
                            <span class="d-flex rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </span>
                            <div class="price_days d-flex justify-content-between">
                                <div class="days">
                                    <i class="lnr lnr-calendar-full"></i>
                                    <a href="#">10 Days</a>
                                </div>

                                <div class="price">
                                    <span>USD $4,690</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mx-auto">
                    <div class="card single_place border-0">
                        <div class="thumb">
                            <img src="{{asset('assets/front/img/place-2.png')}}" alt="" class="img-fluid">
                        </div>
                        <div class="place_info card-body">
                            <a href="#" class="place_info-title">
                                <h3>Classic Vacation in Nepal</h3>
                            </a>
                            <span class="d-flex rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </span>
                            <div class="price_days d-flex justify-content-between">
                                <div class="days">
                                    <i class="lnr lnr-calendar-full"></i>
                                    <a href="#">10 Days</a>
                                </div>

                                <div class="price">
                                    <span>USD $4,690</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> --}}

            </div>
        </div>
    </section>
    <!-- ========== End of Best Seller ========== -->

    <!-- ========== Travel Style ========== -->
    @if (isset($travelStyles[0]))
    <section class="travel-style newspace">
        <div class="travel-style-wrapper">
            <div class="container">
                <div class="section-title nnt">
                    <h1>Pick Your <span>Travel Style</span></h1>
                    <p>
                        {!! $dashboard_settings->pick_travelStyle_description !!}
                        {{-- How do you travel? Are you traveling with your family, and looking for a private vacation? Are you traveling in a small group of friends and family or traveling solo but want to join a small group departure? At Classic Vacations Nepal, you could choose to travel the way you want, we are more than happy to organize your adventure travel at your need. --}}
                    </p>
                </div>

                <div class="row">
                    @foreach($travelStyles as $travelStyle)
                    <div class="col-md-4 col-sm-12 mb-4">
                        <div class="single-destination">
                            <div class="thumb">
                                <div class="overlay overlay-bg"></div>
                                <a href="{{route('travelStyleDetail', $travelStyle->slug)}}"><img class="img-fluid" src="{{asset('images/main/'. $travelStyle->image)}}" alt=""></a>
                            </div>
                            <div class="desc">
                                <h4>{{ $travelStyle->title }}</h4>
                                <a href="{{route('travelStyleDetail', $travelStyle->slug)}}" class="price-btn">More Detail</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-md-4 col-sm-12 mb-4">
                        <div class="single-destination">
                            <div class="thumb">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="{{asset('assets/front/img/d1.png')}}" alt="">
                            </div>
                            <div class="desc">
                                <h4>Couple or Travel with Friends</h4>
                                <a href="#" class="price-btn">More Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 mx-auto mb-4">
                        <div class="single-destination">
                            <div class="thumb">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="{{asset('assets/front/img/d1.png')}}" alt="">
                            </div>
                            <div class="desc">
                                <h4>Private Travel</h4>
                                <a href="#" class="price-btn">More Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 mb-4">
                        <div class="single-destination">
                            <div class="thumb">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="{{asset('assets/front/img/d1.png')}}" alt="">
                            </div>
                            <div class="desc">
                                <h4>Family Travel</h4>
                                <a href="#" class="price-btn">More Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 mb-4">
                        <div class="single-destination">
                            <div class="thumb">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="{{asset('assets/front/img/d1.png')}}" alt="">
                            </div>
                            <div class="desc">
                                <h4>Corporate Travel</h4>
                                <a href="#" class="price-btn">More Detail</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- ========== End of Travel Style ========== -->

    <!-- ========== Adventure Dynamic========== -->
    <section class="adventure newspace">
        <div class="container">
            <div class="section-title color-title">
                <h1>Adventure Road <span>Trip in Nepal</span></h1>
                <p>
                    {!! $dashboard_settings->adventure_roadTrip_description !!}
                    {{-- Hello! I do not want to hike, walk or trek in the mountain valley but would like to be in the lap of himalayas and enjoy the nature and landscapes in remote mountain valleys so is it possible? Oh, yes for sure. Classic Vacations Nepal has carefully crafted the adventure road trip in nepal packages to meet your needs. Choose your trip from the suggestion below. --}}
                </p>
            </div>
            <div class="row">
                @foreach ($adventureRoadTrip as $package)
                    <div class="col-lg-4 col-md-6 mx-auto">
                        <div class="card single_place border-0 newtrips">
                            <div class="thumb">
                                <a href="{{route('packageDetails', $package->slug)}}">
                                    <img src="{{asset('images/main/'.$package->image)}}" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="place_info card-body tripinfo">
                                <a href="{{route('packageDetails', $package->slug)}}" class="place_info-title">
                                    <h3>{{ $package->package_name }}</h3>
                                </a>
                                <span class="d-flex rating">
                                    {!! str_repeat('<span><i class="fa fa-star"></i></span>', $package->star) !!}
                                    {!! str_repeat('<span><i class="fa fa-star-o"></i></span>', 5 - $package->star) !!}
                                    {{-- <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i> --}}
                                </span>
                                <div class="price_days d-flex justify-content-between">
                                    <div class="days">
                                        <i class="lnr lnr-calendar-full"></i>
                                        <a href="{{route('packageDetails', $package->slug)}}">{{ $package->days_and_nights }}</a>
                                    </div>

                                    <div class="price">
                                        <span>{{ $package->price }}</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-lg-4 col-md-6 mx-auto">
                    <div class="card single_place border-0">
                        <div class="thumb">
                            <img src="{{asset('assets/front/img/adventure-2.png')}}" alt="" class="img-fluid">
                        </div>
                        <div class="place_info card-body">
                            <a href="#" class="place_info-title">
                                <h3>Bardia Wildlife Safari & Rara Lake Road Trip</h3>
                            </a>
                            <span class="d-flex rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </span>
                            <div class="price_days d-flex justify-content-between">
                                <div class="days">
                                    <i class="lnr lnr-calendar-full"></i>
                                    <a href="#">10 Days</a>
                                </div>

                                <div class="price">
                                    <span>USD $4,690</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mx-auto">
                    <div class="card single_place border-0">
                        <div class="thumb">
                            <img src="{{asset('assets/front/img/adventure-3.png')}}" alt="" class="img-fluid">
                        </div>
                        <div class="place_info card-body">
                            <a href="#" class="place_info-title">
                                <h3>Manang & Annapurna Road Trip</h3>
                            </a>
                            <span class="d-flex rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </span>
                            <div class="price_days d-flex justify-content-between">
                                <div class="days">
                                    <i class="lnr lnr-calendar-full"></i>
                                    <a href="#">10 Days</a>
                                </div>

                                <div class="price">
                                    <span>USD $4,690</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- ========== End of Adventure ========== -->

    <!-- ========== Destination ========== -->
    <section class="destination newdest newspace">
        <div class="container">
            <div class="section-title color-title">
                <h1>Our <span>Destinations</span></h1>
                <p>
                    {!! $dashboard_settings->our_destinations_description !!}
                    {{-- Classic Vacations Nepal organizes cultural tours and adventure travel, trekking mainly to Nepal, Bhutan, Tibet. By clicking to either destination listed below, you will be linked to our packages to the respective destinations. --}}
                </p>
            </div>
            <div class="row">
                @foreach ($destinations as $destination)
                    <div class="col-lg-4 col-md-6 mx-auto">
                        <div class="card single_place border-0 single-destination">
                            <div class="thumb">
                                <div class="overlay overlay-bg"></div>
                                <img src="{{asset('images/main/'. $destination->banner_image)}}" alt="" class="img-fluid">
                            </div>
                            <div class="place_info card-body desc">
                                <a href="{{route('resolvepath.show',[$destination->slug])}}" class="place_info-title">
                                    <h3>{{ $destination->country_name }}</h3>
                                </a>
                                <p>
                                    <!--{!! $destination->intro !!}-->
                                    <!--{!! str_limit($destination->intro, 260) !!}-->
                                </p>
                            </div>

                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-lg-4 col-md-6 mx-auto">
                    <div class="card single_place border-0">
                        <div class="thumb">
                            <img src="{{asset('assets/front/img/place-2.png')}}" alt="" class="img-fluid">
                        </div>
                        <div class="place_info card-body">
                            <a href="#" class="place_info-title">
                                <h3> Tibet</h3>
                            </a>
                            <p>
                                Lhasa-Forbidden City of Tibet. Southern Part in China
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mx-auto">
                    <div class="card single_place border-0">
                        <div class="thumb">
                            <img src="{{asset('assets/front/img/place-2.png')}}" alt="" class="img-fluid">
                        </div>
                        <div class="place_info card-body">
                            <a href="#" class="place_info-title">
                                <h3> Bhutan</h3>
                            </a>
                            <p>
                                Lhasa-Forbidden City of Tibet. Southern Part in China
                            </p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- ========== End of Destination ========== -->

    <!-- ========== Testimonial Dynamic========== -->
    @if (isset($travelersreview[0]))
        <section class="testimonial newspace" style="background-image: url('{{asset('images/main/'.$dashboard_settings->traveler_review_banner)}}');">
            <div class="testimonial-overlay">
            <div class="container">
                <div class="section-title nnt">
                    <h1>Travelers <span>Reviews</span></h1>
                    <p>{!! $dashboard_settings->traveler_reviews_description !!}</p>
                        {{-- Read more about what our clients are saying about us? --}}
                </div>
                <!-- Slider -->
                <div class="testimonial-slider swiper">
                    <div class="swiper-wrapper">
                        @foreach ($travelersreview as $review)
                            <div class="swiper-slide">
                                <div class="single-testimonial">
                                    <div class="card border-0 text-center">
                                        <p>
                                            {!! str_limit($review->description, 500) !!}
                                        </p>

                                        <div class="img-circle">
                                            <img src="{{asset('images/main/'.$review->image)}}" alt="" class="img-fluid">
                                        </div>
                                        <h4 class="testimonial-name">{{ $review->name }}</h4>
                                    </div>
                                    <div class="text-center reviewbtn">
                                    <a href="{{route('travelerReview')}}" name="contactus" value="Submit" class="btn btn-link">More Reviews</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Slider end -->
            <!--<div class="testimonial-carousel owl-carousel owl-theme"></div> -->

            </div>
            </div>
        </section>
    @endif
    <!-- ========== End of Testimonial ========== -->

    <!-- ========== Blogs Dynamic========== -->
    @if (isset($blogs[0]))
        <section class="blog newtrips newspace">
            <div class="container">
                <div class="section-title color-title">
                    <h1>Latest <span>Blogs</span></h1>
                </div>
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                            <div class="card blog-card border-0">
                                <img src="{{asset('images/listing/'.$blog->banner_image)}}" alt="" class="card-img">

                                <div class="card-body bb">
                                    <span class="blog-date">{{$blog->created_at->format('M d, Y') }}</span>

                                    <h6 class="blog-title">
                                        <a href="{{route('blogDetails',$blog->slug)}}">{{$blog->title}}</a>
                                    </h6>
                                    <p>
                                        {!! str_limit($blog->short_description, 260) !!}
                                    </p>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- ========== End of Blogs ========== -->



    <!-- ========== Newsletter ========== -->
    <!--<section class="newsletter">-->
    <!--    <div class="container">-->
    <!--        <div class="">-->
    <!--            <div class="">-->
    <!--        <div class="section-title">-->
    <!--            <h1>Newsletter</h1>-->
    <!--        </div>-->
    <!--        {{-- alert message --}}-->
    <!--        @if(session('message1'))-->
    <!--            <div class="alert alert-info alert-dismissible" id="successMessage">-->
    <!--                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
    <!--                {{session('message1')}}-->
    <!--            </div>-->
    <!--        @endif-->
    <!--        <form action="{{route('saveSubscribers')}}" method="post">-->
    <!--            @csrf-->
    <!--            <div class="row">-->
    <!--                <div class="col-md-3 mx-auto">-->
    <!--                    <div class="row form-group">-->
    <!--                        <input type="text" name="first_name" placeholder="Full Name" class="form-input-box form-control" id="first_name" required>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="col-md-3 mx-auto">-->
    <!--                    <div class="row form-group">-->
    <!--                        <input type="text" name="last_name" placeholder="Last Name" class="form-input-box form-control" id="last_name">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="col-md-3 mx-auto">-->
    <!--                    <div class="row form-group">-->
    <!--                        <input type="text" name="email" placeholder="Email" class="form-input-box form-control" id="email" required>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="col-md-2 mx-auto">-->
    <!--                    <button type="submit" class="btn primary-btn">Signup Now</button>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </form>-->
    <!--        </div>-->

    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- ========== End of Newsletter ========== -->


@endsection