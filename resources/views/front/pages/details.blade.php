@extends('front.layouts.app')
@section('content')
 <!-- breadcrumb area start -->
 <div class="breadcrumb-area jarallax" style="background-image:url({{ $detail->bannerimageUrl() }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="page-title">{{$detail->title}}</h1>
                        <ul class="page-list">
                            <li><a href="index.html">About Us</a></li>
                            <li>{{$detail->title}}</li>
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
                <div class="col-lg-8 align-self-center">
                    <div class="section-title mb-lg-0">
                        <h2 class="title">{{$detail->title}}</h2>
                       {!! $detail->description !!}
                    
                    </div>
                </div>
                <div class="col-lg-4" >
                    <div class="thumb about-section-right-thumb pd-bottom-120">
                        <img src="{{ $detail->imageUrl() }}" alt="img">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about section area end -->

@endsection