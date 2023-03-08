@extends('front.layouts.app')
@section('content')
 <!-- breadcrumb area start -->
 <div class="breadcrumb-area jarallax" style="background-image:url({{ $dashboard_settings->team_banner_imageUrl() }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="page-title">About Us</h1>
                        <ul class="page-list">
                            <li><a href="index.html">About Us</a></li>
                            <li>Team</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area End -->




  
    
    <div class="team-newslater-bg" style="background-image:url(assets/img/bg/4.png);">
        <!-- team area end -->
        <div class="team-area pd-top-70">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title text-center">
                            <h2 class="title">Our Team</h2>
                            {{$dashboard_settings->team_description}}
                            </div>
                    </div>
                </div>
                <div class="row mb-5">
                    @foreach($details as $detail)
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-team text-center">
                            <div class="thumb">
                                <img src="{{ @$detail->imageUrl() }}" alt="team">
                            </div>
                            <h3 class="name"><a href="#">{{$detail->name}}</a></h3>
                            <span>{{$detail->designation}}</span>
                            <ul class="team-social">
                                <li><a href="{{$detail->facebook}}"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="{{$detail->twitter}}"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="{{$detail->instagram}}"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="{{$detail->linkedin}}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                    <!-- <div class="col-lg-3 col-sm-6">
                        <div class="single-team text-center">
                            <div class="thumb">
                                <img src="assets/img/team/team-2-1.jpg" alt="team">
                            </div>
                            <h3 class="name"><a href="#">Loretta Sutton</a></h3>
                            <span>Tour Guide</span>
                            <ul class="team-social">
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-lg-3 col-sm-6">
                        <div class="single-team text-center">
                            <div class="thumb">
                                <img src="assets/img/team/team-2-1.jpg" alt="team">
                            </div>
                            <h3 class="name"><a href="#">Loretta Sutton</a></h3>
                            <span>Trekking Guide</span>
                            <ul class="team-social">
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-team text-center">
                            <div class="thumb">
                                <img src="assets/img/team/team-2-1.jpg" alt="team">
                            </div>
                            <h3 class="name"><a href="#">Loretta Sutton</a></h3>
                            <span>Tour Guide</span>
                            <ul class="team-social">
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div> -->
                </div>


                <!-- <div class="row mb-5">
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-team text-center">
                            <div class="thumb">
                                <img src="assets/img/team/team-2-1.jpg" alt="team">
                            </div>
                            <h3 class="name"><a href="#">Loretta Sutton</a></h3>
                            <span>Director</span>
                            <ul class="team-social">
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-team text-center">
                            <div class="thumb">
                                <img src="assets/img/team/team-2-1.jpg" alt="team">
                            </div>
                            <h3 class="name"><a href="#">Loretta Sutton</a></h3>
                            <span>Tour Guide</span>
                            <ul class="team-social">
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-lg-3 col-sm-6">
                        <div class="single-team text-center">
                            <div class="thumb">
                                <img src="assets/img/team/team-2-1.jpg" alt="team">
                            </div>
                            <h3 class="name"><a href="#">Loretta Sutton</a></h3>
                            <span>Trekking Guide</span>
                            <ul class="team-social">
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-team text-center">
                            <div class="thumb">
                                <img src="assets/img/team/team-2-1.jpg" alt="team">
                            </div>
                            <h3 class="name"><a href="#">Loretta Sutton</a></h3>
                            <span>Tour Guide</span>
                            <ul class="team-social">
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->







            </div>
        </div>
        <!-- team area end -->
        
 
    </div>

@endsection
