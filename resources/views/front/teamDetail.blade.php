@extends('front.layouts.app')
<title>Adventure Magic | Team | {{ $details->name}} </title>
@section('content')
{{-- {{asset('assets/front/    ')}} --}}

     <!-- ========== Package Banner ========== -->
    <div class="tourmaster-single-header" style="background-image: url('{{asset('images/main/'.$dashboard_settings->team_banner_image)}}');">
        <div class="tourmaster-single-header-background-overlay"></div>
        <div class="tourmaster-single-header-overlay"></div>

        <div class="tourmaster-single-header-container tourmaster-container">
            <div class="tourmaster-single-header-container-inner">
                <div class="tourmaster-single-header-title-wrap tourmaster-item-pdlr">
                    <div class="container">
                        <div class="row">
                            <div class="COL-12 trip-topic triphead-block p-0">
                                <div class="tourmaster-single-header-gallery-wrap"></div>

                                <h1 class="tourmaster-single-header-title">{{ $details->name }}</p>
                                </h1>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ========== End of Package Banner ========== -->

    <!-- ========== Our Team Detail ========== -->
    <section class="team-detail">
        <div class="container">
            <div class="team-detail-wrapper">
                <!-- single team detail -->
                <div class="team-detail-single">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="team-detail-img">
                                <img src="{{asset('images/main/'.$details->image)}}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="team-detail-content">
                                <div class="team-detail-list">
                                    <h2 class="team-detail-list-title">{{ $details->name }}</h2>
                                    <span class="team-detail-list-info">{{ $details->position }}</span>
                                </div>
                                <div class="team-detail-list">
                                    <h2 class="team-detail-list-title">Languages</h2>
                                    <span class="team-detail-list-info">{{ $details->language }}</span>
                                </div>
                                <div class="team-detail-list">
                                    <h2 class="team-detail-list-title">Experiences</h2>
                                    <span class="team-detail-list-info">{{ $details->experience }}</span>
                                </div>
                            </div>
                        </div>


                    </div>

                    {{-- <div class="row mt-md-5 mt-3">
                        <div class="col-12">
                            <p class="team-detail-description">
                                Just like an old saying “Life does not move ahead like the way you think”, in the same way, Sagar Pandey’s life did not turn out the way he wanted it to be. With an ambition of becoming a Geologist or Mining Engineer, an energetic youth landed up as a business entrepreneur and started operating an Adventure and Travel Company in Kathmandu. Born and brought up in a remote area of an inaccessible village of Gorkha district, hiking for him was nothing more than just an ordinary lifestyle. Later while pursuing his studies in geology, Sagar had to go trekking where he hiked in the mountainous regions of Nepal for some research works related to his academic progression.
                            </p>
                        </div>
                    </div> --}}
                </div>
                <!-- single team detail end -->

                <div class="team-detail-description">
                {!! @$details->description !!}
                </div>
                <!-- single team detail -->
                {{-- <div class="team-detail-single">
                    <div class="team-detail-title">
                        <h1>Some Title Here</h1>
                    </div>

                    <div class="team-detail-description">
                        Just like an old saying “Life does not move ahead like the way you think”, in the same way, Sagar Pandey’s life did not turn out the way he wanted it to be. With an ambition of becoming a Geologist or Mining Engineer, an energetic youth landed up as a business entrepreneur and started operating an Adventure and Travel Company in Kathmandu. Born and brought up in a remote area of an inaccessible village of Gorkha district, hiking for him was nothing more than just an ordinary lifestyle. Later while pursuing his studies in geology, Sagar had to go trekking where he hiked in the mountainous regions of Nepal for some research works related to his academic progression.
                    </div>
                </div> --}}
                <!-- single team detail end -->

                <!-- single team detail -->
                {{-- <div class="team-detail-single">
                    <div class="team-detail-title">
                        <h1>Certificates</h1>
                    </div>

                    <div class="team-detail-certificate swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="team-detail-certificate-single">
                                    <img src="{{asset('assets/front/img/certificate1.png')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="team-detail-certificate-single">
                                    <img src="{{asset('assets/front/img/certificate2.png')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="team-detail-certificate-single">
                                    <img src="{{asset('assets/front/img/certificate3.png')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-nav">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div> --}}
                <!-- single team detail end -->


                <!-- single team detail -->
                {{-- <div class="team-detail-single">
                    <div class="team-detail-title">
                        <h1>Some Title Here</h1>
                    </div>

                    <div class="team-detail-description">
                        Just like an old saying “Life does not move ahead like the way you think”, in the same way, Sagar Pandey’s life did not turn out the way he wanted it to be. With an ambition of becoming a Geologist or Mining Engineer, an energetic youth landed up as a business entrepreneur and started operating an Adventure and Travel Company in Kathmandu. Born and brought up in a remote area of an inaccessible village of Gorkha district, hiking for him was nothing more than just an ordinary lifestyle. Later while pursuing his studies in geology, Sagar had to go trekking where he hiked in the mountainous regions of Nepal for some research works related to his academic progression.
                    </div>
                </div> --}}
                <!-- single team detail end -->


            </div>
        </div>
    </section>
    <!-- ========== End of Team Detail ========== -->

@endsection
