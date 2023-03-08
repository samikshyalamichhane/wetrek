@extends('front.layouts.app')
<title>{{$destination->country_name}}</title>
<title>test</title>
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
                            <div class="col-sm-12 trip-topic triphead-block p-0">
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
    <section class="destination-inner">
        <!-- features -->
        <!-- single destination feature -->
        <div class="destination-feature">
            @if (isset($mountainTrekPackages[0]))
            <div class="destination-feature-single">
                <div class="container">
                    <div class="destination-title">
                        <h1>All Adventure Magic in {{$destination->country_name}}</h1>
                    </div>

                    <div class="destination-feature-list">
                        <div class="row mt-5">
                            @if (isset($mountainTrekPackages[0]))
                            @foreach ($mountainTrekPackages as $type)
                                @foreach ($type->packages->where('mountain_trek', 1) as $package)
                                <div class="col-md-4 col-sm-6 mx-auto">
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
                            @else
                            <h2>Sorry! No Other Adventure Magic Related to {{$destination->country_name}}.</h2>
                            @endif
                        </div>
                        {{$mountainTrekPackages->links()}}
                    </div>
                </div>
            </div>
            @endif
            <!-- single destination feature end -->
        </div>
    </section>
    <!-- ========== End of destination ========== -->

@endsection
