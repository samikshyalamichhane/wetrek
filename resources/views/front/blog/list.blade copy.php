@extends('front.layouts.app')

@section('content')

    <!-- ===== MAIN ===== -->
    <main class="bg-light toppadd main">
        <div class="mainpart pb-5">
            <div class="container">
                <div class="row">
                    <div class="pt-4 col-lg-9">
                        <h4 class="font-weight-bold title">Blog</h4>
                        <hr>
                        <ul class="mt-4 mb-0 list-unstyled row">
                            @foreach($details as $data)
                                <div class="mb-3 col-6 col-md-6">
                                    <div class="overflow-hidden bg-white rounded shadow-sm">
                                        <figure class="mb-0 text-center bg-light position-relative">
                                            <a href="{{route('blogDetails',$data->slug)}}">
                                                <img width="500" height="350" src="{{asset('images/listing/'.$data->banner_image)}}" class="img-fluid w-100 wp-post-image" alt="Those small eyes of Himalayan kids looking at you while passing through their village Manang Annapurna region." loading="lazy">
                                            </a>
                                        </figure>
                                        <div class="p-3 text-center p-lg-4 blogtext position-relative">
                                            <h5 class="pt-3 position-relative">
                                                <a href="{{route('blogDetails',$data->slug)}}" class="mb-3 d-block">{{$data->title}}</a>
                                            </h5>
                                            <p class="mb-0 position-relative">{{$data->short_description}}</p>
                                            <div class="wave"></div>
                                        </div>
                                        <a href="{{route('blogDetails',$data->slug)}}" class="p-3 mb-0 text-center border-top d-block h5 btn-more">Read More <i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            @endforeach
                            
                        </ul>
                        <div class="clearfix w-100">
                            <nav aria-label="...">
                                <ul class="my-4 pagination pagination-md">
                                    {{$details->links()}}
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <aside class="py-5 col-lg-3 mx-auto">
                        <div id="sidebar" class="stickthis sidebar">
                            {{-- <div class="mb-4 bg-white shadow-sm">
                                <h4 class="p-3 mb-0 text-white bg-heading">Activities</h4>
                                <div class="p-3">
                                    <ul id="menu-sidebar-menu" class="mb-0 list-unstyled side-links">
                                        <li class="menu-item">
                                            <a href="#">Trekking and Hiking</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">Adventure Activities</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">Tours</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">Nature and Wildlife</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">Latest Blog</a>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}

                            <div class="mb-4 bg-white shadow-sm">
                                <h4 class="p-3 mb-0 text-white bg-heading">Any Questions?</h4>
                                <div class="p-3">
                                    @if(session('message'))
                                        <div class="alert alert-info alert-dismissible" id="successMessage">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            {{session('message')}}
                                        </div>
                                    @endif
                                    <form method="post" action="{{route('blogEnquirySave')}}" class="sidebar-form">
                                        @csrf
                                        <input type="hidden" name="type" value="enquiry">

                                        <div class="row">
                                            <div class="col-md-6 col-lg-12 form-group">
                                                <span class="form-group-wrap">
                                                    <input type="text" name="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Your Name*" required="required">
                                                </span>
                                            </div>
                                            <div class="col-md-6 col-lg-12 form-group">
                                                <span class="form-group-wrap">
                                                    <input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" aria-required="true" aria-invalid="false" placeholder="Email Address*" required="required">
                                                </span>
                                            </div>
                                            <div class="col-md-6 col-lg-12 form-group">
                                                <span class="form-group-wrap">
                                                    <input type="text" name="subject" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Your Subject*" required="required">
                                                </span>
                                            </div>
                                            <div class="col-md-6 col-lg-12 form-group">
                                                <span class="form-group-wrap">
                                                    <textarea name="message" cols="40" rows="7" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Message"></textarea>
                                                </span>
                                            </div>
                                            <div class="col-lg-12 form-group">
                                                <input type="submit" value="Submit" class="wpcf7-form-control wpcf7-submit btn btn-submit">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </main>
    <!-- ===== EMD MAIN ===== -->

@endsection