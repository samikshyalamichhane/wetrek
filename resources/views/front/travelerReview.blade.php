@extends('front.layouts.app')
@section('title','Adventure Magic | Travelers Review')
@section('content')
{{-- {{asset('assets/front/    ')}} --}}
    <!-- ========== Package Banner ========== -->
    <div class="tourmaster-single-header" style="background-image: url('{{asset('images/main/'.$dashboard_settings->traveler_review_banner)}}');">
        <div class="tourmaster-single-header-background-overlay"></div>
        <div class="tourmaster-single-header-overlay"></div>

        <div class="tourmaster-single-header-container tourmaster-container">
            <div class="tourmaster-single-header-container-inner">
                <div class="tourmaster-single-header-title-wrap tourmaster-item-pdlr">
                    <div class="container">
                        <div class="row">
                            <div class="COL-12 trip-topic triphead-block p-0">
                                <div class="tourmaster-single-header-gallery-wrap"></div>

                                <h1 class="tourmaster-single-header-title">Travelers Reviews</p>
                                </h1>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ========== End of Package Banner ========== -->

    <!-- ========== Client Review ========== -->
    <section class="client-review">
        <div class="container">
            <div class="client-review-title">
                <h1>What Our Client Says</h1>
            </div>

            <div class="client-review-description">
                <p>
                        {!!$dashboard_settings->traveler_reviews_description ?? '' !!}
                </p>
            </div>
        </div>

        <!-- reviews -->
        <div class="client-review-wrapper">
            <!-- client review single -->
            @foreach ($details as $key => $review)
                @if (fmod($key, 2) == 0)
                    <div class="client-review-single">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="client-review-image-content">
                                        <div class="client-review-img">
                                            <img src="{{asset('images/main/'.$review->image)}}" alt="" class="img-fluid">
                                        </div>
                                        <div class="text-center">
                                            <div class="client-review-details">
                                                <h2 class="client-review-name">{{ $review->name }}</h2>
                                                <span class="client-review-country">{!! $review->country !!}</span>
                                                <div class="client-review-info">
                                                    <p>
                                                        <i class="fa fa-envelope"></i>
                                                        {{ $review->email }}
                                                    </p>
                                                    <p>
                                                        <i class="fa fa-phone"></i>
                                                        {{ $review->phone }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="client-review-content">
                                        <span class="client-review-rating">
                                            {!! str_repeat('<span><i class="fa fa-star"></i></span>', $review->overall_review) !!}
                                            {!! str_repeat('<span><i class="fa fa-star-o"></i></span>', 5 - $review->overall_review) !!}
                                        </span>

                                        <div class="client-review-description">
                                            {!! $review->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="client-review-single">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="client-review-content">
                                        <span class="client-review-rating">
                                            {!! str_repeat('<span><i class="fa fa-star"></i></span>', $review->overall_review) !!}
                                            {!! str_repeat('<span><i class="fa fa-star-o"></i></span>', 5 - $review->overall_review) !!}
                                        </span>

                                        <p class="client-review-description">
                                            {!! $review->description !!}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="client-review-image-content">
                                        <div class="client-review-img">
                                            <img src="{{asset('images/main/'.$review->image)}}" alt="" class="img-fluid">
                                        </div>
                                        <div class="text-center">
                                            <div class="client-review-details">
                                                <h2 class="client-review-name">{{ $review->name }}</h2>
                                                <span class="client-review-country">{{ $review->country }}</span>
                                                <div class="client-review-info">
                                                    <p>
                                                        <i class="fa fa-envelope"></i>
                                                        {{ $review->email }}
                                                    </p>
                                                    <p>
                                                        <i class="fa fa-phone"></i>
                                                        {{ $review->phone }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            <!-- client review single end -->
        </div>
        {{$details->links()}}
    </section>
    <!-- ========== End of Client Review ========== -->

@endsection