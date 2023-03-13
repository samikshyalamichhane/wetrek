@extends('front.layouts.app')
@section('content')
<!-- banner area start -->
<div class="banner-area">
    <div class="banner-slider">
        @foreach($sliders as $slider)
        <div class="banner-slider-item " style="background-image: url({{asset('images/main/'.$slider->image)}} );>
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-9 offset-xl-2 offset-lg-1">
                        <div class="row">
                            <div class="col-lg-9 col-sm-8">
                                <div class="banner-inner">

                                    <h2 class="banner-title s-animate-2">{{$slider->title}}</h2>
                                    <p class="banner-cat s-animate-1">{{$slider->subtitle}}</p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <div class="banner-social-meta">
        <div class="banner-slider-dots"></div>

    </div>
    <div class="container">
        <div class="banner-slider-controls">
            <div class="slider-nav tp-control-nav"></div>
            <!--slider-nav-->
            <div class="tp-slider-extra slider-extra">
                <div class="text">
                    <span class="first">01</span>
                    <span class="devider">/</span>
                    <span class="last"></span>
                </div>
            </div>
            <!--slider-extra-->
        </div>
    </div>
</div>
<!-- banner area end -->

<!-- search area start -->
<div class="search-area tp-main-search-area">
    <div class="container">
        <div class="tp-main-search">
            <div class="row">


                <div class="col-md-3">
                    <h3>Find Your Holiday</h3>
                </div>
                <!-- <form action="{{ route('findAll') }}" method="get"> -->
                <div class="col-md-2">
                    <div class="tp-search-single-wrap float-left">
                        <select class="select">
                        @foreach($dashboard_destinations as $destination)
                            <option value="{{route('resolvepath.show',$destination->id)}}">{{$destination->country_name}}</option>
                        @endforeach
                        </select>
                        <i class="fa fa-plus-circle"></i>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="tp-search-single-wrap float-left w-100">
                        <select class="select w-100">
                        @foreach($dashboard_destination_types as $dest)
                            <option value="1">{{$dest->title}}</option>
                        @endforeach
                        </select>
                        <i class="fa fa-plus-circle"></i>
                    </div>
                </div>
                {{--<div class="col-md-2 ">
                    <div class="tp-search-single-wrap float-left w-100">
                        <select class="select w-100">
                            <option value="1">Duration</option>
                            <option value="2">5 Days</option>
                            <option value="3">10 Days</option>
                            <option value="4">15 Days</option>
                            <option value="5">20 Days</option>
                        </select>
                        <i class="fa fa-plus-circle"></i>
                    </div>
                </div>--}}
                <div class="col-lg-2 col-md-2">
                    <button class="btn btn-yellow" type="submit">Search</a>
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>
<!-- search area end -->


<!-- about area start -->
<div class="about-area tp-video-area pd-top-110" style="background-image: url({{asset('assets/front/img/bg/homeabtBG.png')}});">

    <div class="row">
        <div class="col-lg-4 offset-xl-1 wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="aboutarea-wrap">
                <div class="thumb">
                    <img src="{{$aboutUs->imageUrl()}}" alt="aboutus">
                </div>

            </div>
        </div>
        <div class="col-lg-7 align-self-center wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="section-title mb-lg-0 mb-4 text-center text-lg-left abtDtl">
                <h2 class="title">About <span> We Trek Nepal</span></h2>

                {!! $aboutUs->description !!}

            </div>
        </div>


    </div>
</div>
<!-- about area end -->



<div class="upcomming-tour upcomming-tour-bg pd-top-50 " style="background-image: url({{asset('assets/front/img/bg/11.png')}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2 class="title text-center">Travel with <span>We Trek Nepal</span></h2>

                </div>

            </div>
            <div class="col-lg-10 offset-lg-1 sameimgs">
                <div class="upcomming-card-slider upcomming-card-slider-2 tp-common-slider-style">
                    @foreach($destinations as $dest)
                    <div class="single-upconing-card">
                        <div class="shadow" style="background-image: url({{asset('images/main/'.$dest->banner_image)}});">
                            <img src="{{asset('images/main/'.$dest->banner_image)}}" alt="img">
                        </div>

                        <div class="details">
                            <h3 class="title"><a href="{{route('resolvepath.show',$dest->slug)}}">{{$dest->country_name}}</a></h3>
                            <p>{{$dest->heading_title}}</p>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end trek nepal -->


