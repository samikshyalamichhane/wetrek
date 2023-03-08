@extends('front.layouts.app')
<title>Adventure Magic | Why Us</title>
@section('content')
{{-- {{asset('assets/front/    ')}} --}}
        <!-- ========== Package Banner ========== -->
    <div class="tourmaster-single-header" style="background-image: url('{{asset('images/main/'.$dashboard_settings->whyus_banner)}}');">
        <div class="tourmaster-single-header-background-overlay"></div>
        <div class="tourmaster-single-header-overlay"></div>

        <div class="tourmaster-single-header-container tourmaster-container">
            <div class="tourmaster-single-header-container-inner">
                <div class="tourmaster-single-header-title-wrap tourmaster-item-pdlr">
                    <div class="container">
                        <div class="row">
                            <div class="COL-12 trip-topic triphead-block p-0">
                                <div class="tourmaster-single-header-gallery-wrap"></div>

                                <h1 class="tourmaster-single-header-title">Why Adventure Magic</p>
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
    @if (isset($dashboard_settings->whyus_title1[0]))
        <section class="about-introduction">
            <div class="container">
                <div class="about-title">
                    @if (isset($dashboard_settings->whyus_title1))
                        <h1>{{ $dashboard_settings->whyus_title1 }}</h1>
                    @endif
                </div>
                <div class="about-content">
                    @if (isset($dashboard_settings->whyus_title2))
                        <p>
                            {!! $dashboard_settings->whyus_title2 !!}
                        </p>
                    @endif
                </div>
            </div>
        </section>
    @endif

    <!-- ========== End of About Introduction ========== -->

    <!-- ========== About why Classic ========== -->
    @if (isset($dashboard_settings->whyus_title3[0]))
        <section class="about-why-classic">
            <div class="container">
                <div class="about-title">
                    @if (isset($dashboard_settings->whyus_title3))
                        <h1>{{ $dashboard_settings->whyus_title3 }}</h1>
                    @endif
                </div>

                <div class="about-content">
                    @if (isset($dashboard_settings->whyus_title4))
                        <p>
                            {!! $dashboard_settings->whyus_title4 !!}
                        </p>
                    @endif
                </div>

            </div>
        </section>
    @endif

    <!-- ========== End of About Why Classic ========== -->

    <!-- ========== About Feature ========== -->
    <section class="about-feature">
        <!-- single feature -->

        @foreach ($dashboard_travelwithusAboutusPage as $key => $travelwithus)
        @if (fmod($key, 2) == 0)
        <div class="about-feature-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="about-img-content">
                            <img src="{{asset('images/main/'.$travelwithus->image1)}}" alt="" class="card-img">
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
                        <div class="about-img-content">
                        <img src="{{asset('images/main/'.$travelwithus->image1)}}" alt="" class="card-img">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endif
        @endforeach
    </section>
    <!-- ========== End of About Feature ========== -->

@endsection