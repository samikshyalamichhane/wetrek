@extends('front.layouts.app')
@section('title','Adventure Magic | About Us')
@section('content')
{{-- {{asset('assets/front/    ')}} --}}
        <!-- ========== Package Banner ========== -->
    <div class="tourmaster-single-header inner-image" style="background-image: url('{{asset('images/main/'.$dashboard_settings->aboutus_image)}}');">
        <div class="inner-overlay"></div>
        <div class="tourmaster-single-header-background-overlay"></div>
        <div class="tourmaster-single-header-overlay"></div>

        <div class="tourmaster-single-header-container tourmaster-container">
            <div class="tourmaster-single-header-container-inner">
                <div class="tourmaster-single-header-title-wrap tourmaster-item-pdlr">
                    <div class="container">
                        <div class="row">
                            <div class="COL-12 trip-topic triphead-block p-0">
                                <div class="tourmaster-single-header-gallery-wrap"></div>

                                <h1 class="tourmaster-single-header-title">About Us</p>
                                </h1>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ========== End of Package Banner ========== -->

    <!-- ========== Travel Style Introduction ========== -->
    <section class="travel-style-introduction">
        <div class="container">
            <div class="travel-style-content">
                <p>
                    {!! $dashboard_settings->aboutus_description !!}
                </p>
            </div>
        </div>
    </section>
    <!-- ========== End of Travel Style Introduction ========== -->

    <!-- ========== Travel Style Tour ========== -->
    <section class="travel-style-tour">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="style-tour-card">
                        <div class="style-tour-card-wrap">
                            <div class="style-tour-card-img">
                                @if ($dashboard_settings->whoweare_banner)
                                    <a href="{{ route('whoweare') }}"><img src="{{asset('images/main/'.$dashboard_settings->whoweare_banner)}}" height="700px" alt="" class="img-fluid"></a>
                                @else
                                    <a href="{{ route('whoweare') }}"><img src="{{asset('images/noimage.jpg')}}" height="700px" alt="" class="img-fluid"></a>
                                @endif
                            </div>
                            <div class="style-tour-card-overlay"></div>
                            <div class="style-tour-card-overlay-front"></div>
                            <div class="style-tour-card-head advguide">
                                <div class="style-tour-card-display clearfix">
                                    <h3 class="style-tour-card-title"><i class="fa fa-map-marker"></i>Who are We</h3>
                                </div>

                                <div class="style-tour-card-animate">
                                    <a class="style-tour-card-link" href="{{ route('whoweare') }}">View Detail</a>
                                    <div class="style-tour-card-divider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="style-tour-card">
                        <div class="style-tour-card-wrap">
                            <div class="style-tour-card-img">
                                @if ($dashboard_settings->whyus_banner)
                                <a href="{{ route('whyus') }}"><img src="{{asset('images/main/'.$dashboard_settings->whyus_banner)}}" height="700px" alt="" class="img-fluid"></a>
                                @else
                                <a href="{{ route('whyus') }}"><img src="{{asset('images/noimage.jpg')}}" height="700px" alt="" class="img-fluid"></a>
                                @endif
                            </div>
                            <div class="style-tour-card-overlay"></div>
                            <div class="style-tour-card-overlay-front"></div>
                            <div class="style-tour-card-head">
                                <div class="style-tour-card-display clearfix">
                                    <h3 class="style-tour-card-title"><i class="fa fa-map-marker"></i>Why Travel With Us</h3>
                                </div>

                                <div class="style-tour-card-animate">
                                    <a class="style-tour-card-link" href="{{ route('whyus') }}">View Detail</a>
                                    <div class="style-tour-card-divider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="style-tour-card">
                        <div class="style-tour-card-wrap">
                            <div class="style-tour-card-img">
                                @if ($dashboard_settings->team_banner_image)
                                <a href="{{ route('team') }}"><img src="{{asset('images/main/'.$dashboard_settings->team_banner_image)}}" height="700px" alt="" class="img-fluid"></a>
                                @else
                                <a href="{{ route('team') }}"><img src="{{asset('images/noimage.jpg')}}" height="700px" alt="" class="img-fluid"></a>
                                @endif
                            </div>
                            <div class="style-tour-card-overlay"></div>
                            <div class="style-tour-card-overlay-front"></div>
                            <div class="style-tour-card-head">
                                <div class="style-tour-card-display clearfix">
                                    <h3 class="style-tour-card-title"><i class="fa fa-map-marker"></i>Our Team</h3>
                                </div>

                                <div class="style-tour-card-animate">
                                    <a class="style-tour-card-link" href="{{ route('team') }}">View Detail</a>
                                    <div class="style-tour-card-divider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="style-tour-card">
                        <div class="style-tour-card-wrap">
                            <div class="style-tour-card-img">
                                @if ($dashboard_settings->blog_banner)
                                <a href="{{ route('blogList') }}"><img src="{{asset('images/main/'.$dashboard_settings->blog_banner)}}" height="700px" alt="" class="img-fluid"></a>
                                @else
                                <a href="{{ route('blogList') }}"><img src="{{asset('images/noimage.jpg')}}" height="700px" alt="" class="img-fluid"></a>
                                @endif
                            </div>
                            <div class="style-tour-card-overlay"></div>
                            <div class="style-tour-card-overlay-front"></div>
                            <div class="style-tour-card-head">
                                <div class="style-tour-card-display clearfix">
                                    <h3 class="style-tour-card-title"><i class="fa fa-map-marker"></i>Travel Blog</h3>
                                </div>

                                <div class="style-tour-card-animate">
                                    <a class="style-tour-card-link" href="{{ route('blogList') }}">View Detail</a>
                                    <div class="style-tour-card-divider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($pages as $page)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="style-tour-card">
                            <div class="style-tour-card-wrap">
                                <div class="style-tour-card-img">
                                    @if ($page->image)
                                    <a href="{{route('resolvepath.show',$page->slug)}}"><img src="{{asset('images/main/'.$page->image)}}" height="700px" alt="" class="img-fluid"></a>
                                    @else
                                    <a href="{{route('resolvepath.show',$page->slug)}}"><img src="{{asset('images/noimage.jpg')}}" height="700px" alt="" class="img-fluid"></a>
                                    @endif
                                </div>
                                <div class="style-tour-card-overlay"></div>
                                <div class="style-tour-card-overlay-front"></div>
                                <div class="style-tour-card-head">
                                    <div class="style-tour-card-display clearfix">
                                        <h3 class="style-tour-card-title"><i class="fa fa-map-marker"></i>{{ $page->title }}</h3>
                                    </div>

                                    <div class="style-tour-card-animate">
                                        <a class="style-tour-card-link" href="{{route('resolvepath.show',$page->slug)}}">View Detail</a>
                                        <div class="style-tour-card-divider"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="style-tour-card">
                        <div class="style-tour-card-wrap">
                            <div class="style-tour-card-img">
                                @if ($dashboard_settings->traveler_review_banner)
                                <a href="{{ route('travelerReview') }}"><img src="{{asset('images/main/'.$dashboard_settings->traveler_review_banner)}}" height="700px" alt="" class="img-fluid"></a>
                                @else
                                <a href="{{ route('travelerReview') }}"><img src="{{asset('images/noimage.jpg')}}" height="700px" alt="" class="img-fluid"></a>
                                @endif
                            </div>
                            <div class="style-tour-card-overlay"></div>
                            <div class="style-tour-card-overlay-front"></div>
                            <div class="style-tour-card-head">
                                <div class="style-tour-card-display clearfix">
                                    <h3 class="style-tour-card-title"><i class="fa fa-map-marker"></i>Travelers Review</h3>
                                </div>

                                <div class="style-tour-card-animate">
                                    <a class="style-tour-card-link" href="{{ route('travelerReview') }}">View Detail</a>
                                    <div class="style-tour-card-divider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========== End of Travel Style Tour ========== -->



@endsection