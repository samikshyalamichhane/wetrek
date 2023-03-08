@extends('front.layouts.app')
<title>Adventure Magic | {{$destination->country_name}}</title>
@section('content')
{{-- {{asset('assets/front/    ')}} --}}

    <!-- ========== Package Banner ========== -->
    <div class="tourmaster-single-header" style="background-image: url('{{asset('images/main/'. $destination->banner_image)}}');">
        <div class="tourmaster-single-header-background-overlay"></div>
        <div class="tourmaster-single-header-overlay"></div>

        <div class="tourmaster-single-header-container tourmaster-container">
            <div class="tourmaster-single-header-container-inner">
                <div class="tourmaster-single-header-title-wrap tourmaster-item-pdlr">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 trip-topic triphead-block p-0 newfo">
                                <div class="tourmaster-single-header-gallery-wrap"></div>
                                <div class="trip-destinations">
                                    <ul>
                                        <li>{{ $destination->country_name }}</li>
                                    </ul>
                                </div>
                                <h1 class="tourmaster-single-header-title">{{ $destination->heading_title }}</p>
                                </h1>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ========== End of Package Banner ========== -->

    <!-- ========== destination========== -->
    <section class="destination-inner test">
        <div class="container">
            <!--<div class="destination-summary">-->
            <!--    <div class="destination-title">-->
            <!--        <h1>{{ $destination->country_name }} Introduction:</h1>-->
            <!--    </div>-->
            <!--    <p>-->
            <!--        {!! $destination->intro !!}-->
            <!--    </p>-->
            <!--</div>-->

            <div class="destination-summary">
                <!--<div class="destination-title">-->
                <!--    <h1>Description:</h1>-->
                <!--</div>-->
                <p>
                    {!! $destination->description !!}
                </p>
                {{-- <p>
                    Landlocked in south Asia, between India and China, Nepal is home of the world's highest mountain (Eight of the fourteen highest mountain peaks in the world are in Nepal), including Mt. Everest (8848 m), the highest point on earth.
                </p>
                <p>
                    Nepal is the most beautiful mountain country in Asia. With famous trekking to Everest Base Camp, Annapurna Base Camp, Langtang Valley Trek & Manaslu Trek, Nepal is the best adventure travel & trekking destination in the world.
                </p>
                <p>
                    Kathmandu is the capital of Nepal. Kathmandu City is full of temples of Hindu God & Goddess, richest in Hindu & Buddhist cultural heritages, historical sites, and buddhist monasteries. Lumbini, Nepal is the birthplace of Lord Buddha.
                </p>
                <p>
                    Including Kathmandu, Hill station of Nagarkot, Lake city Pokhara, Chitwan National Park, Lumbini, Bardia National Park, Bandipur & Tansen are the most popular tour cities in the country.

                </p> --}}
            </div>
        </div>

        <!-- features dynamic-->
        <div class="destination-feature">
            <!-- single destination feature -->
            {{-- @if (isset($destinationPackages[0])) --}}
            <div class="destination-feature-single">
                <div class="container">
                    <div class="destination-title">
                        <h1>Adventure Magic in {{$destination->country_name}}</h1>
                    </div>

                    <div class="destination-feature-list">
                        <div class="row mt-5">
                            @foreach ($destinationType as $type)
                                @foreach ($type->packages->where('classic_vacation', 1) as $package)
                                    <div class="col-md-4 col-sm-6">
                                        <div class="card package-listing-card">
                                            <a href="{{route('packageDetails', $package->slug)}}">
                                                <img src="{{asset('images/main/'.$package->image)}}" alt="">
                                            </a>
                                            <div class="card-body">
                                                <h3 class="package-listing-card-title">
                                                    <a href="{{route('packageDetails', $package->slug)}}">
                                                        {{ $package->package_name }}
                                                    </a>
                                                </h3>
                                                <span class="text-right package-listing-tag">{{ $package->nature_of_trek }}</span>

                                                <div class="package-listing-info">
                                                    <span class="date">
                                                        <i class="fa fa-calendar"></i>
                                                        {{ $package->days_and_nights }}
                                                    </span>

                                                    <span class="price">{{ $package->price }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach

                        </div>
                        <div class="more-packages">
                            <a href="{{route('classicVacationList')}}" class="link-more-package">View all</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @endif --}}
            <!-- single destination feature end -->

            <!-- single destination feature -->
            @if (isset($mountainTrekPackages[0]))
            <div class="destination-feature-single">
                <div class="container">
                    <div class="destination-title">
                        <h1>Mountain Trekking in {{$destination->country_name}}</h1>
                    </div>

                    <div class="destination-feature-list">
                        <div class="row mt-5">
                            @foreach ($mountainTrekPackages as $type)
                                @foreach ($type->packages->where('mountain_trek', 1) as $package)
                                    <div class="col-md-4 col-sm-6">
                                        <div class="card package-listing-card">
                                            <a href="{{route('packageDetails', $package->slug)}}">
                                                <img src="{{asset('images/main/'.$package->image)}}" alt="">
                                            </a>

                                            <div class="card-body">
                                                <h3 class="package-listing-card-title">
                                                    <a href="{{route('packageDetails', $package->slug)}}">
                                                        {{ $package->package_name }}
                                                    </a>
                                                </h3>
                                                <span class="text-right package-listing-tag">{{ $package->nature_of_trek }}</span>

                                                <div class="package-listing-info">
                                                    <span class="date">
                                                        <i class="fa fa-calendar"></i>
                                                        {{ $package->days_and_nights }}
                                                    </span>

                                                    <span class="price">{{ $package->price }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                        <div class="more-packages">
                            <a href="{{route('resolvepath.showTwoSlug',[$destination->slug, ''])}}" class="link-more-package">View all</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- single destination feature end -->

            <!-- single destination feature -->
            @if (isset($popularTourPackages[0]))
            <div class="destination-feature-single">
                <div class="container">
                    <div class="destination-title">
                        <h1>Popular Tours in {{$destination->country_name}}</h1>
                    </div>

                    <div class="destination-feature-list">
                        <div class="row mt-5">
                            @foreach ($popularTourPackages as $type)
                                @foreach ($type->packages->where('popular_tours', 1) as $package)
                                    <div class="col-md-4 col-sm-6">
                                        <div class="card package-listing-card">
                                            {{-- <img src="{{asset('assets/front/img/blog-2.png')}}" alt=""> --}}
                                            <a href="{{route('packageDetails', $package->slug)}}">
                                                <img src="{{asset('images/main/'.$package->image)}}" alt="">
                                            </a>
                                            <div class="card-body">
                                                <h3 class="package-listing-card-title">
                                                    <a href="{{route('packageDetails', $package->slug)}}">
                                                        {{ $package->package_name }}
                                                    </a>
                                                </h3>
                                                <span class="text-right package-listing-tag">{{ $package->nature_of_trek }}</span>

                                                <div class="package-listing-info">
                                                    <span class="date">
                                                        <i class="fa fa-calendar"></i>
                                                        {{ $package->days_and_nights }}
                                                    </span>

                                                    <span class="price">{{ $package->price }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach

                        </div>
                        <div class="more-packages">
                            <a href="{{ route('popularTourPackage',$destination->slug) }}" class="link-more-package">View all</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- single destination feature end -->

            <!-- single destination feature -->
            @if (isset($peakClimbingExpeditionsPackages[0]))
                <div class="destination-feature-single">
                    <div class="container">
                        <div class="destination-title">
                            <h1>Peak Climbing & Expeditions in {{$destination->country_name}}</h1>
                        </div>

                        <div class="destination-feature-list">
                            <div class="row mt-5">
                                @foreach ($peakClimbingExpeditionsPackages as $type)
                                    @foreach ($type->packages->where('peak_climbing_expeditions', 1) as $package)
                                        <div class="col-md-4 col-sm-6">
                                            <div class="card package-listing-card">
                                                {{-- <img src="{{asset('assets/front/img/blog-2.png')}}" alt=""> --}}
                                                <a href="{{route('packageDetails', $package->slug)}}">
                                                    <img src="{{asset('images/main/'.$package->image)}}" alt="">
                                                </a>
                                                <div class="card-body">
                                                    <h3 class="package-listing-card-title">
                                                        <a href="{{route('packageDetails', $package->slug)}}">
                                                            {{ $package->package_name }}
                                                        </a>
                                                    </h3>
                                                    <span class="text-right package-listing-tag">Cultural, Adventure</span>

                                                    <div class="package-listing-info">
                                                        <span class="date">
                                                            <i class="fa fa-calendar"></i>
                                                            {{ $package->days_and_nights }}
                                                        </span>

                                                        <span class="price">{{ $package->price }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                            </div>
                            <div class="more-packages">
                                <a href="{{ route('peakClimbingExpeditionsPackage',$destination->slug) }}" class="link-more-package">View all</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- single destination feature end -->

            <!-- single destination feature -->
            @if (isset($adventureRoadTripPackages[0]))
            <div class="destination-feature-single">
                <div class="container">
                    <div class="destination-title">
                        <h1>Adventure Road Trip in {{$destination->country_name}}</h1>
                    </div>

                    <div class="destination-feature-list">
                        <div class="row mt-5">
                            @foreach ($adventureRoadTripPackages as $type)
                                @foreach ($type->packages->where('adventure_road_trip', 1) as $package)
                                    <div class="col-md-4 col-sm-6">
                                        <div class="card package-listing-card">
                                            <a href="{{route('packageDetails', $package->slug)}}">
                                                <img src="{{asset('images/main/'.$package->image)}}" alt="">
                                            </a>
                                            <div class="card-body">
                                                <h3 class="package-listing-card-title">
                                                    <a href="{{route('packageDetails', $package->slug)}}">
                                                        {{ $package->package_name }}
                                                    </a>
                                                </h3>
                                                <span class="text-right package-listing-tag">{{ $package->nature_of_trek }}</span>

                                                <div class="package-listing-info">
                                                    <span class="date">
                                                        <i class="fa fa-calendar"></i>
                                                        {{ $package->days_and_nights }}
                                                    </span>

                                                    <span class="price">{{ $package->price }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                        <div class="more-packages">
                            <a href="{{ route('adventureRoadTripPackage',$destination->slug) }}" class="link-more-package">View all</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- single destination feature end -->
        </div>
        <!-- features end -->

        <!-- FAQ related to nepal -->
        @if (isset($destination->faq[0]))
        <div class="destination-faq package-faq">
            <div class="container">
                <div class="destination-title">
                    <h1>{{$destination->country_name}} FAQ's</h1>
                </div>
                <!-- faq -->
                <ul class="accordion-list">
                    @foreach($destination->faq as $data)
                        <li>
                            <h3>{{$data->questions}}</h3>
                            <div class="answer">
                                <p>{!! $data->answers !!}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <!-- faq end -->
            </div>
        </div>
        @endif
        <!-- FAQ related to end -->
    </section>
    <!-- ========== End of destination ========== -->

@endsection
