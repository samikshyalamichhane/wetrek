@extends('front.layouts.app')
@section('title','Adventure Magic | Destinations')
@section('content')
{{-- {{asset('assets/front/    ')}} --}}
        <!-- ========== Package Banner ========== -->
    <div class="tourmaster-single-header inner-image" style="background-image: url('{{asset('images/main/'.$dashboard_settings->destination_banner_image)}}');">
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

                                <h1 class="tourmaster-single-header-title">Destinations</p>
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
                    {!! $dashboard_settings->destination_description !!}
                </p>
            </div>
        </div>
    </section>
    <!-- ========== End of Travel Style Introduction ========== -->

    <!-- ========== Travel Style Tour ========== -->
    <section class="travel-style-tour">
        <div class="container">
            <div class="row">
                @foreach ($dashboard_destinations as $destination)
                    <div class="col-md-4 col-sm-6 mb-4">
                         <div class="hovereffect">
                        <div class="style-tour-card">
                            <div class="style-tour-card-wrap">
                                <div class="style-tour-card-img">
                                    @if ($destination->banner_image)
                                        <a href="{{route('resolvepath.show',[$destination->slug])}}"><img src="{{asset('images/main/'.$destination->banner_image)}}" height="700px" class="img-fluid"></a>
                                    @else
                                        <a href="{{route('resolvepath.show',[$destination->slug])}}"><img src="{{asset('images/noimage.jpg')}}" height="700px" class="img-fluid"></a>
                                    @endif
                                </div>
                                <div class="style-tour-card-overlay"></div>
                                <div class="style-tour-card-overlay-front"></div>
                                <div class="style-tour-card-head cladis">
                                    <div class="style-tour-card-display clearfix">
                                        <div class="sameoverlay">
                                        <h3 class="style-tour-card-title"><i class="fa fa-map-marker"></i><span>{{ $destination->country_name }}</span>
                                        
                                        </h3>
                                        <a class="style-tour-card-link newviewdetail" href="{{route('resolvepath.show',[$destination->slug])}}">    
                                        @php
                                                $packageCount = 0;
                                            @endphp
                                            @foreach ($destination->destinationtype as $desType)
                                                @php
                                                    $packageCount += $desType->packages->count();
                                                @endphp
                                            @endforeach
                                            {{ $packageCount }} Packages</a>
                                        </div>
                                    </div>

                                    <!--<div class="style-tour-card-animate">-->
                                        
                                    <!--    <div class="style-tour-card-divider"></div>-->
                                    <!--</div>-->
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