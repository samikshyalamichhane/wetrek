@extends('front.layouts.app-package')
<title>{{$helitourPackage->package_name}}-{{ $dashboard_settings->page_title }}</title>

@section('content')

{{-- {{asset('assets/front/   ')}} --}}

    <!-- ========== Inner Package ========== -->
    <main>
        <section class="hero-image">
            <div class="hero-image__frame gradient-overlay" style="background-image: url('{{asset('images/main/'.$helitourPackage->image)}}');">
                <div class="container">
                    <h1 class="inner-hero-title"> {{$helitourPackage->package_name}} - {{$helitourPackage->days_and_nights}} </h1>
                </div>
            </div>
        </section>

        <section class="detail-section">
            <div class="container">
                <div class="row main" id="main-content">
                    <div id="content" class="trip-detail trip-detail--alt col-lg-8 col-12">
                        <!-- TRIP DETAIL SHARE -->
                        <div class="trip-detail__share">
                            <div class="social-share">
                                <span class="social-share__title">Share with your Friends</span>
                                <ul class="share-list">
                                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                    <div class="addthis_inline_share_toolbox_fn5a"></div>

                                    {{-- <li class="share-list__item">
                                        <div class="circle">
                                            <a href="#" target="_blank">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="share-list__item">
                                        <div class="circle">
                                            <a href="#" target="_blank">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="share-list__item">
                                        <div class="circle">
                                            <a href="#" target="_blank">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="share-list__item">
                                        <div class="circle">
                                            <a href="#" target="_blank">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        </div>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        <!-- END TRIP DETAIL SHARE -->

                        <!-- TRIP DETAIL TABLE -->
                        @if (isset($helitourPackage->destination->country_name))
                        <div class="row trip-detail__table">
                            <div class="mx-auto mb-4 col-lg-3 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-location2"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Destination</h6>
                                        <h6 class="trip-detail__table--subtitle">{{$helitourPackage->destination->country_name}}</h6>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if (isset($helitourPackage->activity->name))
                            <div class="mx-auto mb-4 col-lg-4 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-travel-walk"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Activity</h6>
                                        <h6 class="trip-detail__table--subtitle">{{$helitourPackage->activity->name}}</h6>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if (isset($helitourPackage->accommodation))
                            <div class="mx-auto mb-4 col-lg-5 col-6">
                                <div class="media">
                                    <img src="{{asset('assets/front/images/icon-tent.svg')}}" alt="" class="img-fluid icon-table">
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Accomodation</h6>
                                        <h6 class="trip-detail__table--subtitle">{{$helitourPackage->accommodation}}</h6>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if (isset($helitourPackage->activity->name))
                            <div class="mx-auto mb-4 col-lg-3 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-map"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Region</h6>
                                        <h6 class="trip-detail__table--subtitle">{{$helitourPackage->activity->name}}</h6>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if (isset($helitourPackage->distance))
                            <div class="mx-auto mb-4 col-lg-4 col-6">
                                <div class="media">
                                    <img src="{{asset('assets/front/images/icon-distance.svg')}}" alt="" class="img-fluid icon-table">
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Distance</h6>
                                        <h6 class="trip-detail__table--subtitle">{{$helitourPackage->distance}}</h6>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if (isset($helitourPackage->start_point) || isset($helitourPackage->end_point))
                            <div class="mx-auto mb-4 col-lg-5 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-direction"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Start / End Point</h6>
                                        <h6 class="trip-detail__table--subtitle">{{$helitourPackage->start_point}}/{{$helitourPackage->end_point}}</h6>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if (isset($helitourPackage->days_and_nights))
                            <div class="mx-auto mb-4 col-lg-3 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-calendar"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Duration</h6>
                                        <h6 class="trip-detail__table--subtitle">{{$helitourPackage->days_and_nights}}</h6>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if (isset($helitourPackage->max_altitude))
                            <div class="mx-auto mb-4 col-lg-4 col-6">
                                <div class="media">
                                    <img src="{{asset('assets/front/images/icon-travel.svg')}}" alt="" class="img-fluid icon-table">
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Max. Altitude</h6>
                                        <h6 class="trip-detail__table--subtitle">{{$helitourPackage->max_altitude}}</h6>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if (isset($helitourPackage->meals_include))
                            <div class="mx-auto mb-4 col-lg-5 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-spoon-knife"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Meals Included</h6>
                                        <h6 class="trip-detail__table--subtitle">{{$helitourPackage->meals_include}}</h6>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if (isset($helitourPackage->group_size))
                            <div class="mx-auto mb-4 col-lg-3 col-6">
                                <div class="media">
                                <img src="{{asset('assets/front/images/icon-group.svg')}}" alt="" class="img-fluid icon-table">
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Group Size</h6>
                                        <h6 class="trip-detail__table--subtitle">{{$helitourPackage->group_size}}</h6>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if (isset($helitourPackage->nature_of_trek))
                            <div class="mx-auto mb-4 col-lg-4 col-6">
                                <div class="media">
                                <img src="{{asset('assets/front/images/icon-nature.svg')}}" alt="" class="img-fluid icon-table">
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Nature of Trek</h6>
                                        <h6 class="trip-detail__table--subtitle">{{$helitourPackage->nature_of_trek}}</h6>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if (isset($helitourPackage->best_season))
                            <div class="mx-auto mb-4 col-lg-5 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-icloud"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Best Season</h6>
                                        <h6 class="trip-detail__table--subtitle">{{$helitourPackage->best_season}}</h6>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if (isset($helitourPackage->trip_code))
                            <div class="mx-auto mb-4 col-lg-3 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-qrcode"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Trip Code</h6>
                                        <h6 class="trip-detail__table--subtitle">{{$helitourPackage->trip_code}}</h6>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if (isset($helitourPackage->activity_per_day))
                            <div class="mx-auto mb-4 col-lg-4 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-directions_run"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Activity Per Day</h6>
                                        <h6 class="trip-detail__table--subtitle">{{$helitourPackage->activity_per_day}}</h6>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if (isset($helitourPackage->transportation))
                            <div class="mx-auto mb-4 col-lg-5 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-bus"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Transporation</h6>
                                        <h6 class="trip-detail__table--subtitle">{{$helitourPackage->transportation}}</h6>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if (isset($helitourPackage->grade))
                            <div class="b-2 col-lg-3 col-6">
                                <div class="media">
                                    <svg class="trip-detail__icon">
                                        <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-speedometer"></use>
                                    </svg>
                                    <div class="media-body">
                                        <h6 class="trip-detail__table--title">Grade</h6>
                                        <h6 class="trip-detail__table--subtitle">{{$helitourPackage->grade}}</h6>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <!-- END TRIP DETAIL TABLE -->

                        <!-- TRIP DETAILS -->
                        <div class="trip-detail__card">
                            @if (isset($helitourPackage->description))
                            <h2 class="trip-detail__card--title">{{$helitourPackage->package_name}} Overview</h2>
                            <p>{{$helitourPackage->description}}</p>

                            @endif

                            @if (isset($helitourPackage->trip_highlights_title) || isset($helitourPackage->trip_highlights_description))
                            <div class="highlight-list">
                                <div class="sub-title">
                                    <svg class="search-icon">
                                        <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-badge"></use>
                                    </svg>
                                    <span>{{$helitourPackage->trip_highlights_title}}</span>
                                </div>
                                <ul class="list list--hand-bullet">
                                {!! $helitourPackage->trip_highlights_description !!}
                                </ul>
                            </div>
                            @endif

                            @if (isset($helitourPackage->perks_title) || isset($helitourPackage->perks_description))
                            <h3 class="highlight-list__title">{{$helitourPackage->perks_title}}</h3>
                            <ul class="list list--hand-bullet">
                                {{-- <li> --}}
                                    {!! $helitourPackage->perks_description !!}
                                {{-- </li> --}}
                            </ul>
                            @endif


                        </div>
                        @if (isset($helitourPackage->overview_title) || isset($helitourPackage->overview_description) || isset($helitourPackage->overview_highlights))
                        <div class="trip-detail__card" id="overview">
                            <div class="highlight-list">
                                <div class="sub-title">
                                    <svg class="search-icon">
                                        <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-search"></use>
                                    </svg>
                                    <span>{{ $helitourPackage->overview_title }}</span>
                                </div>
                                @if (isset($helitourPackage->overview_description))
                                <p>
                                    <span style="font-weight: 400;">
                                    {!! $helitourPackage->overview_description !!}
                                    </span>
                                </p>
                                @endif

                                @if (isset($helitourPackage->overview_highlights))
                                <div class="highlight-card">
                                    <p>
                                    {!! $helitourPackage->overview_highlights !!}
                                    </p>
                                </div>
                                @endif

                            </div>

                        </div>
                        @endif


                        <!-- 3rd -->
                        @if (isset($helitourPackage->slider__images[0]) || isset($helitourPackage->photo_video_title) || isset($helitourPackage->youtube_video_link))
                        <div class="trip-detail__card" id="photos-videos">
                            <div class="sub-title">
                                <svg class="search-icon">
                                    <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-file-picture"></use>
                                </svg>
                                @if (isset($helitourPackage->photo_video_title))
                                <h2>{{ $helitourPackage->photo_video_title }}</h2>
                                @else
                                <h2>{{ $helitourPackage->package_name }} Photo</h2>

                                @endif
                            </div>
                            @if (isset($helitourPackage->youtube_video_link))
                            <div class="mt-5 mb-1 video-list">
                                <iframe width="100%" height="500" src="{{ $helitourPackage->youtube_video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            @endif

                            @if (isset($helitourPackage->slider__images))
                            <div class="image-list">
                                <div class="row">
                                    @foreach(@$helitourPackage->slider__images as $key => $data)
                                    <div class="mb-3 col-4">
                                        <a href="{{ asset('images/helitour/package/multiple/'. $data->sliderimages) }}" data-lightbox="image-gallery">
                                            <img src="{{ asset('images/helitour/package/multiple/'. $data->sliderimages) }}" alt="" class="img-fluid w-100">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                        @endif
                        <!-- End 3rd -->

                        <!-- Trip Detail Card #itinerary -->
                        @if (isset($helitourPackage->helitourpackageitinerary[0]))
                        <div class="trip-detail__card" id="itinerary">
                            <div class="sub-title">
                                <svg class="search-icon">
                                    <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-list2"></use>
                                </svg>
                                <h2>{{$helitourPackage->package_name}}</h2>
                            </div>
                            <ol class="itinerary-list">
                            @foreach(@$helitourPackage->helitourpackageitinerary as $key => $value)
                                <li class="itinerary-item">
                                    <span class="day-count">
                                        <span class="day-text">day</span>
                                        <span class="day-num">{{++$key}}</span>
                                    </span>
                                    <h2>{{@$value->title}}</h2>

                                    <table class="itinerary-item__table">
                                        <tbody class="itinerary-item__table-body">
                                            @if (isset($value->trek_distance))
                                            <tr>
                                                <th>
                                                    <span class="icon">
                                                        <svg class="search-icon">
                                                            <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-travel-walk"></use>
                                                        </svg>
                                                    </span>
                                                    Trek Distance
                                                </th>
                                                <td>{{@$value->trek_distance}} </td>
                                            </tr>
                                            @endif
                                            @if (isset($value->flight_hours))
                                            <tr>
                                                <th>
                                                    <span class="icon">
                                                        <svg class="search-icon">
                                                            <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-airplanemode_on"></use>
                                                        </svg>
                                                    </span>
                                                    Flight Hours
                                                </th>
                                                <td> {{@$value->flight_hours}} </td>
                                            </tr>
                                            @endif
                                            @if (isset($value->highest_altitude))
                                            <tr>
                                                <th>
                                                    <span class="icon">
                                                        <svg class="search-icon">
                                                            <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-icloud"></use>
                                                        </svg>
                                                    </span>
                                                    Highest Altitude
                                                </th>
                                                <td> {{@$value->highest_altitude}} </td>
                                            </tr>
                                            @endif
                                            @if (isset($value->trek_duration))
                                            <tr>
                                                <th>
                                                    <span class="icon">
                                                        <svg class="search-icon">
                                                            <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-stop-watch"></use>
                                                        </svg>
                                                    </span>
                                                    Trek Duration
                                                </th>
                                                <td> {{@$value->trek_duration}} </td>
                                            </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                    @if (isset($value->activity_details))
                                    <p>
                                        {!! $value->activity_details	!!}
                                    </p>
                                    @endif
                                    @if(isset($value->lodging) || isset($value->fooding))
                                    <div class="highlight-card">
                                        <ul class="highlight-list">
                                            @if (isset($value->lodging))
                                            <li>
                                                <i class="fa fa-bath"></i>
                                                </svg>
                                                <span>{!! $value->lodging !!}</span>
                                            </li>
                                            @endif

                                            @if (isset($value->fooding))
                                            <li>
                                                <i class="fa fa-spoon"></i>
                                                <span>{!! $value->fooding !!}</span>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                    @endif

                                </li>
                            @endforeach
                                {{-- <li class="itinerary-item">
                                    <span class="day-count">
                                        <span class="day-text">day</span>
                                        <span class="day-num">2</span>
                                    </span>
                                    <h2>Trek from Phakding ( 2,650 m/ 8,562 ft ) to Namche Bazaar (3,440m/11,285 ft)</h2>

                                    <table class="itinerary-item__table">
                                        <tbody class="itinerary-item__table-body">
                                            <tr>
                                                <th>
                                                    <span class="icon">
                                                    <svg class="search-icon">
                                                        <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-travel-walk"></use>
                                                    </svg>
                                                    </span>
                                                    Trek Distance
                                                </th>
                                                <td> 7.4km/4.6miles </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <span class="icon">
                                                        <i class="fa fa-area-chart"></i>
                                                    </span>
                                                    Highest Altitude
                                                </th>
                                                <td> 3,440m/9,350 ft. </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <span class="icon">
                                                        <svg class="search-icon">
                                                            <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-stop-watch"></use>
                                                        </svg>
                                                    </span>
                                                    Trek Duration
                                                </th>
                                                <td> 6 hours </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>We'll continue along the northern bank of the <strong>Dudh Koshi River</strong> with the majestic view around. We will be crossing many suspension bridges over the Dudh Koshi River, including the Hillary Suspension Bridge. Again, following the trail, we will arrive at the <strong>Sagarmatha National Park</strong> Check Post where we will have our permits registered. we'll again climb through dense forests which is a bit challenging for trekkers. We will also see the first sight of <strong>Mt. Everest</strong> there. Trekking further, we will finally arrive at Namche Bazaar; the gateway to Everest crossing the woods and stones over the slopes. In this way, our <strong>2nd day towards Might Everest</strong>&nbsp;will be Successful.</p>
                                    <div class="highlight-card">
                                        <ul class="highlight-list">
                                            <li>
                                                <i class="fa fa-bath"></i>
                                                </svg>
                                                <span>Overnight at "Sakura Gues House" room with attached bathroom.</span>
                                            </li>
                                            <li>
                                                <svg class="icon-small">
                                                    <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-spoon-knife"></use>
                                                </svg>
                                                <span>Included standard meals ( Breakfast + Lunch + Dinner )</span>
                                            </li>
                                        </ul>
                                    </div>
                                </li> --}}
                            </ol>
                        </div>
                        @endif
                        <!-- END Trip Detail Card #itinerary -->


                        <!-- TRIP DETAIL INCLUDES -->
                        @if (isset($helitourPackage->includes_title) || isset($helitourPackage->includes_description))
                        <div class="trip-detail__card" id="includes-excludes">
                            <div class="sub-title">
                                <i class="fa fa-check-circle"></i>
                                <h2>{{ $helitourPackage->includes_title }}</h2>
                            </div>
                            <ul class="list list--check-bullet marb-30">
                                {!! $helitourPackage->includes_description !!}
                                {{-- <li>Six nights at Lukla, Phakding and Namche room with private attached bathroom, Seven nights in standard room at Tengboche (2 N), Dingboche (2 N), Loboche, Gorakshep, and Pheriche (twin sharing room) - 13 Nights</li>
                                <li>All Standard Meals (13 Lunches, 14 Dinners and 14 Breakfasts) during the trek.</li> <li>Government License holder English Speaking Discovery World Trekking experienced and qualified trek leader,(12 or above trekkers: 1 assistant guide) and porter to help trekkers luggage. (2 trekkers:1 porter "9 kg per trekker max limit")</li> <li>Coverage of Guides and Porters, Their meals, insurance, salary, lodging, transportation, flight and other necessary equipment.</li> <li>Water purification tablets for safe drinking water</li> <li>Sagarmatha National Park entry permit fee</li> <li>Khumbu Pashang Lhamu Rural Municipality fees.</li> <li>Snacks (cookies) and Seasonal fresh fruits every day</li> <li>All government, Local taxes and official Expenses</li> <li>Assistance in arranging rescue operation in case of complicated health condition (funded by travel insurance)</li> <li>Souvenir - A company's T-shirt &amp; Cap</li> <li>Discovery World Trekking’s appreciation of certificate after the successful trek</li> <li>Farewell Dinner at the end of the trek</li>  --}}

                            </ul>
                        </div>
                        @endif

                        <!-- END TRIP DETAIL INCLUDES  -->

                        <!-- TRIP DETAIL EXCLUDES -->
                        @if (isset($helitourPackage->excludes_title) || isset($helitourPackage->excludes_description))
                        <div class="trip-detail__card">
                            <div class="sub-title">
                                <i class="fa fa-times-circle"></i>
                                <h2>{{ $helitourPackage->excludes_title }}</h2>
                            </div>
                            <ul class="list list--cross-bullet marb-30">
                                {!! $helitourPackage->excludes_description !!}
                                {{-- <li>Nepal Entry Visa Fees for multiple Entries on arrival at Tribhuwan Internationa Airport- (15 days - $25-30, 30 days- $40-50 and 90 days- $100-110)</li>
                                <li>Excess baggage charges (Limit is 9kg per Person)</li> <li>All Accommodation and meals in Kathmandu, before and after we start our journey</li> <li>Extra night accommodation in Kathmandu due to early arrival or late departure, early return from the trek.</li> <li>Personal expense (shopping, snacks, boil bottle water, hot and cold drinks, hot shower, Alcohol, Wi-Fi, telephone call, battery re-charge fee), extra porters etc</li> <li>Personal clothing and gear</li> <li>Travel insurance which has to cover emergency high-altitude rescue and evacuation compulsory</li> <li>Tips for guide and porters (Recommended by the Culture)</li> <li>Additional costs or delays caused by out of management control, for example, landslide, weather condition, itinerary modification due to safety concerns, illness, change of government policies, strikes etc.</li> <li>All the costs and expenses which are not listed in "cost includes" will be counted as Excludes</li> </ul> --}}
                        </div>
                        @endif

                        <!-- END TRIP DETAIL EXCLUDES -->

                        <!-- TRIP DETAIL #MAP -->
                        @if (isset($helitourPackage->map_title) || isset($helitourPackage->map_image))
                        <div class="trip-detail__card" id="map">
                            <div class="sub-title">
                                <i class="fa fa-map-o"></i>
                                <h2>{{ $helitourPackage->map_title }} </h2>
                            </div>

                            <div class="route-map">
                                <img class="lozad" alt="everest base camp trek map" src="{{asset('/images/listing/'. $helitourPackage->map_image)}}" data-loaded="true" class="img-fluid w-100">
                            </div>
                        </div>
                        @endif

                        <!-- END TRIP DETAIL #MAP -->

                        <!-- TRIP DETAILS #TRIPINFO-->
                        @if (isset($helitourPackage->trip_info_title) || isset($helitourPackage->trip_info_description) || isset($helitourPackage->trip_info_special_notes))
                        <div class="trip-detail__card" id="tripinfo">
                            @if (isset($helitourPackage->trip_info_title))
                            <div class="sub-title">
                                <i class="fa fa-info-circle"></i>
                                <h2>{{$helitourPackage->trip_info_title}}</h2>
                            </div>
                            @endif
                            <div>
                                <div class="note-list">
                                    @if (isset($helitourPackage->trip_info_description))
                                    <div class="note-item">
                                        <p>{!! $helitourPackage->trip_info_description !!}</p>
                                    </div>
                                    @endif
                                    @if (isset($helitourPackage->trip_info_special_notes))
                                    <div class="highlight-card">
                                        <p>{!! $helitourPackage->trip_info_special_notes !!}</p>
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- END TRIP DETAILS #TRIPINFO-->

                        <!-- TRIP DETAILS #EQUIPMENTS -->
                        @if (isset($helitourPackage->helitourpackageequipment[0]))
                        <div class="trip-detail__card trip-detail__card--equipment" id="equipments">
                            @foreach(@$helitourPackage->helitourpackageequipment as $key => $data)
                            <div class="sub-title">
                                <i class="fa fa-suitcase"></i>
                                <h2>{{$data->title}}</h2>
                            </div>
                            <p>{{$data->description}}</p>
                            @if (isset($data->head))
                            <div class="list-group">
                                <h3 class="list-group__title">Head</h3>
                                <ul class="list list--hand-bullet">
                                    <li>{!! $data->head !!}</li>
                                </ul>
                            </div>
                            @endif

                            @if (isset($data->face))
                            <div class="list-group">
                                <h3 class="list-group__title">Face</h3>
                                <ul class="list list--hand-bullet">
                                    <li>{!! $data->face !!}</li>
                                </ul>
                            </div>
                            @endif

                            @if (isset($data->body))
                            <div class="list-group">
                                <h3 class="list-group__title"> Body </h3>
                                <ul class="list list--hand-bullet">
                                    <li>{!! $data->body !!}</li>
                                </ul>
                            </div>
                            @endif

                            @endforeach
                        </div>
                        @endif
                        <!-- END TRIP DETAILS #EQUIPMENTS -->

                        <!-- TRIP DETAILS #COST-DATES -->
                        @if (isset($helitourPackage->helitourcostanddate[0]))
                        <div class="border-0 trip-detail__card trip-detail__departure-card" id="cost-dates">
                            <div class="sub-title">
                                <i class="fa fa-calendar"></i>
                                <h2>Join Upcoming Trips</h2>
                            </div>
                            <div class="departure-block__header">
                                <div class="departure-block__description">
                                    <p>Inquire Now to get the best deals or share with friends to plan together. All trips are group based. For custom trips, <a href="https://www.discoveryworldtrekking.com/contact-us">contact us</a>. </p>
                                </div>
                                <div class="departure-block__filter">
                                    <!-- <div class="custom-select"> -->
                                        <!-- <select class="select-month-year select2-hidden-accessible" id="upcoming-trip-select" data-trip-id="6" name="month-year" data-select2-id="upcoming-trip-select" tabindex="-1" aria-hidden="true">
                                            <option value="" selected="selected" data-select2-id="2">Select Month, Year</option><option value="2021-10" data-select2-id="5">October, 2021</option><option value="2021-11" data-select2-id="6">November, 2021</option><option value="2021-12" data-select2-id="7">December, 2021</option><option value="2022-01" data-select2-id="8">January, 2022</option><option value="2022-02" data-select2-id="9">February, 2022</option><option value="2022-03" data-select2-id="10">March, 2022</option><option value="2022-04" data-select2-id="11">April, 2022</option><option value="2022-05" data-select2-id="12">May, 2022</option><option value="2022-06" data-select2-id="13">June, 2022</option><option value="2022-07" data-select2-id="14">July, 2022</option><option value="2022-08" data-select2-id="15">August, 2022</option><option value="2022-09" data-select2-id="16">September, 2022</option><option value="2022-10" data-select2-id="17">October, 2022</option><option value="2022-11" data-select2-id="18">November, 2022</option><option value="2022-12" data-select2-id="19">December, 2022</option><option value="2023-01" data-select2-id="20">January, 2023</option><option value="2023-02" data-select2-id="21">February, 2023</option><option value="2023-03" data-select2-id="22">March, 2023</option><option value="2023-04" data-select2-id="23">April, 2023</option><option value="2023-05" data-select2-id="24">May, 2023</option><option value="2023-06" data-select2-id="25">June, 2023</option><option value="2023-07" data-select2-id="26">July, 2023</option><option value="2023-08" data-select2-id="27">August, 2023</option><option value="2023-09" data-select2-id="28">September, 2023</option><option value="2023-10" data-select2-id="29">October, 2023</option><option value="2023-11" data-select2-id="30">November, 2023</option><option value="2023-12" data-select2-id="31">December, 2023</option><option value="2024-01" data-select2-id="32">January, 2024</option><option value="2024-02" data-select2-id="33">February, 2024</option><option value="2024-03" data-select2-id="34">March, 2024</option><option value="2024-04" data-select2-id="35">April, 2024</option><option value="2024-05" data-select2-id="36">May, 2024</option><option value="2024-06" data-select2-id="37">June, 2024</option><option value="2024-07" data-select2-id="38">July, 2024</option><option value="2024-08" data-select2-id="39">August, 2024</option><option value="2024-09" data-select2-id="40">September, 2024</option>
                                        </select> -->
                                    <!-- </div> -->
                                </div>
                            </div>

                            <table id="booking-dates" class="table table-hover" style="display: table; position: relative; ">
                                <thead class="thead">
                                    <tr>
                                        <th scope="col">Departure Date</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Trip Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="departure-list">
                                    @foreach(@$helitourPackage->helitourcostanddate()->where('published',1)->get() as $key => $data)
                                    @php
                                    $save = $data->cad_price - $data->cad_discount_price;
                                    @endphp
                                        <tr class="departure-list__item">
                                            <td class="departure-list__date">
                                                <strong>{{$data->cad_day}}</strong>{{$data->cad_date_from}} - {{$data->cad_date_to}}
                                            </td>
                                            <td class="departure-list__price">
                                                <del>Rs. {{$data->cad_price}}</del> Rs. {{$data->cad_discount_price}}
                                                <span class="discount-save__badge">save Rs. {{ $save }}</span>
                                            </td>
                                            <td class="departure-list__trip-status brown-text">{{$data->cad_trip_status}}</td>
                                            <td class="departure-list__btn">
                                                <a class="btn btn--border btn--small" href="{{route('bookPackage', $data->id)}}">Enquire Now</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                        <!-- END TRIP DETAILS #COST-DATES -->

                        <!-- TRIP DETAILS  -->
                        <div class="border-0 trip-detail__card">
                            <div class="sub-title">
                                <i class="fa fa-user"></i>
                                <h2>Guided {{$helitourPackage->package_name}}</h2>
                            </div>
                            <div class="tag-items">
                                <div class="tag-items__item">
                                    <span class="tag-items__icon">
                                        <i class="fa fa-users"></i>
                                    </span>
                                    Team of highly experienced Experts
                                </div>
                                <div class="tag-items__item">
                                    <span class="tag-items__icon">
                                        <i class="fa fa-credit-card-alt"></i>
                                    </span>
                                    No Booking Or Credit Card Fee
                                </div>
                                <div class="tag-items__item">
                                    <span class="tag-items__icon">
                                        <i class="fa fa-bookmark"></i>
                                    </span>
                                    Hasle-Free Booking
                                </div>
                                <div class="tag-items__item">
                                    <span class="tag-items__icon">
                                        <i class="fa fa-certificate"></i>
                                    </span>
                                    Your Hapiness Guaranteed
                                </div>
                                <div class="tag-items__item">
                                    <span class="tag-items__icon">
                                        <i class="fa fa-money"></i>
                                    </span>
                                    Hasle-Free Booking
                                </div>
                            </div>
                        </div>
                        <!-- END TRIP DETAILS -->

                        <!-- DISCOUNTED PRICE -->
                        @if (isset($helitourPackage->helitourpackagegdp[0]))
                        <div class="border-none trip-detail__card">
                            <div class="sub-title">
                                <i class="fa fa-money"></i>
                                <h2>Group Discount Prices</h2>
                            </div>
                            <table class="discount-card discount-card--transparent">
                                <thead class="discount-card__header">
                                    <tr>
                                        <th class="discount-card__header-title">No. of Persons</th>
                                        <th class="discount-card__header-title">Price per Person</th>
                                    </tr>
                                </thead>
                                <tbody class="discount-card__list">
                                    @foreach(@$helitourPackage->helitourpackagegdp as $key => $data)
                                        <tr>
                                            <td class="person">{{$data->no_of_persons}}</td>
                                            <td class="discount-price">{{$data->price_per_person}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                        <!-- END DISCOUNTED PRICE -->

                        <!-- TRAVELER'S REVIEW -->

                        <!-- END TRAVELER'S REVIEW -->

                        <!-- EVEREST TRAVELER'S REVIEW -->
                        {{-- <div class="border-0 trip-detail__card" id="review"> --}}
                            {{-- <div class="sub-title">
                                <i class="fa fa-commenting-o"></i>
                                <h2>Everest Base camp Trek Company Reviews</h2>
                            </div> --}}

                            <!-- TRIP ADVISOR REVIEW -->
                            {{-- <div class="review-card review-card--trip-adviser">
                                <div id="TA_selfserveprop906" class="TA_selfserveprop">
                                    <ul id="RRHWlJZQ9" class="TA_links ihLTT9DkzLu"> <li id="CeXZsPUe3" class="44wrhw2ymb">
                                        <a target="_blank" href="https://www.tripadvisor.com/" rel="noreferrer">
                                        <img src="https://www.tripadvisor.com/img/cdsi/img2/branding/150_logo-11900-2.png" alt="Trip Advisor"></a> </li>
                                    </ul>
                                </div>
                                <a href="#" class="btn btn--small" target="_blank" rel="noopener noreferrer">Write a Review on Tripadvisor
                                    <i class="fa fa-chevron-right"></i>
                                </a>
                            </div> --}}
                            <!-- END TRIP ADVISOR REVIEW -->

                            <!-- GOOGLE REVIEW -->
                            {{-- <div class="review-card review-card--google trip-review-card--google">
                                <div class="review-card__content">
                                <div class="google-reviews">
                                    <div class="google-review-title">
                                        <i class="fa fa-google"></i>
                                        <h3>Discovery World Trekking</h3> <!-- Review count will be inserted here by JS --> <div class="google-review-title__footer"> <div class="google-review-total-rating">5</div> <div class="google-reviews-stars-wrapper"> <span class="star-rating star-rating--brand"> <!-- Review start width will be replace by JS --> <span class="star-rating__gold google-review-stars" style="width: 100%;"></span> </span> </div> <div class="google-review-count__wrap"> <span class="google-review-count">190</span> reviews form Google </div> </div> </div> <!-- Reviews will be inserted her by JS --> <div class="google-reviews-items"><div class="google-review-item">
                                <div class="review-date">2021-04-30</div>
                                <div class="review-stars">
                                    <span class="star-rating star-rating--brand">
                                        <span class="star-rating__gold" style="width:100%"></span>
                                    </span>
                                </div>
                                <div class="review-text">
                                    ."Discovery World Trekking" is a very professional company.
                                    .They treat you as family.
                                    . You are always their number one priority.
                                    . They are very understanding.
                                    . Friendly
                                    . Helpful
                                    . Optimistic
                                    . Down to earth
                                    . Respectful

                                    I would also like to mention something very sweet. I got sick on the mountain and Mr.Paul stayed in contact with me, gave me advice, supported me. He made sure that I would wake up the second day feeling better than the day before.

                                    I would also like to thank the lovely guide "Milan" and to a very strong guide assistant "Havy".
                                </div>
                                <div class="review-author">
                                    <div class="review-author-avatar">
                                        <img src="https://lh3.googleusercontent.com/a-/AOh14Gj38Ois8fs5qpJW06hYDjIA9HNTouu2lYxABt4RpA=s128-c0x00000000-cc-rp-mo" alt="Maryam Kairouz">
                                    </div>
                                    <div class="review-author-name">
                                        Maryam Kairouz
                                    </div>
                                </div>
                            </div>
                            <div class="google-review-item">
                                <div class="review-date">2021-04-02</div>
                                <div class="review-stars">
                                    <span class="star-rating star-rating--brand">
                                        <span class="star-rating__gold" style="width:100%"></span>
                                    </span>
                                </div>
                                <div class="review-text">
                                    This is the Best Trekking Company you'll ever find. Right from the Landing in Kathmandu to farewell, they treat you as the part of the family. I travelled during Covid times and they offered the best facilities one could. All the Hotels, food provided were top class. I was unable to carry my bag and my guide didn't even hesitated and carried my belongings all the way till the pass. Don't hesitate just go with them. Highly recommended.
                                </div>
                                <div class="review-author">
                                    <div class="review-author-avatar">
                                        <img src="https://lh3.googleusercontent.com/a-/AOh14Gin0xuDClQH5yryNQxtjKcbf7e3VdmwdIK33CKkjQ=s128-c0x00000000-cc-rp-mo" alt="TheLaughPlanet">
                                    </div>
                                    <div class="review-author-name">
                                        TheLaughPlanet
                                    </div>
                                </div>
                            </div>
                            <div class="google-review-item">
                                <div class="review-date">2021-09-05</div>
                                <div class="review-stars">
                                    <span class="star-rating star-rating--brand">
                                        <span class="star-rating__gold" style="width:100%"></span>
                                    </span>
                                </div>
                                <div class="review-text">
                                    Team of Highly Experienced, the best service and feel family.
                                </div>
                                <div class="review-author">
                                    <div class="review-author-avatar">
                                        <img src="https://lh3.googleusercontent.com/a/AATXAJxvfhK5g7gjzd-fYFeGs-JMiPCC20x7GZGdlrC_=s128-c0x00000000-cc-rp-mo" alt="hiring dwt">
                                    </div>
                                    <div class="review-author-name">
                                        hiring dwt
                                    </div>
                                </div>
                            </div>
                            <div class="google-review-item">
                                <div class="review-date">2021-04-12</div>
                                <div class="review-stars">
                                    <span class="star-rating star-rating--brand">
                                        <span class="star-rating__gold" style="width:100%"></span>
                                    </span>
                                </div>
                                <div class="review-text">
                                    The First trek to Annapurna Base Camp in Nepal and what a life-changing experience with Discovery World Trekking. Paul and our trek leader Dol,Jit were so friendly, caring and helping  and made us feel very comfortable.Mountain views are amazing and beautiful culture.We are looking forward to coming back to do Everest Base camp with this professional company :) SERIOUSLY RECOMMEND! You will not be disappointed!
                                </div>
                                <div class="review-author">
                                    <div class="review-author-avatar">
                                        <img src="https://lh3.googleusercontent.com/a/AATXAJxrEG-mEM0o7IKpsd-HUkj7Bw3gphHReTyEu5Rq=s128-c0x00000000-cc-rp-mo" alt="mustafa murat ozcelik">
                                    </div>
                                    <div class="review-author-name">
                                        mustafa murat ozcelik
                                    </div>
                                </div>
                            </div><div class="google-review-item">
                                <div class="review-date">2021-04-03</div>
                                <div class="review-stars">
                                    <span class="star-rating star-rating--brand">
                                        <span class="star-rating__gold" style="width:100%"></span>
                                    </span>
                                </div>
                                <div class="review-text">
                                    Probably the best trekking agency in Nepal. I was solo and had an amazing time in Annapurna Circuit in this COVID times. All the facilities provided was top notch. My guide Mr. Manish was very Helpful and was very knowledgeable about the Mountains. Highly recommended
                                </div>
                                <div class="review-author">
                                    <div class="review-author-avatar">
                                        <img src="https://lh3.googleusercontent.com/a/AATXAJza1DsvJT3rT6Tf5aj26uXrPtCt1wk_IfivPd_D=s128-c0x00000000-cc-rp-mo" alt="Ashish Jha">
                                    </div>
                                    <div class="review-author-name">
                                        Ashish Jha
                                    </div>
                                </div>
                            </div></div> </div> </div> <div class="review-card__footer"> <a href="https://search.google.com/local/writereview?placeid=ChIJZV6Bzf0Y6zkRB4mxi-9XC-c" class="btn btn--small" target="_blank">
                            <i class="fa fa-edit"></i>
                            Write a Review on Google </a> </div> </div> --}}
                            <!-- END GOOGLE REVIEW -->


                            <!-- MORE REVIEW -->
                            {{-- <div class="review-list" id="reviews-list">
                                <div class="review-item">
                                    <h3 class="review-item__title">Trek of a lifetime with Discovery!</h3>
                                    <div class="author-info">
                                        <div class="author-info__image" style="background-image: url('https://www.discoveryworldtrekking.com/media/1351/conversions/Daniel-tiny.jpg')"></div>

                                        <div class="author-info__wrap">
                                            <span class="author-info__name">Daniel</span>
                                            <div class="trip-card__review">
                                                <span class="star-rating">
                                                    <span class="star-rating__gold" style="width:100%"></span>
                                                </span> 5 - Excellent
                                            </div>
                                            <span class="review-date">11/15/2018</span>
                                            </div>
                                        </div>
                                        <p>We had an amazing experience climbing to Everest Basecamp with Discovery. Our guide, Simbir, helped us each step of the way. We couldn’t have done it without him. Our porter Gagat was amazing as well. He even accompanied us to Basecamp to make sure we made it! It will be 11 days that we will never forget and it was all thanks to Discovery.</p>
                                    </div>
                            </div> --}}
                            <!-- END MORE REVIEW -->
                        {{-- </div> --}}
                        <!-- EVEREST END TRAVELER'S REVIEW -->

                        <!-- TRIP DETAIL #DOWNLOAD -->
                        @if (isset($helitourPackage->package_pdf) || isset($helitourPackage->map_image))
                        <div class="border-0 trip-detail__card">
                            <div class="sub-title">
                                <i class="fa fa-file"></i>
                                <h2>Trip Downloads</h2>
                            </div>
                            <div class="trip-detail__info-btn">
                                @if (isset($helitourPackage->package_pdf))
                                <a href="{{asset('/files/'. $helitourPackage->package_pdf)}}" target="_blank">
                                    <i class="fa fa-file"></i>
                                    Download the Trip PDF
                                </a>
                                @endif
                                @if (isset($helitourPackage->map_image))
                                <a href="{{asset('/images/listing/'. $helitourPackage->map_image)}}" target="_blank" download>
                                    <i class="fa fa-map"></i>
                                    Download Map
                                </a>
                                @endif
                            </div>
                        </div>
                        @endif
                        <!-- END TRIP DETAIL #DOWNLOAD -->

                        <!-- TRIP DETAIL SHARE -->
                        <div class="trip-detail__share">
                            <div class="social-share">
                                <span class="social-share__title">Share with your Friends</span>
                                <ul class="share-list">
                                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                    <div class="addthis_inline_share_toolbox_fn5a"></div>
                                    {{-- <li class="share-list__item">
                                        <div class="circle">
                                            <a href="#" target="_blank">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="share-list__item">
                                        <div class="circle">
                                            <a href="#" target="_blank">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="share-list__item">
                                        <div class="circle">
                                            <a href="#" target="_blank">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="share-list__item">
                                        <div class="circle">
                                            <a href="#" target="_blank">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        </div>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        <!-- END TRIP DETAIL SHARE -->

                        <!-- END TRIP DETAILS -->
                    </div>

                    <!-- SIDER BAR STICKY -->
                    @if (isset($helitourPackage->days_and_nights) || isset($helitourPackage->price) || isset($helitourPackage->discount_price))
                        <div class="col-lg-4 col-sm-12 stickthis" id="sidebar-sticky">
                            <div class="mx-auto sidebar sidebar-block">
                                    <div class="sidebar-block__card sidebar-block__card--pattern">
                                        <div class="trip-card__badge--wrap">
                                            <div class="trip-card__badge trip-card__badge--group">
                                                <i class="fa fa-users"></i>
                                                <span> Group</span>
                                            </div>
                                        </div>
                                        <div class="sidebar-block__card-item package-price package-price--large">
                                            <span class="package-price__trip-days">{{$helitourPackage->days_and_nights}} </span>
                                            <span class="package-price__regular-price">from
                                                <span class="large-del">US$ {{$helitourPackage->price}}</span></span>
                                            <br>
                                            <span class="package-price__sale-price">
                                                US$
                                                <strong>{{$helitourPackage->discount_price}}</strong><sup>pp</sup>
                                            </span>
                                        </div>
                                        {{-- @php
                                        $save = $helitourPackage->price - $helitourPackage->discount_price;
                                        @endphp
                                        <div class="sidebar-block__discount-badge">
                                            <span class="sidebar-block__discount-save">Save {{ $save }} Per Pax</span>
                                        </div> --}}

                                        <div class="sidebar-block__card-item discount-card discount-card--toggle discount-card--small">
                                            <h2 class="accordion__action-btn">We Offer Group Discount</h2> <div class="discount-card__accordion" style="display: none;">
                                                <table class="discount-card__table">
                                                    <thead class="discount-card__header">
                                                        <tr> <th class="discount-card__header-title">No. of Persons</th> <th class="discount-card__header-title">Price per Person</th> </tr>
                                                    </thead>
                                                    <tbody class="sidebar-block__card-item discount-card__list">
                                                        <tr> <td class="person">1 Pax</td> <td class="discount-price">US$ 1470</td> </tr> <tr> <td class="person">2 Paxes</td> <td class="discount-price">US$ 1190</td> </tr> <tr> <td class="person">3 Paxes</td> <td class="discount-price">US$ 1175</td> </tr> <tr> <td class="person">4 - 6Paxes </td> <td class="discount-price">US$ 1140</td> </tr> <tr> <td class="person">7 - 12Paxes </td> <td class="discount-price">US$ 1100</td> </tr> <tr> <td class="person">13 - 18Paxes </td> <td class="discount-price">US$ 1075</td> </tr> <tr> <td class="person">19 - 24Paxes </td> <td class="discount-price">US$ 1050</td> </tr> <tr> <td class="person">25 - 30Paxes </td> <td class="discount-price">US$ 1030</td> </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="sidebar-block__card-item sidebar-block__card-item--border">
                                            {{-- <div class="trip-card__review trip-card__review--badge">
                                                <span class="star-rating star-rating--brand">
                                                    <span class="star-rating__gold" style="width:100%"></span>
                                                </span>
                                                <span class="review-badge">5 - Excellent</span>
                                                <span class="review-number">based on 45 reviews</span>
                                            </div> --}}
                                            <a href="#cost-dates" class="btn btn--fullwidth btn--large btn--primary-hover btn--brand cost-dates--btn">
                                                Dates &amp; Prices
                                            </a>
                                            <a href="{{route('helitourPackageInquire', $helitourPackage->slug)}}" target="_blank" data-bypass-react="true" class="btn btn--border btn--fullwidth btn--small">
                                                Ask Questions
                                            </a>
                                        </div>

                                    </div>

                                </div>



                                <div class="col-lg-4 col-sm-12 stickthis" id="sidebar-sticky">
                                    <div class="mx-auto sidebar sidebar-block">
                                        <div class="sidebar-block__card sidebar-block__card--pattern">
                                            <div class="trip-card__badge--wrap">
                                                <div class="trip-card__badge trip-card__badge--group">
                                                    <i class="fa fa-hand-o-down"></i>
                                                    <span> Other Packages</span>
                                                </div>
                                            </div>
                                            <div class="sidebar-block__card-item package-price package-price--large">
                                                @foreach($otherPackage as $package)
                                                <a href="{{route('helitourPackageDetails', $package->slug)}}" target="_blank">
                                                {{--<img style="height:50px; width:50" src="{{asset('images/listing/'.$package->image)}}" alt="" class="card-img img-fluid"> --}}

                                                    {{-- <span class="package-price__trip-days">Image</span> --}}
                                                    <span class="package-price__regular-price">{{$package->package_name}}</span>
                                                </a>
                                                @endforeach
                                                <br>
                                            </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    @endif
                    <!-- END OF SIDER BAR STICKY -->
                </div>
            </div>
        </section>

        <!-- FAQ BLOCK -->
        @if (isset($helitourPackage->helitourpackagefaq[0]))
        <div class="faq-block">
            <div class="container">
                <h2 class="faq-block__title curve-line">
                    FAQ's
                </h2>

                <div class="accordion-list">
                    @foreach(@$helitourPackage->helitourpackagefaq as $key => $data)
                        <div class="accordion-list__item">
                            <div class="accordion-list__header" onclick="return toggleMe('faq{{ $data->id }}');">
                                <h3 class="accordion-list__item-title"> {{$data->questions}} </h3>
                                <span class="accordion-control"></span>
                            </div>
                            <div class="accordion-list__item-content" style="display: none;" id="faq{{ $data->id }}">
                                <p>
                                    {!! $data->answers !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="accordion-list__item">
                        <div class="accordion-list__header" onclick="return toggleMe('faq2');">
                            <h3 class="accordion-list__item-title"> What is the luggage limit for porter and flight to Lukla? </h3>
                            <span class="accordion-control"></span>
                        </div>
                        <div class="accordion-list__item-content" style="display: none;" id="faq2">
                            <p>
                                Discovery World Trekking will provide one porter for two trekkers to carry 18 kgs of luggage (maximum 9 kg for each trekker). Please be sure your porters are not overloaded because they do not carry only your equipment but also lift your spirit to reach new heights, and your love, affection, and generosity can be the reason for them to work hard to take you to your destination. However, the weight limit on flights to the Everest region, basically to Lukla is a total of 10 kgs and you need to pay an extra amount per kg for the excess baggage. Discovery World Trekking pays up to 5 kgs of extra baggage making your total 15 kgs.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-list__item">
                        <div class="accordion-list__header" onclick="return toggleMe('faq3');">
                            <h3 class="accordion-list__item-title" > What is the weather condition at Everest Base Camp? </h3>
                            <span class="accordion-control"></span>
                        </div>
                        <div class="accordion-list__item-content" style="display: none;" id="faq3">
                            <p>
                                Weather on the trail to Everest Base Camp is always changing and impossible to predict. Here is a list of probable temperature and weather conditions in each month.
                            </p>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
        @endif
        <!-- END FAQ BLOCK -->

        <!-- SPILT BLOCK -->
        {{-- <div class="spilt-block">
            <div class="spilt-block__community">
                <div class="spilt-block__item">
                    <p>Your Small Contribution Helps in the Development of Rural Communities</p>
                    <img src="https://www.discoveryworldtrekking.com/media/841/community-01.png" alt="Community">
                    <a href="#" class="btn btn--white btn--dark-hover btn--small">
                        Learn about our CSR
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
            </div>
            <div class="spilt-block__speciality">
                <div class="spilt-block__item">
                    <h4>What Sets Us Apart??</h4>
                    <ul class="list list--plane-bullet">
                        <li>Winner, Tripadvisor Excellence Award</li>
                        <li>Attractive &amp; Alternative Packages</li>
                        <li>Healthy, Safe and Hassle Free Travel</li>
                        <li>Your Happiness Is Guaranteed</li>
                        <li>Best affordable price guarantees</li>
                        <li>Flexible itinerary of the trek that suits you!</li>
                    </ul>
                    <a href="#" class="btn btn--white btn--dark-hover btn--small"> Learn About Why DWT? <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>         --}}
        <!-- END SPILT BLOCK -->

        <!-- TRIP SECTION -->
        <section class="trip-section">
            <div class="trip-section__header trip-section__header--center">
                <h2 class="trip-section__title trip-section__title--small curve-line">Related Trips </h2>
            </div>

            <div class="container">
                <div class="row">
                    @foreach($similarHelitourPackage as $package)
                        <div class="mx-auto mb-5 col-md-6 col-12">
                            <div class="border-0 card adventure__card">
                                <div class="adventure__card--image">
                                    <a href="{{route('helitourPackageDetails', $package->slug)}}">
                                        <img src="{{asset('images/listing/'.$package->image)}}" alt="" class="card-img img-fluid">
                                    </a>
                                    <div class="adventure__card--type">
                                        <span> <i class="fa fa-users"></i> Group</span>
                                    </div>
                                    {{-- <div class="adventure__card--rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        of 45 reviews
                                    </div> --}}
                                    <div class="adventure__card--price">
                                        from <span class="amount">{{$package->price}}</span>
                                        <span class="price">{{$package->discount_price}}</span>
                                    </div>

                                    <div class="adventure__card--overlay">
                                        <a href="{{route('packageDetails', $package->slug)}}" class="adventure__card--btn">Book Your Trip Now</a>

                                        <a href="{{route('packageDetails', $package->slug)}}" class="btn">or Learn More</a>
                                    </div>
                                    <div class="featured-gradient"></div>
                                </div>
                                <div class="card-body">
                                    <h3 class="adventure__card--title">
                                        <a href="{{route('packageDetails', $package->slug)}}">{{$package->package_name}} - {{$package->days_and_nights}}</a>
                                        </h3>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="media">
                                                <svg class="adventure__card--icon">
                                                    <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-speedometer"></use>
                                                </svg>
                                                <div class="media-body">
                                                    <h4>Grade</h4>
                                                    <span>{{$package->grade}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="media">
                                                <svg class="adventure__card--icon">
                                                    <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-calendar"></use>
                                                </svg>
                                                <div class="media-body">
                                                    <h4>Duration</h4>
                                                    <span>{{$package->days_and_nights}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="media">
                                                <svg class="adventure__card--icon">
                                                    <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-travel-walk"></use>
                                                </svg>
                                                <div class="media-body">
                                                    <h4>Activity</h4>
                                                    <span>{{$package->activity->name}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>
        <!-- END TRIP SECTION -->

        <section class="feature-block feature-block--gray-bg" id="feature-block">
            <div class="container">
                <div class="feature-block__slider--wrap">
                    <h2 class="feature-block__slider-title">Our History in Service Excellence</h2>
                </div>
                <!-- OWL CAROUSEL -->
                <div class="feature-block__carousel">
                    <div class="owl-carousel owl-theme feature-block__carousel--theme">

                        <!-- single item -->
                        @foreach ($dashboard_historys as $history)
                            <div class="item">
                                <div class="card feature-block__card">
                                    <img src="{{asset('images/main/'. $history->image)}}" alt="" class="img-fluid card-img">
                                </div>
                            </div>
                        @endforeach

                        <!-- single item -->
                        <!-- single item -->
                        {{-- <div class="item">
                            <div class="card feature-block__card">
                                <img src="{{asset('assets/front/images/feature-block2.gif')}}" alt="" class="img-fluid card-img">
                            </div>
                        </div> --}}
                        <!-- single item -->
                    </div>
                </div>
                <!-- END OF OWL CAROUSEL -->

            </div>
        </section>

        <section class="associated-block">
            <div class="container">
                <h2 class="associated-block__title">WE ARE ASSOCIATED WITH:</h2>
                <div class="associated-list">
                    @foreach ($dashboard_associates as $associate)
                        <span class="associated-list__item">
                            <img class="lozad" data-src="{{asset('images/main/'. $associate->image)}}" alt="Nepal digital pictography" src="{{asset('images/main/'. $associate->image)}}" data-loaded="true">
                        </span>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- HERITAGE BLOCK -->
        {{-- <div class="heritage-block">
            <img class="heritage-block__thumbnail lozad" data-src="https://www.discoveryworldtrekking.com/frontend/assets/images/heritage-illustration.png" alt="Heritage Sketch" src="https://www.discoveryworldtrekking.com/frontend/assets/images/heritage-illustration.png" data-loaded="true">
        </div> --}}
        <!-- END HERITAGE BLOCK -->

        <!-- TRADEMARK BLOCK -->
        {{-- <div class="trademark-block">
            <div class="trademark-block__wrap">
                <figure class="trademark-block__thumbnail">
                    <img class="lozad" data-src="https://www.discoveryworldtrekking.com/frontend/assets/images/discovery-world-trekking-logo.svg')}}" alt="Discovery World Trekking" src="https://www.discoveryworldtrekking.com/frontend/assets/images/discovery-world-trekking-logo.svg')}}" data-loaded="true">
                </figure>
                <div class="trademark-block__content">
                    <p>
                        Discovery World Trekking is trademark name of Discovery World Trekking Pvt. Ltd. Our Name, Logo, Slogan are trademark registered in Nepal. "The tourism department trekking and travel company license" - Number is 1495.
                    </p>
                </div>
            </div>
        </div> --}}
        <!-- END TRADEMARK BLOCK -->
    </main>

    <!-- ========== End Inner Package ========== -->


    <!-- ============== PACKAGE NAVBAR ==============  -->
    <nav class="navbar navbar-expand-lg navbar-light package-navbar" id="package-navbar">
        <div class="container-fluid">
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#overview">
                            <svg class="package-navbar__icon">
                                <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-search"></use>
                            </svg>
                            Overview
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#photos-videos">
                            <svg class="package-navbar__icon">
                                <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-file-picture"></use>
                            </svg>
                            Photos/Videos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#itinerary">
                            <svg class="package-navbar__icon">
                                <use xlink:href="{{asset('assets/front/images/sprite.svg')}}#icon-list2"></use>
                            </svg>
                            Itinerary
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#includes-excludes">
                            <i class="fa fa-check-circle"></i>
                            Includes/Excludes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#map">
                            <i class="fa fa-map-o"></i>
                            Map
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tripinfo">
                        <i class="fa fa-info-circle"></i>
                        Trip Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#equipments">
                            <i class="fa fa-suitcase"></i>
                            Equipments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cost-dates">
                            <i class="fa fa-calendar"></i>
                            Cost & Dates
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#review">
                            <i class="fa fa-commenting-o"></i>
                            Reviews
                        </a>
                    </li>
                    <li class="nav-item phone-icon">
                        <a href="tel:9803828501">
                            <i class="fa fa-phone"></i>
                        </a>
                    </li>
                    <li class="nav-item cta-item">
                        <a class="btn btn-cta" href="{{route('helitourPackageInquire', $helitourPackage->slug)}}">
                            Book The Trip
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- ============== END PACKAGE NAVBAR ==============  -->


</section>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6141600823f4c8e2"></script>

@endsection

@section('scripts')
<script>
    lightbox.option({
    'disableScrolling': true
})
</script>
@endsection