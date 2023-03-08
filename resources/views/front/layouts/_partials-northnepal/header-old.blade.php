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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

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

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/front/css/main.css')}}">

    <title>{{$dashboard_settings->site_name}}</title>
</head>
<body>
    <!--<div id="nav-package">-->
        <header class="header" id="header">

            <!-- Header topbar -->
            <div class="header__topbar">
                <div class="header__container container">
                    <div class="row">
                        <div class="col-2 header__topbar--middle">
                            <!-- Middle -->
                            <div class="logo">
                                <a href="index.php">

                                    <img src="{{asset('images/main/'.$dashboard_settings->logo)}}" alt="" class="logo__img img-fluid" alt="North nepal logo">
                                </a>
                            </div>
                            <!-- Middle end -->
                        </div>
                        <!--<div class="col-5 header__topbar--left">-->
                            <!-- Left -->
                        <!--    <i class="fa fa-phone"></i>-->
                        <!--    {{$dashboard_settings->mobile}}-->
                        <!--    <i class="fa fa-envelope-o"></i>-->
                        <!--    {{$dashboard_settings->email}}-->
                            <!-- Left end -->
                        <!--</div>-->
                        
                        <div class="text-right col-md-10 col-sm-12 header__topbar--right">
                            <!-- Right -->
                            <div class="social">
                                <a href="{{$dashboard_settings->facebook}}" target="_blank" class="social__icon" title="facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="{{$dashboard_settings->facebook}}" target="_blank" class="social__icon" title="flickr">
                                    <i class="fa fa-flickr"></i>
                                </a>
                                <a href="{{$dashboard_settings->linkedin}}" target="_blank" class="social__icon" title="google-plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                                <a href="{{$dashboard_settings->twitter}}" target="_blank" class="social__icon" title="twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </div>
                            <div class="customize-trip">
                                <a href="{{ route('customizeTrip') }}" class="customize">
                                    Customize your trip
                                </a>
                            </div>
                            <!-- Right end -->
                            <div class="mt-2 header-top-info">
                                <!-- Left -->
                                <i class="fa fa-phone"></i>
                                {{$dashboard_settings->mobile}}
                                <i class="fa fa-envelope-o"></i>
                                {{$dashboard_settings->email}}
                                <!-- Left end -->
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <!-- Header topbar end -->

            <div class="shadow-lg-sm header__bottom" id="header__bottom">
                <div class="container">
                    <nav class="bg-transparent navbar navbar-expand-lg navbar-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa fa-bars"></i>
                        </button>

                        <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="/">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Trekking & Hiking
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @foreach($dashboard_regions as $region)
                                                <li class="sub-menu-list">
                                                    <a class="dropdown-item" href="#">{{$region->name}}</a>
                                                    <ul class="mega-menu">
                                                        @foreach($region->packages()->where('published',1)->get() as $package)
                                                            <li class="mega-menu-list">
                                                                <a href="{{route('packageDetails',$package->slug)}}">{{$package->package_name}}</a>
                                                            </li>
                                                        @endforeach
                                                        {{-- <li class="mega-menu-list">
                                                            <a href="package-inner.php">Australian Camp Day Hike</a>
                                                        </li>
                                                        <li class="mega-menu-list">
                                                            <a href="package-inner.php">Pokhara Peace Pagoda Hike</a>
                                                        </li>
                                                        <li class="mega-menu-list">
                                                            <a href="package-inner.php">Sarangkot Sunrise Hike</a>
                                                        </li>
                                                        <li class="mega-menu-list">
                                                            <a href="package-inner.php">Kalikasthan Day Hike</a>
                                                        </li>  --}}
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                </li>
                               
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Tours
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach($dashboard_tours as $tour)
                                            <li class="sub-menu-list">
                                                <a class="dropdown-item" href="#">{{$tour->name}}</a>
                                                <ul class="mega-menu">
                                                    @foreach($tour->tourpackages()->where('published',1)->get() as $package)
                                                        <li class="mega-menu-list">
                                                            <a href="{{route('tourPackageDetails',$package->slug)}}">{{$package->package_name}}</a>
                                                        </li>
                                                    @endforeach
                                                    {{-- <li class="mega-menu-list">
                                                        <a href="package-inner.php">Pokhara Peace Pagoda Hike</a>
                                                    </li>
                                                    <li class="mega-menu-list">
                                                        <a href="package-inner.php">Sarangkot Sunrise Hike</a>
                                                    </li>
                                                    <li class="mega-menu-list">
                                                        <a href="package-inner.php">Kalikasthan Day Hike</a>
                                                    </li> --}}
                                                </ul>
                                            </li>
                                            {{-- <li class="sub-menu-list">
                                                <a class="dropdown-item" href="#">Day Tours</a>
                                                <ul class="mega-menu">
                                                    <li class="mega-menu-list">
                                                        <a href="package-inner.php">Kathmandu Day Tour</a>
                                                    </li>
                                                    <li class="mega-menu-list">
                                                        <a href="package-inner.php">Lumbini Day Tour</a>
                                                    </li>
                                                    <li class="mega-menu-list">
                                                        <a href="package-inner.php">Nagarkot Sunrise Tour</a>
                                                    </li>
                                                    <li class="mega-menu-list">
                                                        <a href="package-inner.php">Pokhara Lake Tour</a>
                                                    </li>
                                                    <li class="mega-menu-list">
                                                        <a href="package-inner.php">Pokhara Tour</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="sub-menu-list">
                                                <a class="dropdown-item" href="#">Multi Day Tours</a>
                                                <ul class="mega-menu">
                                                    <li class="mega-menu-list">
                                                        <a href="package-inner.php">Best of Nepal Tours</a>
                                                    </li>
                                                    <li class="mega-menu-list">
                                                        <a href="package-inner.php">Kathmandu-Pokhara-Chitwan Tours</a>
                                                    </li>
                                                </ul>
                                            </li>   --}}
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Adventure
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach($dashboard_adventures as $adventure)
                                            <li class="sub-menu-list">
                                                <a class="dropdown-item" href="#">{{$adventure->name}}</a>
                                                <ul class="mega-menu">
                                                    @foreach($adventure->adventurepackages()->where('published',1)->get() as $package)
                                                        <li class="mega-menu-list">
                                                            <a href="{{route('adventurePackageDetails',$package->slug)}}">{{$package->package_name}}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                        {{-- <li>
                                            <a href="#">
                                                Zipline in Pokhara
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Canyoning in Nepal
                                            </a>
                                        </li>
                                        <li class="sub-menu-list">
                                            <a class="dropdown-item" href="#">Bungee Spots</a>
                                            <ul class="mega-menu">
                                                <li class="mega-menu-list">
                                                    <a href="package-inner.php">Trishuli River Rafting</a>
                                                </li>
                                                <li class="mega-menu-list">
                                                    <a href="package-inner.php">Upper Seti River Rafting</a>
                                                </li>
                                                <li class="mega-menu-list">
                                                    <a href="package-inner.php">Lower Seti River Rafting</a>
                                                </li>
                                                <li class="mega-menu-list">
                                                    <a href="package-inner.php">Kali Gandaki River Rafting</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Cycling
                                            </a>
                                        </li> --}}
                                    </ul>
                                </li>
                            </ul>

                            <a href="#" class="navbar-brand">
                                <img src="{{asset('assets/front/images/compass.png')}}" alt="compass" class="header__bottom--compass img-fluid" id="compass__logo">
                            </a>

                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Destinations
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach($dashboard_destinations as $destination)
                                            <li>
                                                <a href="{{route('destinationCountry',$destination->slug)}}">{{$destination->country_name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Heli Tour
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                       @foreach ($dashboard_helitourpackages as $package)
                                        <li>
                                            <a href="{{route('helitourPackageDetails',$package->slug)}}">{{$package->package_name}}</a>

                                        </li>
                                       @endforeach
                                        {{-- <li>
                                            <a href="package-inner.php">Bardiya National Park Safari</a>
                                        </li>  --}}
                                    </ul>
                                </li>
                               
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Nature & Wildlife
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach ($dashboard_natureandwildlifepackages as $package)
                                        <li>
                                            <a href="{{route('naturePackageDetails',$package->slug)}}">{{$package->package_name}}</a>
                                        </li>
                                       @endforeach
                                        {{-- <li>
                                            <a href="package-inner.php">Chitwan National Park Safari</a>
                                        </li>
                                        <li>
                                            <a href="package-inner.php">Bardiya National Park Safari</a>
                                        </li>  --}}
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('blogList')}}">Blog</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

        </header>
    <!--</div>-->
    <div style="clear:both;"></div>