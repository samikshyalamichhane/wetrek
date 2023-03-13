@extends('front.layouts.app')

@section('content')
  <!-- breadcrumb area start -->
  <div class="breadcrumb-area style-two jarallax" style="background-image:url({{ $dashboard_settings->testimonial_banner_imageUrl() }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="page-title">Testimonial</h1>
                        <ul class="page-list">
                            <li><a href="{{route('indexHome')}}">Home</a></li>
                            <li>Testimonials</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area End -->

    <!-- tour details area End -->
    <div class="tour-details-area pd-top-50">

        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="comments-area tour-details-review-area">
                        <h4 class="comments-title">Testimonial</h4>
                        <ul class="comment-list mb-0">
                        @foreach($details as $data)
                            <li>
                                <div class="single-comment-wrap">
                                    <div class="thumb">
                                        <img src="/images/main/{{@$data->image}}" alt="img">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">{{$data->name}}</h4>
                                        <span class="date">{{ $data->created_at->format('d F Y') }}</span>
                                        {{$data->words}}
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                 
                    </div>
                  
                </div>
                <div class="col-xl-4 col-lg-4 order-lg-1">
                    <div class="sidebar-area sidebar-area-inner-page">
                        <div class="widget tour-list-widget">
                          <h3><strong>Book this Trip</strong></h3>
                            <div class="widget-tour-list-meta">
                                <div class="single-widget-search-input-title"><i class="fa fa-dot-circle-o"></i> Where
                                    From?</div>
                                <div class="single-widget-search-input">
                                    <input type="text" placeholder="Tour List Destination">
                                </div>
                                <div class="single-widget-search-input-title"><i class="fa fa-plus-circle"></i> Travel
                                    Type</div>
                                <div class="single-widget-search-input">
                                    <select class="select w-100 custom-select">
                                        <option value="1">Tour List Destination</option>
                                        <option value="2">two</option>
                                        <option value="3">Three</option>
                                        <option value="3">Four</option>
                                    </select>
                                </div>
                                <div class="single-widget-search-input-title"><i class="fa fa-calendar-minus-o"></i>
                                    Departing</div>
                                <div class="single-widget-search-input">
                                    <input type="text" class="departing-date custom-select" placeholder="Departing">
                                </div>
                                <div class="single-widget-search-input-title"><i class="fa fa-calendar-minus-o"></i>
                                    Returning</div>
                                <div class="single-widget-search-input">
                                    <input type="text" class="returning-date custom-select" placeholder="Returning">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tour details area End -->


@endsection
