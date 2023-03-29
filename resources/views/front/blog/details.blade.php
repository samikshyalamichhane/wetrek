@extends('front.layouts.app')
@section('content')
 <!-- breadcrumb area start -->
 <div class="breadcrumb-area jarallax" style="background-image:url({{asset('/images/listing/' . $blog->image)}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="page-title">Blog Details</h1>
                        <ul class="page-list">
                            <li><a href="{{route('indexHome')}}">Home</a></li>
                            <li>Blog Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area End -->

    <!-- blog area start -->
    <div class="blog-details-area pd-top-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-blog mb-0">
                        <!--<div class="thumb">-->
                        <!--    <img src="{{asset('/images/thumbnail/' . $blog->image)}}" alt="blog">-->
                        <!--</div>-->
                        <div class="single-blog-details">
                            <p class="date mb-0">{{ $blog->created_at->format('d F Y') }}</p>
                            <h3 class="title">{{$blog->title}}</h3>
                            <p class="content mb-0"></p>
                        </div>
                    </div>
                    <!-- details-blockquote-start -->
                    {!! $blog->description !!}
                    <!-- <div class="row tag-share-area">
                        <div class="col-lg-6">
                            <span class="mr-2">Share:</span>
                            <ul class="social-icon style-two">
                                <li>
                                    <a class="facebook" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a class="twitter" href="#"><i class="fa-brands fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a class="pinterest" href="#"><i class="fa-brands fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a class="linkedin" href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                </li>
                            </ul>
                        </div>
                     
                    </div> -->
               
             
                
                  
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-area sidebar-area-4">
                       
                     
                        <div class="widget widget-recent-post">
                            <h2 class="widget-title">Recent Post</h2>
                            <ul>
                                @foreach($relatedBlogs as $blog)
                                <li>
                                    <div class="media newblogimg">
                                        <img src="{{asset('/images/thumbnail/' . $blog->image)}}" alt="widget">
                                        <div class="media-body">
                                            <span class="post-date">{{ $blog->created_at->format('d F Y') }}</span>
                                            <h6 class="title"><a href="{{route('blogDetails',$blog->slug)}}">{{$blog->title}}</a></h6>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    
                       
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- blog area End -->
@endsection


