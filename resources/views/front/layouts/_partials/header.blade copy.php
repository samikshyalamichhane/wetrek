<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$og['title']??''}}</title>
    <meta name="description" content="{{$og['description']??''}}">
    <meta name="keywords" content="{{$og['keywords']??''}}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Fabicon Awesome -->
    <link rel="shortcut icon" rel="icon" href="{{asset('images/main/'.@$dashboard_settings->favicon)}}" type="image/gif" />
    <!-- {{asset('assets/front/    ')}} -->
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('assets/front/css/linearicons.css')}}">
     <link rel="stylesheet" href="{{asset('assets/front/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/main.css')}}">
    
    
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-G585Q6EQLQ"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-G585Q6EQLQ');
    </script>
    
    <meta name="google-site-verification" content="yt3lqY5z19eCqPuXj0Y_r6jXVui6iAZE7gJLogtqab8" />


</head>

<body>

    <!-- ========== Header ========== -->
    <header id="header">
        <div class="container main-menu">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    @if (isset($dashboard_settings->logo))
                    <a href="/"><img src=" {{asset('images/main/'.$dashboard_settings->logo)}}" alt="" title="" / id="test"></a>
                    @else
                    <a href="/"><img src="{{asset('assets/front/img/logo.png')}}" alt="" title="" /></a>
                    @endif
                </div>
                <div class="mobile-exp">
                    <li class="headexp"><a href="http://classicvacationsnepal.com/who-we-are">22 Years Of Experiences</a></li>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        {{-- <li class="menu-has-children"><a href="#">Destinations & Trips</a>
                            <ul>
                                @foreach($dashboard_destinations as $destination)
                                    <li><a href="#">{{$destination->title}}</a></li>
                                @endforeach
                            </ul>
                        </li> --}}
                        <li class="headexp"><a href="http://classicvacationsnepal.com/who-we-are">22 Years Of Experiences</a></li>
                        <li class="menu-has-children"><a href="{{ route('destinationList') }}">Destinations & Trips</a>
                            <ul>
                                @foreach($dashboard_destinations as $destinations)
                                    <li class="menu-has-children"><a href="{{route('resolvepath.show', $destinations->slug)}}">{{$destinations->country_name}} </a>
                                        <ul>
                                            @foreach($destinations->destinationtype()->where('published',1)->get() as $destination)
                                                <li><a href="{{route('resolvepath.showTwoSlug',[$destinations->slug, $destination->slug])}}">{{$destination->title}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="menu-has-children"><a href="{{ route('classicVacationList') }}">Classic Vacations</a>
                            <ul>

                                @foreach($dashboard_classicVacations as $package)
                                    <li class="menu-has-children"><a href="{{route('packageDetails',$package->slug)}}">{{$package->package_name}}</a></li>
                                @endforeach
                                {{-- @foreach($dashboard_regions as $region)
                                    <li class="menu-has-children"><a href="{{ route('resolvepath.show', $region->slug) }}">{{$region->name}} </a>
                                        <ul>
                                            @foreach($region->packages()->where('published',1)->get() as $package)
                                                <li><a href="{{route('packageDetails',$package->slug)}}">{{$package->package_name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach --}}
                            </ul>
                        </li>
                       <li class="menu-has-children"><a href="{{ route('travelstyle') }}">Travel Style</a>
                            <ul>
                                @foreach($dashboard_travelStyle as $travelStyle)
                                    <li><a href="{{route('travelStyleDetail', $travelStyle->slug)}}">{{ $travelStyle->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                         <li class="menu-has-children"><a href="{{ route('travelGuide') }}">Travel Guide</a>
                            <ul>
                                @foreach ($dashboard_pages->where('travel_guide', 1) as $page)
                                    <li><a href="{{route('resolvepath.show',$page->slug)}}">{{ $page->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                         <li class="menu-has-children"><a href="{{ route('aboutus') }}">About Us</a>
                            <ul>
                                <li><a href="{{ route('whoweare') }}">Who are We</a></li>
                                <li><a href="{{ route('whyus') }}">Why Travel With Us</a></li>
                                <li><a href="{{ route('team') }}">Our Team</a></li>
                                <!--<li><a href="{{route('resolvepath.show', 'privacy-policy')}}">Privacy Policy</a></li>-->
                                <!--<li><a href="{{route('resolvepath.show', 'travels-term')}}">Travel Terms & Conditions</a></li>-->
                                <li><a href="{{route('blogList')}}">Travel Blog</a></li>
                                <li><a href="{{route('travelerReview')}}">Travelers Review</a></li>
                                <li><a href="{{route('onlinePayment')}}">Online Payment</a></li>
                                @foreach ($dashboard_pages->where('aboutus', 1) as $page)
                                    <li><a href="{{route('resolvepath.show',$page->slug)}}">{{ $page->title }}</a></li>
                                @endforeach

                            </ul>
                        </li>
                        <li><a href="{{ route('contactUS') }}">Contact Us</a></li>

        <!--
                        <li class="menu-has-children"><a href="">Pages</a>
                            <ul>
                                <li><a href="elements.html">Elements</a></li>
                                <li class="menu-has-children"><a href="">Level 2 </a>
                                    <ul>
                                        <li><a href="#">Item One</a></li>
                                        <li><a href="#">Item Two</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->

                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </div>
    </header>
    <!-- #header -->
    <!-- ========== End of Header ========== -->