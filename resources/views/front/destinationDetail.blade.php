@extends('front.layouts.app')
@section('content')
 <!-- breadcrumb area start -->
 <div class="breadcrumb-area jarallax" style="background-image:url(assets/img/banner/page-header-contact.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="page-title">Destinations</h1>
                        <ul class="page-list">
                            <li><a href="index.html">Home</a></li>
                            <li>{{$destination->country_name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area End -->

    <!-- gallery area start -->
    <div class="destination-list-area pd-top-120">
        <div class="container">
            <!-- destination-list gallery start -->
            <div class="gallery-area destination-list-gallery-area">
                <div class="container">
                    <div class="gallery-filter-area row">
                        <div class="gallery-sizer col-1"></div>
                        <!-- gallery-item -->
                        <div class="tp-gallery-item col-lg-8 col-md-6 col-12 mb-10">
                            <div class="tp-gallery-item-img">
                                <div class="thumb">
                                    <img src="assets/img/banner/page-header-contact.jpg" alt="image">
                                </div>
                                <div class="details">
                                        <h3>Tibet</h3>
                                        <p>Etiam convallis elementum sapien, aliquam turpis aliquam vitae Praese sollicitudin <br> felis vel mi facilisis posuere. Nulla ultrices facilisis</p>
                                        <a class="btn-read-more" href="package-listingpage.html"><span>Explore<i class="la la-arrow-right"></i></span></a>
                                </div>
                            </div>
                        </div>
                        <!-- gallery-item -->
                        <div class="tp-gallery-item col-lg-4 col-md-6 col-12">
                            <div class="tp-gallery-item-img">
                                <div class="thumb">
                                    <img src="assets/img/tour/raimond-klavins-JqT2Wp5S0Dk-unsplash.jpg" alt="image">
                                </div>
                                <div class="details">
                                    <h3>Tibet</h3>
                                    <p>Etiam convallis elementum sapien, a aliquam turpis aliquam vitae. Praesent</p>
                                    <a class="btn-read-more" href="package-listingpage.html"><span>Explore<i class="la la-arrow-right"></i></span></a>
                                </div>
                            </div>
                        </div>
                        <!-- gallery-item -->
                        <div class="tp-gallery-item col-lg-4 col-md-6 col-12">
                            <div class="tp-gallery-item-img">
                                <div class="thumb">
                                    <img src="assets/img/tour/tour-17-580x450.jpg" alt="image">
                                </div>
                                <div class="details">
                                    <h3>Tibet</h3>
                                    <p>Etiam convallis elementum sapien, a aliquam turpis aliquam vitae. Praesent</p>
                                    <a class="btn-read-more" href="package-listingpage.html"><span>Explore<i class="la la-arrow-right"></i></span></a>
                                </div>
                            </div>
                        </div>
                        <!-- gallery-item -->
                        <div class="tp-gallery-item col-lg-4 col-md-6 col-12">
                            <div class="tp-gallery-item-img">
                                <div class="thumb">
                                    <img src="assets/img/tour/tour-2-580x450.jpg" alt="image">
                                </div>
                                <div class="details">
                                    <h3>Tibet City</h3>
                                    <p>Etiam convallis elementum sapien, a aliquam turpis aliquam vitae. Praesent</p>
                                    <a class="btn-read-more" href="package-listingpage.html"><span>Explore<i class="la la-arrow-right"></i></span></a>
                                </div>
                            </div>
                        </div>
                        <!-- gallery-item -->
                        <div class="tp-gallery-item col-lg-4 col-md-6 col-12">
                            <div class="tp-gallery-item-img">
                                <div class="thumb">
                                    <img src="assets/img/tour/raimond-klavins-JqT2Wp5S0Dk-unsplash.jpg" alt="image">
                                </div>
                                <div class="details">
                                    <h3>Tibet tour</h3>
                                    <p>Etiam convallis elementum sapien, a aliquam turpis aliquam vitae. Praesent</p>
                                    <a class="btn-read-more" href="package-listingpage.html"><span>Explore<i class="la la-arrow-right"></i></span></a>
                                </div>
                            </div>
                        </div>
                        <!-- gallery-item -->
                        <div class="tp-gallery-item col-lg-4 col-md-6 col-12">
                            <div class="tp-gallery-item-img">
                                <div class="thumb">
                                    <img src="assets/img/tour/tour-2-580x450.jpg" alt="image">
                                </div>
                                <div class="details">
                                    <h3>Tibet city</h3>
                                    <p>Etiam convallis elementum sapien, a aliquam turpis aliquam vitae. Praesent</p>
                                    <a class="btn-read-more" href="package-listingpage.html"><span>Explore<i class="la la-arrow-right"></i></span></a>
                                </div>
                            </div>
                        </div>
                        <!-- gallery-item -->
                        <div class="tp-gallery-item col-lg-4 col-md-6 col-12">
                            <div class="tp-gallery-item-img">
                                <div class="thumb">
                                    <img src="assets/img/tour/tour-2-580x450.jpg" alt="image">
                                </div>
                                <div class="details">
                                    <h3>City</h3>
                                    <p>Etiam convallis elementum sapien, a aliquam turpis aliquam vitae. Praesent</p>
                                    <a class="btn-read-more" href="package-listingpage.html"><span>Explore<i class="la la-arrow-right"></i></span></a>
                                </div>
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
            <!-- Gallery area end -->
        </div>
    </div>
    <!-- gallery area End -->
@endsection
