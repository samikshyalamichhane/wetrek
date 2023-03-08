@extends('front.layouts.app')
<title>Adventure Magic | Who We Are</title>
@section('content')
{{-- {{asset('assets/front/    ')}} --}}
        <!-- ========== Package Banner ========== -->
        <div class="tourmaster-single-header inner-image" style="background-image: url('{{asset('images/main/'.$dashboard_settings->whoweare_banner)}}');">
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

                                    <h1 class="tourmaster-single-header-title">About US</p>
                                    </h1>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- ========== End of Package Banner ========== -->

        <!-- ========== About Introduction ========== -->
        <section class="about-introduction">
            <div class="container">
                <div class="about-title">
                    @if (isset($dashboard_settings->title1))
                    <h1>{{ $dashboard_settings->title1 }}</h1>
                    @else
                    <h1>Adventure Magic is a Top quality tour operation in Nepal.</h1>
                    @endif

                </div>

                <div class="about-content">
                    <p>
                        {!! $dashboard_settings->title2 !!}
                    </p>
                </div>

            </div>
        </section>
        <!-- ========== End of About Introduction ========== -->

        <!-- ========== About why Classic ========== -->
        <section class="about-why-classic">
            <div class="container">
                <div class="about-title">
                    <!-- @if (isset($dashboard_settings->title3)) -->
                    <h1>{{ $dashboard_settings->title3 }}</h1>
                    <!-- @else
                    <h1>Why CLassic Vacations Nepal?</h1>
                    @endif -->
                </div>

                <div class="about-content">
                    <p>
                        {!! $dashboard_settings->title4 !!}
                </div>

            </div>
        </section>
        <!-- ========== End of About Why Classic ========== -->

        <!-- ========== About Feature ========== -->
        {{-- @if (isset($dashboard_settings->sqt_description[0])) --}}
            <section class="about-feature">
                @foreach ($dashboard_travelwithusAboutusPage as $key => $travelwithus)
                    @if (fmod($key, 2) == 0)
                        <div class="about-feature-single">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="composition">
                                            <img alt="Photo 1" class="composition__photo composition__photo--p1" src="{{asset('images/main/'.$travelwithus->image1)}}">

                                            <img alt="Photo 2" class="composition__photo composition__photo--p2" src="{{asset('images/main/'.$travelwithus->image2)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="about-feature-content">
                                            <h3 class="about-feature-title">{{ $travelwithus->whywithus_title }}</h3>
                                            <p>
                                                {!! $travelwithus->description !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="about-feature-single">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="about-feature-content">
                                            <h3 class="about-feature-title">{{ $travelwithus->whywithus_title }}</h3>
                                            <p>
                                                {!! $travelwithus->description !!}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="composition">
                                            <img alt="Photo 1" class="composition__photo composition__photo--p1" src="{{asset('images/main/'.$travelwithus->image1)}}">

                                            <img alt="Photo 2" class="composition__photo composition__photo--p2" src="{{asset('images/main/'.$travelwithus->image2)}}">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </section>

            <!-- single feature -->

            <!-- single feature -->
            {{-- @if (isset($dashboard_settings->ps_description[0]))
            <div class="about-feature-single">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="about-feature-content">
                                <h3 class="about-feature-title">Personalized Services & Customers Satisfaction</h3>
                                <p>
                                    {!! $dashboard_settings->ps_description !!}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="composition">
                                <img alt="Photo 1" class="composition__photo composition__photo--p1" src="{{asset('images/main/'.$dashboard_settings->ps_image1)}}">

                                <img alt="Photo 2" class="composition__photo composition__photo--p2" src="{{asset('images/main/'.$dashboard_settings->ps_image2)}}">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endif --}}
            <!-- single feature -->

            <!-- single feature -->
            {{-- <div class="about-feature-single">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="composition">
                                <img alt="Photo 1" class="composition__photo composition__photo--p1" src="{{asset('assets/front/img/nat-1-large.jpg')}}">

                                <img alt="Photo 2" class="composition__photo composition__photo--p2" src="{{asset('assets/front/img/nat-2-large.jpg')}}">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="about-feature-content">
                                <h3 class="about-feature-title">Safety & Quality Trip</h3>
                                <p>
                                    Trip safety & quality has always been our top priority. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex autem, earum quam voluptatum accusantium facere quaerat quisquam est nam! Aliquid repudiandae accusantium est dolore quis fugit accusamus nobis tempora, repellendus id culpa, voluptatem numquam, unde autem excepturi tempore architecto esse voluptates necessitatibus voluptatibus! Molestias aliquam nobis optio eaque corrupti voluptatum?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- single feature -->

            <!-- single feature -->
            {{-- <div class="about-feature-single">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="about-feature-content">
                                <h3 class="about-feature-title">Personalized Services & Customers Satisfaction</h3>
                                <p>
                                    Trip safety & quality has always been our top priority. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex autem, earum quam voluptatum accusantium facere quaerat quisquam est nam! Aliquid repudiandae accusantium est dolore quis fugit accusamus nobis tempora, repellendus id culpa, voluptatem numquam, unde autem excepturi tempore architecto esse voluptates necessitatibus voluptatibus! Molestias aliquam nobis optio eaque corrupti voluptatum?
                                </p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="composition">
                                <img alt="Photo 1" class="composition__photo composition__photo--p1" src="{{asset('assets/front/img/nat-1-large.jpg')}}">

                                <img alt="Photo 2" class="composition__photo composition__photo--p2" src="{{asset('assets/front/img/nat-2-large.jpg')}}">
                            </div>
                        </div>

                    </div>
                </div>
            </div> --}}
            <!-- single feature -->

            <!-- single feature -->
            {{-- <div class="about-feature-single">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="about-img-content">
                                <img src="{{asset('assets/front/img/nat-1-large.jpg')}}" alt="" class="card-img">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="about-feature-content">
                                <h3 class="about-feature-title">Safety & Quality Trip</h3>
                                <p>
                                    Trip safety & quality has always been our top priority. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex autem, earum quam voluptatum accusantium facere quaerat quisquam est nam! Aliquid repudiandae accusantium est dolore quis fugit accusamus nobis tempora, repellendus id culpa, voluptatem numquam, unde autem excepturi tempore architecto esse voluptates necessitatibus voluptatibus! Molestias aliquam nobis optio eaque corrupti voluptatum?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- single feature -->

            <!-- single feature -->
            {{-- <div class="about-feature-single">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="about-feature-content">
                                <h3 class="about-feature-title">Personalized Services & Customers Satisfaction</h3>
                                <p>
                                    Trip safety & quality has always been our top priority. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex autem, earum quam voluptatum accusantium facere quaerat quisquam est nam! Aliquid repudiandae accusantium est dolore quis fugit accusamus nobis tempora, repellendus id culpa, voluptatem numquam, unde autem excepturi tempore architecto esse voluptates necessitatibus voluptatibus! Molestias aliquam nobis optio eaque corrupti voluptatum?
                                </p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="about-img-content">
                            <img src="{{asset('assets/front/img/nat-2-large.jpg')}}" alt="" class="card-img">
                            </div>
                        </div>

                    </div>
                </div>
            </div> --}}
            <!-- single feature -->



        <!-- ========== End of About Feature ========== -->

@endsection