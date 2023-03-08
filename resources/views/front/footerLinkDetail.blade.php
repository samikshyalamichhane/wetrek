@extends('front.layouts.app')
<title>{{ $detail->title }}</title>
@section('content')
{{-- {{asset('assets/front/    ')}} --}}
<!-- ========== Package Banner ========== -->
<div class="tourmaster-single-header" style="background-image: url('{{asset('images/main/'.$detail->image)}}');">
    <div class="tourmaster-single-header-background-overlay"></div>
    <div class="tourmaster-single-header-overlay"></div>

    <div class="tourmaster-single-header-container tourmaster-container">
        <div class="tourmaster-single-header-container-inner">
            <div class="tourmaster-single-header-title-wrap tourmaster-item-pdlr">
                <div class="container">
                    <div class="row">
                        <div class="COL-12 trip-topic triphead-block p-0">
                            <div class="tourmaster-single-header-gallery-wrap"></div>

                            <h1 class="tourmaster-single-header-title">{{ $detail->title }}</p>
                            </h1>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ========== End of Package Banner ========== -->

<!-- ========== Privacy Policy ========== -->
<section class="privacy-policy">
    <div class="container">
        <h2 class="privacy-policy-title">{{ $detail->title }}</h2>
        <p>
            {!! $detail->description !!}
        </p>
    </div>
</section>
<!-- ========== End of Privacy Policy ========== -->

@endsection