<div class="holiday-plan-area tp-holiday-plan-area mg-top-96 pd-top-50 pd-bottom-70" style="background-image: url({{asset('assets/front/img/bg/lightBG.png')}}); background-color: #F7F7F7;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-9">
                <div class="section-title text-center">
                    <h2 class="title wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.1s">Best Selling <span>Trips</span></h2>

                </div>
            </div>
        </div>
        <div class="row dest-img">
            @foreach($bestSells as $bestsell)
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="single-destinations-list style-two wow animated fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.1s">
                    <div class="thumb">
                        <img src="{{$bestsell->imageUrl()}}" alt="list">
                    </div>
                    <div class="details">

                        <h4 class="title"><a href="{{route('resolvepath.show',$bestsell->slug)}}">{{$bestsell->package_name}}</a></h4>

                        <div class="tp-price-meta">
                            <p class="location"><img src="{{asset('assets/front/img/icons/days-1.png')}}" alt="map" class="float-left">Duration<br>{{ $bestsell->days_and_nights }}</p>
                            <h2>{{$bestsell->price}} </h2>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Recommanded area end -->

<div class="upcomming-tour upcomming-tour-bg pd-top-50 pd-bottom-70 " style="background-image: url({{asset('assets/front/img/bg/11.png')}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2 class="title text-center">Popular Trekking & <span>Hiking in Nepal</span></h2>

                </div>

            </div>
            <div class="col-lg-10 offset-lg-1">
                <div class="upcomming-card-slider upcomming-card-slider-2 tp-common-slider-style">
                @foreach($popularPackages as $popularPackage)
                    <div class="d-list-slider-item">
                        <div class="single-destinations-list ">
                            <div class="thumb sameimg">
                                <img src="{{$popularPackage->imageUrl()}}" alt="list">

                            </div>
                            <div class="details">
                                <h4 class="title"><a href="{{route('resolvepath.show',$popularPackage->slug)}}">{{$popularPackage->package_name}}</a></h4>
                                <div class="tp-price-meta">
                                    <p class="location"><img src="{{asset('assets/front/img/icons/days-1.png')}}" alt="map" class="float-left">Duration<br>1 Day</p>
                                    <h2>{{$popularPackage->price}} </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end trek nepal -->



<!-- instagram area start -->
<div class="instagram-area pd-top-50 gallery-area">

    <div class="col-lg-12">
        <div class="section-title">
            <h2 class="title text-center">Photo&amp; <span>Gallery</span></h2>

        </div>

    </div>

    <div class="instagram-slider1 gallery-filter-area">
        <div class="gallery-sizer col-1"></div>
        @foreach($galleryImages as $img)
        <div class="instagram-slider-item tp-gallery-item col-md-2">
            <div class="tp-gallery-item-img">
                <a class="popup-thumb" href="/images/main/{{$img->image}}" data-effect="mfp-zoom-in">
                    <img src="/images/main/{{$img->image}}" alt="image">
                </a>
            </div>

        </div>
        @endforeach
        {{--<div class="instagram-slider-item tp-gallery-item col-md-2">
            <div class="tp-gallery-item-img">
                <a class="popup-thumb" href="{{asset('assets/front/img/tour/bhutan.jpg')}}" data-effect="mfp-zoom-in">
                    <img src="{{asset('assets/front/img/tour/nepal.jpg')}}" alt="image">
                </a>
            </div>

        </div>
        <div class="instagram-slider-item tp-gallery-item col-md-2">
            <div class="tp-gallery-item-img">
                <a class="popup-thumb" href="{{asset('assets/front/img/tour/tibet.jpg')}}" data-effect="mfp-zoom-in">
                    <img src="{{asset('assets/front/img/tour/nepal.jpg')}}" alt="image">
                </a>
            </div>

        </div>
        <div class="instagram-slider-item tp-gallery-item col-md-2">
            <div class="tp-gallery-item-img">
                <a class="popup-thumb" href="{{asset('assets/front/img/tour/nepal.jpg')}}" data-effect="mfp-zoom-in">
                    <img src="{{asset('assets/front/img/tour/nepal.jpg')}}" alt="image">
                </a>
            </div>

        </div>

        <div class="instagram-slider-item tp-gallery-item col-md-2">
            <div class="tp-gallery-item-img">
                <a class="popup-thumb" href="{{asset('assets/front/img/tour/bhutan.jpg')}}" data-effect="mfp-zoom-in">
                    <img src="{{asset('assets/front/img/tour/bhutan.jpg')}}" alt="image">
                </a>
            </div>

        </div>
        <div class="instagram-slider-item tp-gallery-item col-md-2">
            <div class="tp-gallery-item-img">
                <a class="popup-thumb" href="{{asset('assets/front/img/tour/tibet.jpg')}}" data-effect="mfp-zoom-in">
                    <img src="{{asset('assets/front/img/tour/tibet.jpg')}}" alt="image">
                </a>
            </div>

        </div>--}}
    </div>
