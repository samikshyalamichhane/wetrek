@extends('front.layouts.app')
@section('content')
 <!-- breadcrumb area start -->
 <div class="breadcrumb-area jarallax" style="background-image:url({{ $dashboard_settings->contactus_banner_imageUrl() }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="page-title">Destinations</h1>
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
                        @foreach($trekkingPackageSearch as $data)
                        <div class="tp-gallery-item col-lg-4 col-md-6 col-12">
                            <div class="tp-gallery-item-img">
                                <div class="thumb">
                                    <img src="{{ $data->imageUrl() }}" alt="image">
                                </div>
                                <div class="details">
                                    <h3>{{$data->package_name}}</h3>
                                    <p>{!! Illuminate\Support\Str::limit($data->description, 50) !!}</p>
                                    <a class="btn-read-more" href="{{ route('resolvepath.show',$data->slug) }}"><span>Explore<i class="la la-arrow-right"></i></span></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                     
                    </div>
                </div>
            </div>
            <!-- Gallery area end -->
        </div>
    </div>
    <!-- gallery area End -->
@endsection

