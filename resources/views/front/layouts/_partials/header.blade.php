<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>We Trek Nepal</title>


    <!-- Additional plugin css -->
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap-icons.css')}}">

    <!-- icons -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">




    <link rel="stylesheet" href="{{asset('assets/front/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/line-awesome.min.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('assets/front/css/responsive.css')}}">

</head>

<body>




    <!-- navbar area start -->
    <nav class="navbar navbar-area navbar-expand-lg nav-style-01">
        <div class="container nav-container">
            <div class="responsive-mobile-menu">
                <div class="mobile-logo">
                    <a href="index.html">
                        <img src="{{ $dashboard_settings->logoUrl() }} ? {{ $dashboard_settings->logoUrl() }} : {{asset('assets/front/img/wetravel-logo.png')}}" alt="logo">
                    </a>
                </div>
                <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#tp_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggle-icon">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </span>
                </button>

            </div>
            <div class="collapse navbar-collapse" id="tp_main_menu">
                <div class="logo-wrapper desktop-logo">
                    <a href="{{route('indexHome')}}" class="main-logo">
                        <img src="{{ $dashboard_settings->logoUrl() }}" alt="logo">
                    </a>
                    <a href="{{route('indexHome')}}" class="sticky-logo">
                        <img src="{{ $dashboard_settings->logoUrl() }}" alt="logo">
                    </a>
                </div>
                <ul class="navbar-nav">
                    <div class="row justify-content-center">
                        <div class="header-info">
                            <span><i class="fa-regular fa-envelope"></i> {{ $dashboard_settings->nepal_email}}</span>
                            <span><i class="fa-brands fa-viber"></i> <i class="fa-brands fa-whatsapp"></i> {{ $dashboard_settings->nepal_cell}}</span>


                        </div>
                    </div>
                    @foreach($dashboard_categories as $category)
                    <li class="menu-item-has-children">
                        <a href="{{route('resolvepath.show',$category->slug)}}">{{$category->title}} <i class="ti-angle-down"></i></a>

                        <ul class="sub-menu">
                            @foreach($category->regions as $region)
                            <li><a href="{{route('resolvepath.show',$region->slug)}}">{{$region->name}}</a></li>
                            @endforeach
                            <!-- <li><a href="package-listingpage.html">Day Tour</a></li>
                        <li><a href="package-listingpage.html">Religious Tour</a></li>
                        <li><a href="package-listingpage.html">Region One</a></li> -->
                        </ul>
                    </li>
                    @endforeach
                    {{-- <li class="menu-item-has-children">
                    <a href="nepal-trek.html">Nepal Treks<i class="ti-angle-down"></i></a>
                    <ul class="sub-menu">
                        <li><a href="package-listingpage.html">Everest Region</a></li>
                        <li><a href="package-listingpage.html">Langtang Region</a></li>
                        <li><a href="package-listingpage.html">Anna Purna Region</a></li>
                    </ul>



                </li>
                <li class="menu-item-has-children">
                    <a href="#">Peak Climbing <i class="ti-angle-down"></i></a>
                    <ul class="sub-menu">
                        <li><a href="package-listingpage.html">Above 7000 ft</a></li>
                        <li><a href="package-listingpage.html">Above 6000 ft</a></li>
                        <li><a href="package-listingpage.html">Easy Climbing</a></li>
                    </ul>
                </li>--}}
                    <li class="menu-item-has-children">
                        <a href="#">Luxury Package <i class="ti-angle-down"></i></a>
                        <ul class="sub-menu">
                            @foreach($dashboard_luxurypackages as $luxury)
                            <li><a href="{{route('resolvepath.show',$luxury->slug)}}">{{$luxury->package_name}}</a></li>
                            @endforeach
                        </ul>
                    </li>





                    <li class="menu-item-has-children">
                        <a href="#">Destination <i class="ti-angle-down"></i></a>
                        <ul class="sub-menu">
                            @foreach($dashboard_destinations as $destination)
                            <li><a href="{{route('resolvepath.show',$destination->slug)}}">{{$destination->country_name}}</a></li>
                            @endforeach
                            <!-- <li><a href="#">Tibet</a></li>
                        <li><a href="#">Bhutan</a></li> -->
                        </ul>
                    </li>

                    <li class="menu-item-has-children">
                        <a href="#">Travel Guide <i class="ti-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li><a href="{{route('pagesDetail',['nepal-visa'])}}">Nepal Visa</a></li>
                            <li><a href="{{route('pagesDetail',['accomodation'])}}">Accommodations</a></li>
                            <li><a href="{{route('pagesDetail',['best-time-to-travel'])}}">Best Time to Travel</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children">
                        <a href="#">About Us <i class="ti-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li><a href="{{route('pagesDetail',['who-we-are'])}}">Who We Are</a></li>
                            <li><a href="{{route('pagesDetail',['why-travel-with-us'])}}">Why Travel With Us</a></li>
                            <li><a href="{{route('team')}}">Team</a></li>
                            <li><a href="{{route('blogList')}}">Blog</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{route('contactUS')}}">Contact</a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>
    <!-- navbar area end -->