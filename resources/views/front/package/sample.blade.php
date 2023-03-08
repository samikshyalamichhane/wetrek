@extends('front.layouts.app')

@section('content')
  <section>
    <div class="container-fluid" style="background-image: url(https://unsplash.com/photos/Mi6XreT1ypI);height: 500px; width: 100%;">
    </div>
  </section>
 
    <section>@if(count($details->slider__images) > 0)
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
        <div class="container">
            <div class="row" id="navSecond">

                <nav class="navbar navbar-expand" id="secondary-nav">
                         <ul class="nav navbar-nav">
                          <li class="nav-item"><a class="nav-link" href="#">Over view</a></li>
                          <li class="nav-item"><a class="nav-link" href="#">Detail itinerary</a></li>
                          <li class="nav-item"><a class="nav-link" href="#">Cost Info</a></li>
                          <li class="nav-item"><a class="nav-link" href="#">Trip Info</a></li>
                          <li class="nav-item"><a class="nav-link" href="#">Faq</a></li>
                          <li class="nav-item"><a class="nav-link" href="#">Review</a></li>
                         </ul>
                </nav>

                <div class="col-lg-9 col-md-9 col-sm-12 trip-box">
                    <p class="labuche-peak">Labuche Peak Climbing</p>
                    <div class="trip-facts">
                        <p class="text-light text-center p-2">Trip Facts</p>
                    </div>
                    <div class="duration-box">
                        <div style="border-right: 1px solid #000; padding: 10px;">
                           <center> <i class="fa fa-calendar-alt" style="color:#005aa9; font-size: 25px;"></i></center>
                            <dl class="duration">
                            <dt class="dt-txt">Duration</dt>
                            <dd>20</dd>
                            <dd class="dd-txt">Days</dd>
                            </dl>
                        </div>
                        <div style="margin-left: 10px;">
                            <ul>
                            <li class="txt-list">
                                <span class="fa fa-users trip-facts-icons"></span>
                             <dl>
                                 <dt class="dt-txt">Group Size</dt>
                                 <dd class="dd-txt">1-12</dd>
                             </dl>
                            </li>

                            <li class="txt-list">
                                <i class="fa fa-mountain trip-facts-icons"></i>
                            <dl>
                                <dt class="dt-txt">Max Altitude</dt>
                                <dd class="dd-txt">6,194m, summit</dd>
                            </dl>
                            </li>

                            <li class="txt-list">
                                <i class="fa fa-cloud-sun-rain trip-facts-icons"></i>
                                <dl>
                                <dt class="dt-txt">Best Season</dt>
                                <dd class="dd-txt">march-may <br> and Sep-Nov</dd>
                                </dl>
                            </li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                 <li class="txt-list">
                                    <i class="fas fa-hands-helping trip-facts-icons"></i>
                                    <dl>
                                        <dt class="dt-txt">p TriLevel</dt>
                                        <dd class="dd-txt">Challenging</dd>
                                    </dl>
                                 </li>
                                 <li class="txt-list">
                                    <i class="fas fa-home trip-facts-icons"></i>
                                    <dl>
                                        <dt class="dt-txt">Accommodation</dt>
                                        <dd class="dd-txt">Hotel/Teahouse/Camp</dd>
                                    </dl>
                                 </li>
                                 <li class="txt-list">
                                    <i class="fas fa-bus trip-facts-icons"></i>
                                    <dl>
                                        <dt class="dt-txt">Transportation</dt>
                                        <dd class="dd-txt">Flight\Drive</dd>
                                    </dl>
                                 </li>
                            </ul>
                        </div>
                         <div>
                            <ul>
                                <li class="txt-list">
                                <span class="fa fa-hourglass-start trip-facts-icons"></span>
                                <dl>
                                    <dt class="dt-txt">Starts from</dt>
                                    <dd class="dd-txt">Kathmandu</dd>
                                </dl>
                            </li>

                            <li class="txt-list">
                                <i class="fa fa-hourglass-end trip-facts-icons"></i>
                                <dl>
                                    <dt class="dt-txt">Ends at</dt>
                                    <dd class="dd-txt">Kathmandu</dd>
                                </dl>
                                </li>
                                <li class="txt-list">
                                    <i class="fas fa-hiking trip-facts-icons"></i>
                                <dl>
                                    <dt class="dt-txt">Activity</dt>
                                    <dd class="dd-txt">Sightseeing, <br> climbing & trekking</dd>
                                </dl>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- SIDEBAR RIGHT -->
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
                <!-- SIDEBAR RIGHT END-->
            </div>  
        </div>
    </section>
    <style type="text/css">
    .trip-box{
        background:#fff;
        box-shadow: 0px 1px 39px #d5b2b280;
    }
    .labuche-peak{
        font-size: 24px;
        padding-top: 15px;
        font-weight: bold;
        color: #0072bb;
    }
    .trip-facts{
         background:#007bff;
         width: 20%;
    }
    .duration-box{
        display: flex;
        position: relative;
    }
    .duration{
        text-align: center;
        font-weight: bold;
    }
    .duration: before{
        content: "asdf";
        position: absolute;
        top: 0;
        left: 0;
        height: 30px;
        width: 30px;
        border-radius:50%;
        background: #fff;
    }
    .txt-list{
        font-weight: bold;
        padding: 10px;
        display: flex;
        position: relative;
    }
    .txt-list p{
        font-weight: normal;
    }
    .dd-txt{
        font-weight: normal;
    }
    .dt-txt{
        font-size: 16px;
        text-transform: uppercase;
    }
    .trip-facts-icons{
        font-size: 25px;
        position: absolute;
        top: 25px;
        color: #005aa9;
    }
    ul li dl{
        margin-left: 40px;
    }
    </style>

@endsection