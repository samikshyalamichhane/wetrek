@extends('front.layouts.app')
@section('content')
{{-- {{asset('assets/front/    ')}} --}}
        <!-- ========== Package Banner ========== -->
    <div class="tourmaster-single-header inner-image" style="background-image: url('{{asset('images/main/'.$dashboard_settings->travelStyle_image)}}');">
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

                                <h1 class="tourmaster-single-header-title">Travel Styles</p>
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
                    {!! $dashboard_settings->travelStyle_description !!}
                </p>
            </div>
        </div>
    </section>
    <!-- ========== End of Travel Style Introduction ========== -->

    <!-- ========== Travel Style Tour ========== -->
    <section class="travel-style-tour">
        <div class="container">
            <div class="row">
                @foreach($dashboard_travelStyle as $travelStyle)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="advsame-overlay"></div>
                        <div class="style-tour-card sameadvinfo">
                            <div class="style-tour-card-wrap">
                                <div class="style-tour-card-img">
                                    @if ($travelStyle->image)
                                        <a href="{{asset('images/main/'.$travelStyle->image)}}"><img src="{{asset('images/main/'.$travelStyle->image)}}" height="700px" alt="Climbing Mountain" class="img-fluid"></a>
                                    @else
                                        <a href="{{asset('images/main/'.$travelStyle->image)}}"><img src="{{asset('images/noimage.jpg')}}" height="700px" alt="Climbing Mountain" class="img-fluid"></a>
                                    @endif
                                </div>
                                <div class="style-tour-card-overlay"></div>
                                <div class="style-tour-card-overlay-front"></div>
                                <div class="style-tour-card-head sameadvinfodetail">
                                    <div class="style-tour-card-display clearfix">
                                        <h3 class="style-tour-card-title"><i class="fa fa-map-marker"></i>{{ $travelStyle->title }}</h3>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="style-tour-card-count col-md-6"><p>{{ $travelStyle->packages->count() }} trips</p></div>
                                    <div class="col-md-6 style-tour-card-animate pull-right">
                                        <a class="style-tour-card-link" href="{{route('travelStyleDetail', $travelStyle->slug)}}">View all trips</a>
                                        <div class="style-tour-card-divider"></div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                @endforeach
                {{-- <div class="col-md-4 col-sm-6 mb-4">
                    <div class="style-tour-card">
                        <div class="style-tour-card-wrap">
                            <div class="style-tour-card-img">
                                <img src="https://cdn.himalayanglacier.com/wp-content/uploads/2020/05/active-adventures-2020-400x466.jpg" width="600" height="700" srcset="https://cdn.himalayanglacier.com/wp-content/uploads/2020/05/active-adventures-2020-400x466.jpg 400w, https://cdn.himalayanglacier.com/wp-content/uploads/2020/05/active-adventures-2020.jpg 600w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 100vw, 1150px" alt="Active Adventures" class="img-fluid">
                            </div>
                            <div class="style-tour-card-overlay"></div>
                            <div class="style-tour-card-overlay-front"></div>
                            <div class="style-tour-card-head">
                                <div class="style-tour-card-display clearfix">
                                    <h3 class="style-tour-card-title"><i class="fa fa-map-marker"></i>Private Family/Friends Travel</h3>
                                    <div class="style-tour-card-count">60 trips</div>
                                </div>

                                <div class="style-tour-card-animate">
                                    <a class="style-tour-card-link" href="#">View all trips</a>
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
                                <img src="https://cdn.himalayanglacier.com/wp-content/uploads/2021/05/multiple-countries-thumb-400x466.jpg" width="600" height="700" srcset="https://cdn.himalayanglacier.com/wp-content/uploads/2021/05/multiple-countries-thumb-400x466.jpg 400w, https://cdn.himalayanglacier.com/wp-content/uploads/2021/05/multiple-countries-thumb.jpg 600w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 100vw, 1150px" alt="View of Mount Everest North Face - Tibet" class="img-fluid">
                            </div>
                            <div class="style-tour-card-overlay"></div>
                            <div class="style-tour-card-overlay-front"></div>
                            <div class="style-tour-card-head">
                                <div class="style-tour-card-display clearfix">
                                    <h3 class="style-tour-card-title"><i class="fa fa-map-marker"></i>Student Group Travels</h3>
                                    <div class="style-tour-card-count">42 trips</div>
                                </div>

                                <div class="style-tour-card-animate">
                                    <a class="style-tour-card-link" href="#">View all trips</a>
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
                                <img src="https://cdn.himalayanglacier.com/wp-content/uploads/2020/05/family-holiday-himalayan-glacier-400x466.jpg" width="600" height="700" srcset="https://cdn.himalayanglacier.com/wp-content/uploads/2020/05/family-holiday-himalayan-glacier-400x466.jpg 400w, https://cdn.himalayanglacier.com/wp-content/uploads/2020/05/family-holiday-himalayan-glacier.jpg 600w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 100vw, 1150px" alt="Family Holiday" class="img-fluid">
                            </div>
                            <div class="style-tour-card-overlay"></div>
                            <div class="style-tour-card-overlay-front"></div>
                            <div class="style-tour-card-head">
                                <div class="style-tour-card-display clearfix">
                                    <h3 class="style-tour-card-title"><i class="fa fa-map-marker"></i>Independent/Private Travel</h3>
                                    <div class="style-tour-card-count">10 trips</div>
                                </div>

                                <div class="style-tour-card-animate">
                                    <a class="style-tour-card-link" href="#">View all trips</a>
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
                                <img src="https://cdn.himalayanglacier.com/wp-content/uploads/2020/05/school-travel-nepal-400x466.jpg" width="600" height="700" srcset="https://cdn.himalayanglacier.com/wp-content/uploads/2020/05/school-travel-nepal-400x466.jpg 400w, https://cdn.himalayanglacier.com/wp-content/uploads/2020/05/school-travel-nepal.jpg 600w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 100vw, 1150px" alt="School Travel in Nepal" class="img-fluid">
                            </div>
                            <div class="style-tour-card-overlay"></div>
                            <div class="style-tour-card-overlay-front"></div>
                            <div class="style-tour-card-head">
                                <div class="style-tour-card-display clearfix">
                                    <h3 class="style-tour-card-title"><i class="fa fa-map-marker"></i>Corporate Travel</h3>
                                    <div class="style-tour-card-count">61 trips</div>
                                </div>

                                <div class="style-tour-card-animate">
                                    <a class="style-tour-card-link" href="#">View all trips</a>
                                    <div class="style-tour-card-divider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- ========== End of Travel Style Tour ========== -->



@endsection