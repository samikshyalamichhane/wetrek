@extends('front.layouts.app')
@section('content')
{{-- {{asset('assets/front/    ')}} --}}

       <!-- ========== Package Banner ========== -->
       <div class="tourmaster-single-header inner-image" style="background-image: url('{{asset('images/main/'. $travelStyle->image)}}');">
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

                                <h1 class="tourmaster-single-header-title">{{ $travelStyle->title }}</p>
                                </h1>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ========== End of Package Banner ========== -->

    <!-- ========== package-listing ========== -->
    <section class="package-listing te">
        <div class="container">
            <div class="package-listing-summary">
                <p>
                    {!! $travelStyle->description !!}
                </p>
            </div>


            <div class="package-listing-popular">
                <div class="package-listing-title">
                    <h1>{{ $travelStyle->title }} Packages</h1>
                </div>

                <div class="row mt-5">
                    @foreach ($travelStylePackages as $package)
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
                </div>
                {{$travelStylePackages->links()}}

                {{-- <div class="more-packages">
                    <a href="#" class="link-more-package">More Packages</a>
                </div> --}}
            </div>

        </div>
    </section>
    <!-- ========== End of package-listing ========== -->



@endsection
