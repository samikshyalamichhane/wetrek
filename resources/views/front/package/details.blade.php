@extends('front.layouts.app')
@section('content')
<!-- breadcrumb area start -->
<div class="breadcrumb-area style-two jarallax" style="background-image:url({{ $package->imageUrl() }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">{{@$package->category->title}}</h1>
                    <ul class="page-list">
                        <li><a href="#">{{@$package->category->title}}</a></li>
                        <li>{{@$package->package_name}}</li>
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
            <div class="col-md-12">
                <div class="p-short-info">
                    <div class="single-info"><i class="fa-regular fa-clock"></i>
                        <div class="info-texts"><strong>Duration</strong>
                            <p>{{ $package->days_and_nights }}</p>
                        </div>
                    </div>
                    <div class="single-info"><i class="fa-solid fa-umbrella-beach"></i>
                        <div class="info-texts"><strong>Activities</strong>
                            <p>{{ $package->activities }}</p>
                        </div>
                    </div>
                    <div class="single-info"><i class="fa-solid fa-chart-simple"></i>
                        <div class="info-texts"><strong>Grade</strong>
                            <p>{{ $package->grade }}</p>
                        </div>
                    </div>

                    <div class="single-info"><i class="fa-solid fa-chart-area"></i>
                        <div class="info-texts"><strong>Altitude</strong>
                            <p>{{ $package->altitude }}</p>
                        </div>
                    </div>

                    <div class="single-info"><i class="fa-solid fa-user-group"></i>
                        <div class="info-texts"><strong>Group Size</strong>
                            <p>{{ $package->group_size }}</p>
                        </div>
                    </div>



                    <div class="single-info">
                        <div class="info-texts"><a class="btn btn-yellow" href="https://wa.me/{{@$dashboard_settings->whatsapp}}">Chat Via WhatsApp <i class="fa-brands fa-whatsapp" style="margin-top: 7px;"></i></a>

                        </div>
                    </div>

                    <div class="single-info">
                        <div class="info-texts"><a class="btn btn-yellow" href="{{route('bookingForm',['package_id'=>$package->id])}}">Book Now <i class="fa fa-paper-plane" style="margin-top: 7px;"></i></a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <section id="tabs">
                    <div class="container">

                        <div class="row">
                            <div class="col-xs-12 ">
                                <nav>
                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Overview</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Included/Exclude</a>
                                        <a class="nav-item nav-link" id="nav-itinerary-tab" data-toggle="tab" href="#nav-itinerary" role="tab" aria-controls="nav-contact" aria-selected="false">Itinerary</a>
                                        <a class="nav-item nav-link" id="nav-gallery-tab" data-toggle="tab" href="#nav-gallery" role="tab" aria-controls="nav-about" aria-selected="false">Gallery</a>
                                        <a class="nav-item nav-link" id="nav-map-tab" data-toggle="tab" href="#nav-map" role="tab" aria-controls="nav-map" aria-selected="false">Map</a>
                                        <a class="nav-item nav-link" id="nav-review-tab" data-toggle="tab" href="#nav-review" role="tab" aria-controls="nav-review" aria-selected="false">Review</a>
                                    </div>
                                </nav>
                                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                                        <div class="tour-details-wrap">
                                            <h4 class="single-page-small-title pd-top-50">{{ $package->overview_title }}</h4>
                                            {!! $package->overview_description !!}
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="tour-details-wrap">

                                            <div class="package-included-area ptt">
                                                <h4 class="single-page-small-title pd-bottom-30">Include/Exclude
                                                </h4>
                                                <div class="">
                                                    
                                                    <div class="">
                                                        <div class="single-package-included inn">
                                                            <h6>{{$package->includes_title}}</h6>
                                                            {!! $package->includes_description !!}
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="single-package-included exx inn">
                                                            <h6>{{$package->excludes_title}}</h6>
                                                            {!! $package->excludes_description !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-itinerary" role="tabpanel" aria-labelledby="nav-itinerary-tab">

                                        <div class="tour-details-wrap">
                                            <div class="package-included-location">
                                                <h4 class="single-page-small-title pd-bottom-30">Your Itinerary</h4>
                                                <div class="row">
                                                    <div class="tour-details__plan">
                                                        @foreach($package->packageitinerary as $key=>$itinerary)
                                                        <div class="tour-details__plan-single">
                                                            <div class="tour-details__plan-count">
                                                                {{$key+1}}
                                                            </div>
                                                            <div class="tour-details__plan-content">
                                                                <h3>{{$itinerary->day_num}}: {{$itinerary->title}}</h3>
                                                                {!! $itinerary->lodging !!}
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-gallery" role="tabpanel" aria-labelledby="nav-gallery-tab">
                                        <div class="tour-details-wrap">

                                            <h4 class="single-page-small-title pd-bottom-30 pd-top-50">Gallery
                                            </h4>

                                            <div class="row gallery">
                                                @foreach($package->slider__images as $slider)
                                                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                                    <a href="{{ asset('images/package/multiple/'. $slider->sliderimages) }}">
                                                        <figure><img class="img-fluid img-thumbnail" src="{{ asset('images/package/multiple/'. $slider->sliderimages) }}" alt="Random Image"></figure>
                                                    </a>
                                                </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="nav-map" role="tabpanel" aria-labelledby="nav-map-tab">
                                        <div class="tour-details-wrap">
                                            <h4 class="single-page-small-title pd-bottom-30 pd-top-50">Map
                                            </h4>

                                            <div class="row pd-bottom-30">
                                                <img src="{{ $package->mapimageUrl() }}" alt="{{ $package->package_name }}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
                                        <div class="tour-details-wrap">

                                            <h4 class="single-page-small-title pd-top-50">Review
                                            </h4>

                                            @foreach($package->packagereview as $review)
                                            <div class="user-tour-details">
                                                <div class="comments-area tour-details-review-area">
                                                    <ul class="comment-list mb-0">
                                                        <li>
                                                            <div class="single-comment-wrap">
                                                                <div class="thumb">
                                                                    <img src="{{asset('images/main/'.$review->image)}}" alt="img">
                                                                </div>
                                                                <div class="content">
                                                                    <h4 class="title">{{$review->name}}</h4>
                                                                    <span class="date">{{ \Carbon\Carbon::parse($review->created_at)->isoFormat('Do MMM YYYY')}}</span>
                                                                    <!-- <div class="tp-review-meta">
                                                                        <i class="ic-yellow fa fa-star"></i>
                                                                        <i class="ic-yellow fa fa-star"></i>
                                                                        <i class="ic-yellow fa fa-star"></i>
                                                                        <i class="ic-yellow fa fa-star"></i>
                                                                        <i class="ic-yellow fa fa-star"></i>
                                                                    </div> -->
                                                                    <p>{!!$review->description!!}</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-xl-4 col-lg-4 order-lg-1">
                <div class="sidebar-area sidebar-area-inner-page">
                    <div class="widget tour-list-widget">
                        <h3><strong>Inquiry Now</strong></h3>
                        <form action="{{route('packageEnquiry', $package->id )}}" method="post">
                            @csrf
                            <input type="hidden" name="package_id" value="{{$package->id}}">
                        <div class="widget-tour-list-meta">
                            <div class="single-widget-search-input-title"><i class="fa fa-dot-circle-o"></i>Full Name</div>
                            <div class="single-widget-search-input">
                                <input type="text" name="name" placeholder="Write name here">
                            </div>
                        </div>


                        <div class="widget-tour-list-meta">
                            <div class="single-widget-search-input-title"><i class="fa fa-dot-circle-o"></i>Nationality</div>
                            <div class="single-widget-search-input">
                                <input type="text" name="nationality" placeholder="Write nationality here">
                            </div>
                        </div>


                        <div class="widget-tour-list-meta">
                            <div class="single-widget-search-input-title"><i class="fa fa-dot-circle-o"></i>Phone Number</div>
                            <div class="single-widget-search-input">
                                <input type="phone" name="phone" placeholder="Write here">
                            </div>
                        </div>

                        <div class="widget-tour-list-meta">
                            <div class="single-widget-search-input-title"><i class="fa fa-dot-circle-o"></i>Email</div>
                            <div class="single-widget-search-input">
                                <input type="email" name="email" placeholder="Write here">
                            </div>
                        </div>
                        <div class="single-widget-search-input-title">How did you found us?</div>
                        <div class="single-widget-search-input">
                            <select class="select w-100 custom-select" name="how_found">
                                <option value="internet">Internet Search</option>
                                <option value="facebook">Facebook</option>
                                <option value="travel_show">Travel Show</option>
                                <option value="trip_advisor">Trip Advisor</option>
                                <option value="insatgram">Instagram</option>
                                <option value="blog">Blog</option>
                            </select>
                        </div>

                        <div class="widget-tour-list-meta">
                            <div class="single-widget-search-input-title">Message</div>
                            <div class="single-widget-search-input">
                                <textarea name="message1" placeholder="Type"></textarea>
                            </div>
                        </div>

                        <div class="text-lg-center text-left">
                            <button class="btn btn-yellow" type="submit">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<!-- tour details area End -->

@endsection

@push('scripts')
<script src="https://www.google.com/recaptcha/api.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        @if(Session::has('errors'))
        $('#exampleModal').modal('show');
        @endif
        @if(Session::has('message'))
        $('#exampleModal').modal('show');
        @endif
    });

    $(document).ready(function() {
        @if(Session::has('errors'))
        $('#exampleModal').modal('show');
        @endif
        @if(Session::has('message'))
        $('#exampleModal').modal('show');
        @endif
    });
</script>


@endpush