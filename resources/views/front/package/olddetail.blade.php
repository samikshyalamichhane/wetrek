@extends('front.layouts.app')

@section('content')
{{--
 <div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image: url('{{asset('images/trek.jpg')}}');">
<div class="container">
    <div class="row">
        <div class="col-12">
            <ul class="list">
                <li><a href="/">Home</a></li>
                <li><a href="#">Destination</a></li>
            </ul>
            <h2>{{$details->destination_name}}</h2>
        </div>
    </div>
</div>
</div>
--}}

@if(count($details->slider__images) > 0)
<div class="home_slider">
    <div class="home_banner owl-carousel home_owl_slider">
        @foreach($details->slider__images as $slider)
        <div class="home_slider_item">
            <img src="{{asset('images/multiple/'.$slider->sliderimages)}}" alt="">
        </div>
        @endforeach
    </div>
</div>
@endif


<div class="inner-section-area section">
    <div class="container">
        <div class="blog-list">
            <div class="row blog-table-head">
                <div class="col-lg-12 col-md-12 col-sm-12 country_name">
                    <h1>{{$details->package_title}}</h1>
                    <div class="lines"></div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="country_header_image">
                        <img src="{{asset('images/main/'.$details->image)}}">
                    </div>
                </div>
                <div class="col-lg-12 tour_header">
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-lg-3 short_info ">
                            <div class="height_manage short_info1 p_a15">
                                <i class="fa fa-map-marker"></i>
                                <h1>
                                    <span> Destination name :</span> <br>
                                    {{$details->destination_name}}
                                </h1>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 short_info">
                            <div class="height_manage short_info1 p_a15">
                                <i class="fa fa-dollar"></i>
                                <h1>
                                    <span> prices from(Per Person) </span> <br>
                                    USD {{$details->price}}
                                </h1>
                            </div>
                        </div>
                        <div class=" col-md-4 col-lg-3 short_info">
                            <div class="height_manage short_info1 p_a15">
                                <i class="fa fa-calendar"></i>
                                <h1>
                                    <span> Days</span> <br>
                                    {{$details->days_and_nights}}
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="package_content">
                        <div class="tab_list">
                            <nav class="detail_nav">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">

                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#hoverview" role="tab" aria-controls="hoverview" aria-selected="true">Overview</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#itinerary-detail" role="tab" aria-controls="itinerary-detail" aria-selected="false">detailed itinerary</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#cost-info" role="tab" aria-controls="cost-info" aria-selected="false">Cost Info</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#trip-highlights" role="tab" aria-controls="trip-highlights" aria-selected="false">Trip Info</a>

                                    <!--<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#outline" role="tab" aria-controls="outline" aria-selected="false">outline itinerary</a>-->
                                    
                                    <!--<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#includes" role="tab" aria-controls="includes" aria-selected="false">Includes</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#excludes" role="tab" aria-controls="excludes" aria-selected="false">excludes</a>-->
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#faq" role="tab" aria-controls="faq" aria-selected="false">Faq</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#review1" role="tab" aria-controls="review1" aria-selected="false">Review</a>
                                    <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Review</a> -->

                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">

                                <div class="tab-pane fade show active" id="hoverview" role="tabpanel" aria-labelledby="nav-home-tab">
                                    {!! $details->overview !!}
                                    <div class="payment_policy">
                                <h1>Outline Itinerary</h1>
                                {!! $details->outline_itinerary !!}
                            </div>
                                    
                                </div>
                                <div class="tab-pane fade" id="trip-highlights" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    {!! $details->trip_highlights !!}
                                </div>
                                
                                <div class="tab-pane fade" id="cost-info" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="payment_policy">
                                <h1>Price Includes</h1>
                                {!! $details->includes !!}
                            </div><br> <br>
                            <div class="payment_policy">
                                <h1>Price Excludes</h1>
                                {!! $details->excludes !!}
                            </div>
                                </div>
                                
                                
                                
                                <div class="tab-pane fade" id="outline" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    {!! $details->outline_itinerary !!}
                                </div>
                                <div class="tab-pane fade" id="itinerary-detail" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2 itinerary_detail">
                                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                                @foreach(@$details->itinerary as $key => $value)
                                                <a class="nav-link {{$key == 0 ? 'active' : ''}}" id="v-pills-home-tab" data-toggle="pill" href="#day-{{@$value->day_num}}" role="tab" aria-controls="day-{{@$value->day_num}}" aria-selected="{{$key == 0 ? 'true' : ''}}">Day {{@$value->day_num}}</a>
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-10 itinerary_info">
                                            <div class="tab-content" id="v-pills-tabContent">

                                                @foreach(@$details->itinerary as $key => $data)
                                                <div class="tab-pane fade show {{$key == 0 ? 'active' : ''}}" id="day-{{$data->day_num}}" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                    <h1>
                                                        Day {{$data->day_num}}: {{$data->title}}
                                                    </h1>
                                                    {!! $data->activity_details !!}
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="includes" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    {!! $details->includes !!}
                                </div>
                                <div class="tab-pane fade" id="excludes" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    {!! $details->excludes !!}
                                </div>
                                <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="nav-contact-tab">

                                    <div class="tab-content" id="v-pills-tabContent">


                                        
                                            @foreach(@$details->faq as $key => $data)
                                            <h1>
                                                {{$key+1}} : {{$data->questions}}
                                            </h1>
                                            {!! $data->answers !!}
                                            @endforeach
                                        


                                    </div>
                                </div>

                                <div class="tab-pane fade" id="review1" role="tabpanel" aria-labelledby="nav-contact-tab">

                                    <div class="col-lg-10 col-md-10 col-sm-10 review1">

                                        <div class="tab-content" id="v-pills-tabContent">
                                            @foreach(@$details->review as $key => $data)
                                            <h1>
                                                {{$key+1}} : {{$data->name}}
                                            </h1>
                                            {!! $data->review !!}
                                            @endforeach




                                        </div>

                                    </div>

                                </div>





                            </div>
                            <div class="grab_now">
                                <div class="booking">
                                    <h1>book online</h1>
                                    <p>
                                        Please click the book online.
                                    </p>
                                </div>
                                <a href="{{route('bookPackage', $details->slug)}}" class="btn"><i class="fa fa-bookmark"></i> book online </a>
                            </div>


                        </div>

                        <!--<div class="tab_list m_t35">
                            <div class="terms_conditions">
                                <h1>Terms & Conditions</h1>
                                {!! $details->terms_and_conditions !!}
                            </div>

                        </div>
                        <div class="tab_list m_t35">
                            <div class="payment_policy">
                                <h1>trip payment & cancellation policy</h1>
                                {!! $details->payment_and_cancellation !!}
                            </div>

                        </div>
                        <div class="tab_list m_t35">
                            <div class="payment_policy">
                                <h1>trip extension: post or pre tour</h1>
                                {!! $details->trip_extension !!}
                            </div>

                        </div>
                        <div class="tab_list m_t35">
                            <div class="payment_policy">
                                <h1>notes</h1>
                                {!! $details->notes !!}
                            </div>

                        </div>-->

                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 ">
                    <!--  <div class="trip_gallery">
                            <h1>trip gallery</h1>
                            <div class="mains">
                                <div class="views">
                                    <a href="img-inner-page.php">
                                        <img src="./images/slider/2.jpg" alt="Loading file" />
                                    </a>
                                    <a href="img-inner-page.php">
                                        <div class="img-title">
                                            <h2>Trekking to mountain valley</h2>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div> -->
                        
                        <div class="trip-map">
                        <h1 style="margin-bottom:2px;">Trip Map</h1>
                        <a data-lightbox="roadtrip" href="{{'/images/main/'.$details->map_image}}">
                            <image src="{{'/images/main/'.$details->map_image}}"  style="width:100%" class="img responsive">
                        </a>
                    </div>
                    <div class="similar_trrrp">
                        <h1 style="margin-bottom:2px; ">similar Destinations</h1>
                        <div class="row m_lr0">

                            @foreach($similarDestination as $sdestination)
                            <div class="col-lg-12 col-md-12 col-sm-6 responsive_padding">
                                <div class="similar_list">
                                    <div class="similar_country">
                                        <a href="{{route('packageDetails', $sdestination->slug)}}">
                                            <img src="{{asset('images/listing/'.$sdestination->image)}}">
                                        </a>
                                    </div>
                                    <div class="similar_detail">
                                        <h5> <a href="{{route('packageDetails', $sdestination->slug)}}"> {{$sdestination->destination_name}} </a></h5>
                                        <div class="post-bottom access_more">
                                            <a class="artbtn" href="{{route('packageDetails', $sdestination->slug)}}">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="inner-inquiry_form">
                        @if(session('message'))
                            <div class="alert alert-info alert-dismissible" id="successMessage">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{session('message')}}
                            </div>
                        @endif
                        <form action="{{route('enquirySave')}}" method="post" class="form form-horizontal form-responsive">
                            @csrf
                            <div class="row form-group">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="text-center text-uppercase white font_18 font_weight600 m_b15">
                                        Quick Inquiry
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class=" text-capitalize font_16  m_b15">
                                        <input type="text" name="name" class="form-control" required placeholder="Name:">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class=" text-capitalize font_16  m_b15">
                                        <input type="text" name="email" class="form-control" required placeholder="Email:">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class=" text-capitalize font_16  m_b15">
                                        <input type="text" name="contact" class="form-control" required placeholder="Contact:">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class=" text-capitalize font_16  m_b15">
                                        <textarea name="message" id=""   rows="3" class="form-control" required placeholder="What do you looking for"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="text-right text-capitalize font_16  m_b15">
                                        <input type="submit" class="btn btn-info" name="enquiry" value="Submit">
                                        <!-- <button type="submit" class="btn btn-info">Submit</button> -->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div><br> <br> <br>

@endsection