</div>
<!-- instagram area end -->

<!-- client area end -->
<div class="client-area pd-top-70 pd-bottom-120 jarallax" style="background-image: url({{asset('assets/front/img/bg/testibg.png')}}); background-size: cover; background-repeat: no-repeat;">
    <div class="container">
        <!-- <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                
            </div>
        </div> -->
        <div class="col-md-5">
            <div class="testibox" id="testislider">
                <div class="section-title text-center">
                    <h2 class="title wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.1s">Traveller’s<span> Review</span></h2>

                </div>

                <div class="autoplay">
                    @foreach($reviews as $review)
                    <div>
                        <div class="testititle"><b>{{$review->title}}</b></div>
                        {!! $review->words !!}
                        <div class="single-comment-wrap">
                            <div class="thumb">
                                <img src="{{asset('/images/main/' . $review->image)}}" alt="img" height="75px" >
                            </div>
                            <div class="content">
                                <h4 class="title">{{$review->name}}</h4>
                                <span class="date">{{$review->country}}</span>
                                <p>{{$review->email}}</p>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- client area end -->
<!-- blog start -->
<div class="holiday-plan-area blog-area tp-holiday-plan-area mg-top-96" style="background-image: url(#);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-9">
                <div class="section-title text-center">
                    <h2 class="title wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.1s">Blogs &<span> News</span></h2>

                </div>
            </div>
        </div>
        <div class="row dest-img">
            @foreach($blogs as $blog)
            <div class="col-lg-3 col-sm-6 blog-list">
                <div class="single-destinations-list  style-two wow animated fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.1s">
                    <div class="thumb">
                        <img src="{{asset('/images/thumbnail/' . $blog->image)}}" alt="list">
                    </div>
                    <div class="details">

                        <h4 class="title"><a href="{{route('blogDetails',$blog->slug)}}">{{$blog->title}}</a></h4>

                        <div class="tp-price-meta">
                            <p class="location"><img src="{{asset('assets/front/img/icons/icon _user_.png')}}" alt="map" class="float-left">{{$blog->author}}</p>
                            <p class="location"><img src="{{asset('assets/front/img/icons/icon _calendar_.png')}}" alt="map" class="float-left">we trek</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- blog end -->


<div class="holiday-plan-area tp-holiday-plan-area mg-top-96 pd-top-50 pd-bottom-70" style="background-image: url(assets/img/bg/lightBG.png); background-color: #F2FBFE;">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="partner-box">
                    <h4>Associated With</h4>
                    @foreach($associates as $associate)
                    <span><img src="{{asset('/images/main/' . $associate->image)}}" alt=""></span>
                    @endforeach
                    <!-- <span><img src="{{asset('assets/front/img/icons/keep.png')}}" alt=""></span>
                    <span><img src="{{asset('assets/front/img/icons/ntb.png')}}" alt=""></span>
                    <span><img src="{{asset('assets/front/img/icons/nma.png')}}" alt=""></span>
                    <span><img src="{{asset('assets/front/img/icons/taan.png')}}" alt=""></span> -->
                </div>

                <div class="partner-box weaccept">
                    <h4>We Accept</h4>
                    <span><img src="{{asset('assets/front/img/icons/weacept.png')}}" alt=""></span>

                </div>

                <div class="partner-box newsletter">
                    <h4>Newsletter</h4>
                    <p>Please enter your email address using the fields below to receive all of the latest news and offers!</p>
                    <form action="{{route('saveSubscribers')}}" method="post">
                        @csrf
                    <div class="input-group newslatter-wrap">

                        <input type="text" class="form-control" name="email" placeholder="Email" required>
                        <div class="input-group-append">
                            <button class="btn btn-yellow" type="submit">subscribe</button>
                        </div>
                    </div>
                    </form>

                </div>


            </div>
            <div class="col-md-4">
                <div class="partner-box newsletter">
                    <h4>E-Brochure</h4>

                    <img src="{{asset('assets/front/img/icons/eBrochure.png')}}" alt="">


                </div>

            </div>


        </div>
    </div>
</div>
<!-- newslatter area End -->

@endsection
@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    @if(Session::has('failed'))
    swal({
        title: "Oops!",
        text: "Payment Failed! Please try again Later!!",
        icon: "error",
    });
    @endif
    @if(Session::has('success'))
    swal({
        title: "Congratulations!",
        text: "Your Payment has been done Successfully!",
        icon: "success",
    });
    @endif

    @if(Session::has('cancel'))
    swal({
        title: "Oops!",
        text: "Payment Cancelled! Please try again Later!!",
        icon: "error",
    });
    @endif
</script>

@endpush