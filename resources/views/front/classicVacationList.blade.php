@extends('front.layouts.app')
<title>Adventure Magic Nepal | Adventure Magic Packages</title>
@section('content')
{{-- {{asset('assets/front/    ')}} --}}

       <!-- ========== Package Banner ========== -->
       <div class="tourmaster-single-header" style="background-image: url('{{asset('images/main/'. $dashboard_settings->classicVacation_image)}}');">
        <div class="tourmaster-single-header-background-overlay"></div>
        <div class="tourmaster-single-header-overlay"></div>

        <div class="tourmaster-single-header-container tourmaster-container">
            <div class="tourmaster-single-header-container-inner">
                <div class="tourmaster-single-header-title-wrap tourmaster-item-pdlr">
                    <div class="container">
                        <div class="row">
                            <div class="COL-12 trip-topic triphead-block p-0">
                                <div class="tourmaster-single-header-gallery-wrap"></div>

                                <h1 class="tourmaster-single-header-title">Adventure Magic Packages</p>
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
    <section class="package-listing">
        <div class="container">
            <div class="package-listing-summary">
                <p>
                    {!! $dashboard_settings->classicVacation_description !!}
                </p>
            </div>


            <div class="package-listing-popular">
                <div class="package-listing-title">
                    <h1>Adventure Magic Packages</h1>
                </div>

                <div class="row mt-5">
                    @foreach ($classicVacations as $package)
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
                {{$classicVacations->links()}}

                {{-- <div class="more-packages">
                    <a href="#" class="link-more-package">More Packages</a>
                </div> --}}
            </div>

        </div>
    </section>
    <!-- ========== End of package-listing ========== -->



@endsection
