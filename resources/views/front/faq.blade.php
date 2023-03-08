@extends('front.layouts.app')
<style>
    .card {

     background-color:none !important; 
     background-clip: border-box; 
     border: none  !important; 
     border-radius:0 
}
.card-header{
    background-color:#005aa9 !important;
    color:#fff !important;
}
	.mb-0 > a {
      display: block;
      position: relative;
      color:#fff !important;
    }
    .mb-0 > a:after {
      content: "\f078"; /* fa-chevron-down */
      font-family: 'FontAwesome';
      position: absolute;
      right: 0;
    }
    .mb-0 > a[aria-expanded="true"]:after {
      content: "\f077"; /* fa-chevron-up */
    }
</style>
@section('content')
@if(@$dashboard_settings->contactus_image)
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image: url('{{asset('images/main/'.@$dashboard_settings->contactus_image)}}');">
@else
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image: url('/assets/front/images/slider/1.jpg');">
@endif
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="list">
                    <li><a href="/">Home</a></li>
                    <li><a href="#">FAQS</a></li>
                </ul>
                <h2>Frequently Asked Question ?</h2>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
	<div class="row justify-content-center">
        <div class="col-sm-12">
            <div id="accordion">
             @foreach($faqs as $key=>$faq)
             @php
             $count = $key+1;
             @endphp
             @if($count==1)
                  <div class="card">
                    <div class="card-header" id="heading-{{$count}}">
                      <h5 class="mb-0">
                        <a role="button" data-toggle="collapse" href="#collapse-{{$count}}" aria-expanded="true" aria-controls="collapse-{{$count}}">
                          {{$faq->questions}}
                        </a>
                      </h5>
                    </div>
                    <div id="collapse-{{$count}}" class="collapse show" data-parent="#accordion" aria-labelledby="heading-{{$count}}">
                      <div class="card-body">
                      {{$faq->answers}}
                      </div>
                    </div>
                  </div>
                  @endif
                  @endforeach
                  @foreach($faqs as $key=>$faq)
             @php
             $count = $key+1;
             @endphp
             @if($count>1)
                  <div class="card">
                    <div class="card-header" id="heading-2">
                      <h5 class="mb-0">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-{{$count}}" aria-expanded="false" aria-controls="collapse-{{$count}}">
                         {{$faq->questions}}
                        </a>
                      </h5>
                    </div>
                    <div id="collapse-{{$count}}" class="collapse" data-parent="#accordion" aria-labelledby="heading-{{$count}}">
                      <div class="card-body">
                      {{$faq->answers}}
                      </div>
                    </div>
                  </div>
                  @endif
                  @endforeach
                  
            </div>
        </div>
    </div>
</div>


@endsection