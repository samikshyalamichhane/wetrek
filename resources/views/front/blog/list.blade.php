@extends('front.layouts.app')
<title>WeTrek Nepal| Blogs</title>
@section('content')

<!-- breadcrumb area start -->
<div class="breadcrumb-area jarallax" style="background-image:url({{ $dashboard_settings->blog_bannerUrl() }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">Blog</h1>
                    <ul class="page-list">
                        <li><a href="{{route('indexHome')}}">Home</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area End -->

<!-- blog area start -->
<div class="blog-area pd-top-120 pd-bottom-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row justify-content-center">
                    @foreach($details as $blog)
                    <div class="col-lg-6 col-md-6">
                        <div class="single-blog">
                            <div class="thumb">
                                <img src="{{asset('/images/thumbnail/' . $blog->image)}}" alt="blog">

                            </div>
                            <div class="single-blog-details">
                                <p class="date">{{ $blog->created_at->format('d F Y') }}</p>
                                <h4 class="title"><a href="{{route('blogDetails',$blog->slug)}}">{{$blog->title}}</a></h4>
                                <p class="content">{!!$blog->short_description!!}</p>
                                <a class="btn-read-more" href="{{route('blogDetails',$blog->slug)}}"><span>Read More<i class="la la-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="sidebar-area sidebar-area-4">

                    <!-- <div class="widget widget_categories">
                            <h2 class="widget-title">Category</h2>
                            <ul>
                                <li><a href="#">Software</a> 33</li>
                                <li><a href="#">App Landing</a> 81</li>
                                <li><a href="#">Saas Landing</a> 12</li>
                                <li><a href="#">Design Studio</a> 17</li>
                                <li><a href="#">Business Studio</a> 21</li>
                                <li><a href="#">Product Showcase</a> 62</li>
                            </ul>
                        </div> -->
                    <div class="widget widget-recent-post">
                        <h2 class="widget-title">Recent Post</h2>
                        <ul>
                            @foreach($relatedBlogs as $blog)
                            <li>
                                <div class="media">
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
                    <!-- <div class="widget widget_tag_cloud">
                            <h2 class="widget-title">Tags</h2>
                            <div class="tagcloud">
                                <a href="#">Adbeger</a>
                                <a href="#">Religion</a>
                                <a href="#">Relax</a>
                                <a href="#">Nature</a>
                                <a href="#">Descover</a>
                            </div>
                        </div> -->

                </aside>
            </div>
        </div>
    </div>
</div>
<!-- blog area End -->

@endsection

@push('scripts')
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="application/javascript">
    $(document).ready(function() {

        $('#title').on('keyup', function() {
            var title = $('#title').val();
            if (title.length >= 2) {
                $.ajax({
                    type: "GET",
                    url: '/search-on-key-up',
                    data: {
                        title: title,
                    },
                    success: function(response) {
                        $('.searched_title_options').empty()
                        $.each(response.data, function(key, blog) {
                            $('.searched_title_options').append(
                                `<a href="/blog/${blog.slug}">${blog.title}</a> <br/>`
                            )
                        });

                    }
                });
            }

        });

        $('#title').on('keydown', function() {
            var title = $('#title').val();
            if (title.length <= 2) {
                $.ajax({
                    type: "GET",
                    url: '/search-on-key-up',
                    data: {
                        title: title,
                    },
                    success: function(response) {
                        $('.searched_title_options').empty()
                        // $.each(response.data, function(key, package) {
                        //     $('.searched_title_options').append(
                        //         `<a href="/packages/${package.slug}" target="_blank">${package.package_name}</a> <br/>`
                        //     )
                        // });


                    }
                });
            }

        });

    });
</script>
@endpush