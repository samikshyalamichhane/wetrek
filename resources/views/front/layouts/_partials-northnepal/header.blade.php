<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$og['title']}}</title>
    <meta name="description" content="{{$og['description']}}" />
    <meta name="keywords" content="{{$og['keywords']}}">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap/css/bootstrap.min.css')}}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;1,300;1,400&family=Open+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    {{-- {{asset('assets/front/    ')}} --}}

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fabicon Awesome -->
    <link rel="shortcut icon" rel="icon" href="{{asset('images/main/'.@$dashboard_settings->favicon)}}" type="image/gif" />

    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" href="{{asset('assets/front/css/owl-carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/lightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap-icons/bootstrap-icons.css')}}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/front/css/main.css')}}">

    <title>{{$dashboard_settings->site_name}}</title>
</head>

<body>
    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope"></i> <a href="mailto:{{$dashboard_settings->email}}">{{$dashboard_settings->email}}</a>
                <i class="bi bi-phone"></i> {{$dashboard_settings->mobile}}
            </div>
            <div class="d-none d-lg-flex social-links align-items-center">
                <a href="{{$dashboard_settings->facebook}}" class="facebook" target="_blank"><i class="bi bi-facebook"></i></a>
                <a href="{{$dashboard_settings->instagram}}" class="instagram" target="_blank"><i class="bi bi-instagram"></i></a>
                <!--<a href="{{$dashboard_settings->linkedin}}" class="linkedin" target="_blank"><i class="bi bi-youtube"></i></i></a>-->
                <a href="{{$dashboard_settings->youtube}}" class="youtube" target="_blank"><i class="bi bi-youtube"></i></i></a>
                <a href="{{$dashboard_settings->pininterest}}" class="pinterest" target="_blank"><i class="bi bi-pinterest"></i></a>
                <a href="{{$dashboard_settings->tripadvisor__link}}" class="tripadvisor" target="_blank"><i class="fa fa-tripadvisor"></i></a>



            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="">
        <div class="container d-flex align-items-center">
            <a href="/" class="logo me-auto"><img src="{{asset('images/main/'.$dashboard_settings->logo)}}" alt="" class="img-fluid"></a>

            <nav id="navbar" class="navbar order-last order-lg-0 me-lg-auto me-0">
                <ul>
                    <!-- <li><a class="nav-link scrollto active" href="/">Home</a></li> -->
                    <li class="dropdown"><a href="#"><span>Trekking & Hiking</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            @foreach($dashboard_regions as $region)
                            <li class="dropdown"><a href="#"><span>{{$region->name}}</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    @foreach($region->packages()->where('published',1)->get() as $package)
                                    <li><a href="{{route('packageDetails',$package->slug)}}">{{$package->package_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach

                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Tours</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            @foreach($dashboard_tours as $tour)
                            <li class="dropdown"><a href="#"><span>{{$tour->name}}</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    @foreach($tour->tourpackages()->where('published',1)->get() as $package)
                                    <li><a href="{{route('tourPackageDetails',$package->slug)}}">{{$package->package_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach

                        </ul>
                    </li>

                    <li class="dropdown"><a href="#"><span>Adventure</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            @foreach($dashboard_adventures as $adventure)
                            <li class="dropdown"><a href="#"><span>{{$adventure->name}}</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    @foreach($adventure->adventurepackages()->where('published',1)->get() as $package)
                                    <li><a href="{{route('adventurePackageDetails',$package->slug)}}">{{$package->package_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach

                        </ul>
                    </li>

                    <li class="dropdown"><a href="#"><span>Destinations</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            @foreach($dashboard_destinations as $destination)
                            <li>
                                <a href="{{route('destinationCountry',$destination->slug)}}"><span>{{$destination->country_name}}</span> <i class="bi bi-chevron-right"></i></a>
                            </li>
                            @endforeach

                        </ul>
                    </li>

                    <li class="dropdown"><a href="#"><span>Heli Tour</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            @foreach ($dashboard_helitourpackages as $package)
                            <li><a href="{{route('helitourPackageDetails',$package->slug)}}"><span>{{$package->package_name}}</span> <i class="bi bi-chevron-right"></i></a>
                            </li>
                            @endforeach

                        </ul>
                    </li>

                    <li class="dropdown"><a href="#"><span>Nature & Wildlife</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            @foreach ($dashboard_natureandwildlifepackages as $package)
                            <li><a href="{{route('naturePackageDetails',$package->slug)}}"><span>{{$package->package_name}}</span> <i class="bi bi-chevron-right"></i></a>
                            </li>
                            @endforeach

                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="{{route('blogList')}}">Blogs</a></li>


                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="{{ route('customizeTrip') }}" class="customize-btn scrollto">Customize <span class="d-none d-md-inline">Your</span> Trip</a>

        </div>
    </header><!-- End Header -->