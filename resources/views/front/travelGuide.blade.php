@extends('front.layouts.app')
@section('title','Adventure Magic | Travel Guide')
@section('content')
{{-- {{asset('assets/front/    ')}} --}}
        <!-- ========== Package Banner ========== -->
    <div class="tourmaster-single-header inner-image" style="background-image: url('{{asset('images/main/'.$dashboard_settings->travelGuide_image)}}');">
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

                                <h1 class="tourmaster-single-header-title">Travel Guide</p>
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
                    {!! $dashboard_settings->travelGuide_description !!}
                </p>
            </div>
        </div>
    </section>
    <!-- ========== End of Travel Style Introduction ========== -->

    <!-- ========== Travel Style Tour ========== -->
    <section class="travel-style-tour">
        <div class="container">
            <div class="row">
                @foreach($dashboard_pages as $page)
                    <div class="col-md-4 col-sm-6 mb-4">
                        
                        <div class="style-tour-card">
                            <div class="style-tour-card-wrap">
                                <div class="style-tour-card-img">
                                    @if ($page->image)
                                    <a href="{{asset('images/main/'.$page->image)}}"><img src="{{asset('images/main/'.$page->image)}}" height="700px" alt="Climbing Mountain" class="img-fluid"></a>
                                    @else
                                    <a href="http://adventuremagic.webhousejapan.com/images/listing/Tue-06-45-10-1922084033-banner1.png"><img src="http://adventuremagic.webhousejapan.com/images/listing/Tue-06-45-10-1922084033-banner1.png" height="700px" alt="Climbing Mountain" class="img-fluid"></a>
                                    @endif
                                </div>
                                <div class="style-tour-card-overlay"></div>
                                <div class="style-tour-card-overlay-front"></div>
                                <div class="style-tour-card-head advguide">
                                    <div class="style-tour-card-display clearfix">
                                        <h3 class="style-tour-card-title"><i class="fa fa-map-marker"></i>{{ $page->title }}</h3>
                                        {{-- <div class="style-tour-card-count">{{ $page->packages->count() }} trips</div> --}}
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
            </div>
        </div>
    </section>
    <!-- ========== End of Travel Style Tour ========== -->



@endsection