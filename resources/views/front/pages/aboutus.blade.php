@extends('front.layouts.app')

@section('content')

    <!-- ===== MAIN ===== -->
    <main>
        <div class="container">
            <h2 class="section-title">
                {!! $detail->title !!}
            </h2>
            <p>{!! $detail->description !!}</p>
        </div>
    </main>

@endsection


