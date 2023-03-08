@extends('admin.layouts.app')

@section('page_title')
Dashboard
@endsection

@section('content')

<div class="page-content fade-in-up">
    <form method="post" action="{{route('setting.save', $detail->id)}}" enctype="multipart/form-data">
        {{csrf_field()}}
        @if($siteSettingModule['edit_access']==1 || $siteSettingModule['full_access']==1)
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">SEO Details</div>

                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <!-- <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(41px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item">option 1</a>
                                        <a class="dropdown-item">option 2</a>
                                    </div> -->
                        </div>
                    </div>
                    @include('admin.layouts._partials.messages.info')
                    <div class="ibox-body" style="display:none;">

                        <!-- <div class="form-group">
                                <label>Page Title</label>
                                <input class="form-control" type="text" name="page_title" value="{{$detail->page_title}}" placeholder="Enter Page Title">
                            </div> -->

                        <div class="form-group">
                            <label>Meta Title</label>
                            <input class="form-control" type="text" name="meta_title" value="{{$detail->meta_title}}" placeholder="Enter Meta Title">
                        </div>

                        <div class="form-group">
                            <label>Meta Description</label>
                            <input class="form-control" type="text" value="{{$detail->meta_description}}" name="meta_description" placeholder="Enter Meta Description">
                        </div>

                        <div class="form-group">
                            <label>Keywords</label>
                            <input class="form-control" type="text" value="{{$detail->keyword}}" name="keyword" placeholder="Enter Keywords">
                        </div>

                        <div class="form-group">
                            <label>Canonical Url </label>
                            <input class="form-control" type="text" value="{{$detail->canonical_url}}" name="canonical_url" placeholder="Enter canonical url">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Who We Are</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body" style="display:none;">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Who We Are Page Banner Image Alt Tag</label>
                                <input class="form-control" type="text" name="whoweare_banner_alt" value="{{$detail->whoweare_banner_alt}}" placeholder="Enter Alt Tag">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Who We Are Page Banner Image</label>
                                <input type="file" id="fileUpload" name="whoweare_banner" value="{{$detail->whoweare_banner}}" class="form-control">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder">
                                        @if($detail->whoweare_banner)
                                        <img src="{{asset('images/main/'.$detail->whoweare_banner)}}" alt="" class="thumb-image" height="120px" width="120px">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>First Heading</label>
                            <input class="form-control" type="text" name="title1" value="{{$detail->title1}}" placeholder="We Trek is a Top quality tour operation in Nepal.">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="title2" rows="3" cols="80">{{$detail->title2}}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>First Image Alt Tag</label>
                                <input class="form-control" type="text" name="sqt_image1_alt" value="{{$detail->sqt_image1_alt}}" placeholder="Enter Alt Tag">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>First Image</label>
                                <input type="file" id="fileUpload" name="sqt_image1" value="{{$detail->sqt_image1}}" class="form-control">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder">
                                        @if($detail->sqt_image1)
                                        <img src="{{asset('images/main/'.$detail->sqt_image1)}}" alt="" class="thumb-image" height="120px" width="120px">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Second Image Alt Tag</label>
                                <input class="form-control" type="text" name="sqt_image2_alt" value="{{$detail->sqt_image2_alt}}" placeholder="Enter Alt Tag">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Second Image</label>
                                <input type="file" id="fileUpload" name="sqt_image2" value="{{$detail->sqt_image2}}" class="form-control">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder">
                                        @if($detail->sqt_image2)
                                        <img src="{{asset('images/main/'.$detail->sqt_image2)}}" alt="" class="thumb-image" height="120px" width="120px">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">About Us</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body" style="display:none;">
                        <div class="form-group">
                            <label>Sub-title Aboutus (Home Page)</label>
                            <input class="form-control" type="text" name="aboutus_subtitle_home" value="{{$detail->aboutus_subtitle_home}}" placeholder="We Trek is a Top quality tour operation in Nepal.">
                        </div>
                        <div class="form-group">
                            <label>Description Aboutus (Home Page)</label>
                            <textarea class="form-control" name="aboutus_description_home" rows="3" cols="80">{{$detail->aboutus_description_home}}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Side Image(Home Page ) Alt Tag</label>
                                <input class="form-control" type="text" name="aboutus_side_image_home_alt" value="{{$detail->aboutus_side_image_home_alt}}" placeholder="Enter Alt Tag">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="col-md-12 col-form-label">Side Image(Home Page )</label>
                                <div class="col-md-12 col-form-label">
                                    <div class="row">
                                        <div class="col-6 colxs-12">
                                            <div class="form-check checkbox">
                                                <input type="file" name="aboutus_side_image_home" class="form-control" onchange="aboutus_side_image_homePreview()">
                                                <img id="aboutus_side_image_home" src="{{asset('images/main/'. $detail->aboutus_side_image_home)}}" width="100px" height="100px" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Home Page (Sub-Titles)</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body" style="display:none;">
                        <div class="form-group">
                            <label>Contact Us Page Sub-tile</label>
                            <textarea class="form-control" name="contactus_description" rows="3" cols="80">{{$detail->contactus_description}}</textarea>
                        </div>
                    </div>
                    <div class="ibox-body" style="display:none;">
                        <div class="form-group">
                            <label>Package Listing Page Sub-tile</label>
                            <textarea class="form-control" name="destination_description" rows="3" cols="80">{{$detail->destination_description}}</textarea>
                        </div>
                    </div>
                    <div class="ibox-body" style="display:none;">
                        <div class="form-group">
                            <label>Team Page Sub-title</label>
                            <textarea class="form-control" name="team_description" rows="3" cols="80">{{$detail->team_description}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Social Media Links</div>

                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <!-- <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(41px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item">option 1</a>
                                        <a class="dropdown-item">option 2</a>
                                    </div> -->
                        </div>
                    </div>
                    <!-- @include('admin.layouts._partials.messages.info') -->
                    <div class="ibox-body" style="display:none;">

                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Facebook Link</label>
                                <input class="form-control" type="text" value="{{$detail->facebook}}" name="facebook" placeholder="Ente Facebook Link">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Instagram Link</label>
                                <input class="form-control" type="text" value="{{$detail->instagram}}" name="instagram" placeholder="Ente Instagram Link">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>WhatsApp Link</label>
                                <input class="form-control" type="text" value="{{$detail->whatsapp}}" name="whatsapp" placeholder="Ente whatsApp number">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Youtube Link</label>
                                <input class="form-control" type="text" value="{{$detail->youtube}}" name="youtube" placeholder="Enter Youtube Link">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Twitter Link</label>
                                <input class="form-control" type="text" value="{{$detail->twitter}}" name="twitter" placeholder="Enter Twitter Link">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Linkedin Link</label>
                                <input class="form-control" type="text" value="{{$detail->linkedin}}" name="linkedin" placeholder="Enter Linkedin Link">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Pinterest Link</label>
                                <input class="form-control" type="text" value="{{$detail->pinterest}}" name="pinterest" placeholder="Enter Pinterest Link">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Banners and Icons</div>

                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <!-- <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(41px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item">option 1</a>
                                        <a class="dropdown-item">option 2</a>
                                    </div> -->
                        </div>
                    </div>

                    <div class="ibox-body" style="display:none;">

                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Logo Alt Tag</label>
                                <input class="form-control" type="text" name="logo_alt" value="{{$detail->logo_alt}}" placeholder="Enter Alt Tag">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="col-md-12 col-form-label">Logo</label>
                                <div class="col-md-12 col-form-label">
                                    <div class="row">
                                        <div class="col-6 colxs-12">
                                            <div class="form-check checkbox">
                                                <input type="file" name="logo" class="form-control" onchange="logoPreview()">
                                                <img id="logo" src="{{ $detail->logoUrl() }}" width="100px" height="100px" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>FavIcon Alt Tag</label>
                                <input class="form-control" type="text" name="favicon_alt" value="{{$detail->favicon_alt}}" placeholder="Enter Alt Tag">
                            </div>

                            <div class="col-sm-6 form-group">
                                <label class="col-md-12 col-form-label">Favicon</label>
                                <div class="col-md-12 col-form-label">
                                    <div class="row">
                                        <div class="col-6 colxs-12">
                                            <div class="form-check checkbox">
                                                <input type="file" name="favicon" class="form-control" onchange="faviconPreview()">
                                                <img id="favicon" src="{{asset('images/main/'. $detail->favicon)}}" width="100px" height="100px" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Team Banner Alt Tag</label>
                                <input class="form-control" type="text" name="team_banner_image_alt" value="{{$detail->team_banner_image_alt}}" placeholder="Enter Alt Tag">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="col-md-12 col-form-label">Team Page Banner Image</label>
                                <div class="col-md-12 col-form-label">
                                    <div class="row">
                                        <div class="col-6 colxs-12">
                                            <div class="form-check checkbox">
                                                <input type="file" name="team_banner_image" class="form-control" onchange="team_banner_imagePreview()">
                                                <img id="team_banner_image" src="{{asset('images/main/'. $detail->team_banner_image)}}" width="100px" height="100px" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Blog Banner Alt Tag</label>
                                <input class="form-control" type="text" name="blog_banner_alt" value="{{$detail->blog_banner_alt}}" placeholder="Enter Alt Tag">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="col-md-12 col-form-label">Blog Banner</label>
                                <div class="col-md-12 col-form-label">
                                    <div class="row">
                                        <div class="col-6 colxs-12">
                                            <div class="form-check checkbox">
                                                <input type="file" name="blog_banner" class="form-control" onchange="blog_bannerPreview()">
                                                <img id="blog_banner" src="{{asset('images/main/'. $detail->blog_banner)}}" width="100px" height="100px" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Contact Banner Alt Tag</label>
                                <input class="form-control" type="text" name="contactus_banner_image_alt" value="{{$detail->contactus_banner_image_alt}}" placeholder="Enter Alt Tag">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Contact Image Alt Tag</label>
                                <input class="form-control" type="text" name="contactus_image_alt" value="{{$detail->contactus_image_alt}}" placeholder="Enter Alt Tag">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="col-md-12 col-form-label">Contactus Side Image</label>
                                <div class="col-md-12 col-form-label">
                                    <div class="row">
                                        <div class="col-6 colxs-12">
                                            <div class="form-check checkbox">
                                                <input type="file" name="contactus_image" class="form-control" onchange="contactus_imagePreview()">
                                                <img id="contactus_image" src="{{asset('images/main/'. $detail->contactus_image)}}" width="100px" height="100px" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="col-md-12 col-form-label">Contactus Banner image</label>
                                <div class="col-md-12 col-form-label">
                                    <div class="row">
                                        <div class="col-6 colxs-12">
                                            <div class="form-check checkbox">
                                                <input type="file" name="contactus_banner_image" class="form-control" onchange="contactus_banner_imagePreview()">
                                                <img id="contactus_banner_image" src="{{asset('images/main/'. $detail->contactus_banner_image)}}" width="100px" height="100px" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Testimonial Image Alt Tag</label>
                                <input class="form-control" type="text" name="testimonial_banner_image_alt" value="{{$detail->testimonial_banner_image_alt}}" placeholder="Enter Alt Tag">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Testimonial Page Background Image</label>
                                <input class="form-control" type="file" name="testimonial_banner_image">
                                @if($detail->testimonial_banner_image)
                                <img src="{{asset('images/main/'. $detail->testimonial_banner_image)}}" style="margin-top:12px; margin-bottom:12px;" height="120px" width="120px" alt="">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Nepal Address</div>

                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        </div>
                    </div>

                    <div class="ibox-body" style="display:none;">

                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Location</label>
                                <input class="form-control" type="text" name="nepal_location" value="{{$detail->nepal_location}}" placeholder="Enter Nepal Location">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Cell Number</label>
                                <input class="form-control" type="text" name="nepal_cell" value="{{$detail->nepal_cell}}" placeholder="Enter Cell Number">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Office Phone</label>
                                <input class="form-control" type="text" name="nepal_office_phone" value="{{$detail->nepal_office_phone}}" placeholder="Enter Office Phone Number">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Another Office Phone</label>
                                <input class="form-control" type="text" name="nepal_office_phone_1" value="{{$detail->nepal_office_phone_1}}" placeholder="Enter Office Phone Number">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" name="nepal_email" value="{{$detail->nepal_email}}" placeholder="Enter Email">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Australia Address</div>

                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <!-- <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(41px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item">option 1</a>
                                        <a class="dropdown-item">option 2</a>
                                    </div> -->
                        </div>
                    </div>

                    <div class="ibox-body" style="display:none;">

                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Location</label>
                                <input class="form-control" type="text" name="australia_location" value="{{$detail->australia_location}}" placeholder="Enter australia Location">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Contact Person</label>
                                <input class="form-control" type="text" name="australia_contact" value="{{$detail->australia_contact}}" placeholder="Enter australia Contact Person">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Cell Number</label>
                                <input class="form-control" type="text" name="australia_cell" value="{{$detail->australia_cell}}" placeholder="Enter Cell Number">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Office Phone</label>
                                <input class="form-control" type="text" name="australia_office_phone_1" value="{{$detail->australia_office_phone_1}}" placeholder="Enter Office Phone Number">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Another Office Phone</label>
                                <input class="form-control" type="text" name="australia_office_phone_2" value="{{$detail->australia_office_phone_2}}" placeholder="Enter Office Phone Number">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" name="australia_email" value="{{$detail->australia_email}}" placeholder="Enter Email">
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Another Email</label>
                                <input class="form-control" type="text" name="australia_email_1" value="{{$detail->australia_email_1}}" placeholder="Enter Email">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Site Setting</div>

                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <!-- <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(41px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item">option 1</a>
                                        <a class="dropdown-item">option 2</a>
                                    </div> -->
                        </div>
                    </div>
                    <!-- @include('admin.layouts._partials.messages.info') -->
                    <div class="ibox-body" style="">

                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Site Name</label>
                                <input class="form-control" type="text" name="site_name" value="{{$detail->site_name}}" placeholder="Enter Site name">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label>Google Map</label>
                                <input class="form-control" type="text" value="{{$detail->googlemap}}" name="googlemap" placeholder="Google Map Link">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endif
    </form>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {

        $("#fileUpload").on('change', function() {
            if (typeof(FileReader) != "undefined") {
                var image_holder = $("#image-holder");
                // $("#image-holder").siblings().remove();
                $("#image-holder").children().remove();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image",
                        "width": '50%'
                    }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("This browser does not support FileReader.");
            }
        });

        $("#fileUpload1").on('change', function() {

            if (typeof(FileReader) != "undefined") {

                var image_holder = $("#image-holder1");

                // $("#image-holder").siblings().remove();

                $("#image-holder1").children().remove();

                var reader = new FileReader();
                reader.onload = function(e) {

                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image",
                        "width": '50%'
                    }).appendTo(image_holder);

                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("This browser does not support FileReader.");
            }
        });

        $("#fileUpload2").on('change', function() {

            if (typeof(FileReader) != "undefined") {

                var image_holder = $("#image-holder2");

                // $("#image-holder").siblings().remove();

                $("#image-holder2").children().remove();

                var reader = new FileReader();
                reader.onload = function(e) {

                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image",
                        "width": '50%'
                    }).appendTo(image_holder);

                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("This browser does not support FileReader.");
            }

        });

    });
</script>
{{-- //CK editor --}}
<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<?php $name = ['vacation_detail', 'package_date_price_description', 'travelwithus_detail', 'lodging', 'fooding', 'title2', 'title4', 'sqt_description', 'ps_description', 'whyus_title2', 'whyus_title4', 'whyus_sqt_description', 'whyus_ps_description', 'description', 'travelStyle_description', 'classicVacation_description', 'upcoming_description', 'best_seller_description', 'pick_travelStyle_description', 'adventure_roadTrip_description', 'our_destinations_description', 'traveler_reviews_description', 'newslatter_description', 'contactus_description', 'aboutus_description', 'travelGuide_description', 'destination_description', 'blog_description', 'aboutus_description_home', 'recommanded_description']; ?>
@foreach($name as $data)
@include('admin.layouts._partials.ckdynamic', ['name' => $data])
@endforeach
{{-- End ck editor --}}



{{-- New image holder CV --}}
<script>
    function privacy_policy_bannerPreview() {
        privacy_policy_banner.src = URL.createObjectURL(event.target.files[0]);
    }

    function travel_term_bannerPreview() {
        travel_term_banner.src = URL.createObjectURL(event.target.files[0]);
    }

    function blog_bannerPreview() {
        blog_banner.src = URL.createObjectURL(event.target.files[0]);
    }

    function traveler_review_bannerPreview() {
        traveler_review_banner.src = URL.createObjectURL(event.target.files[0]);
    }

    function contactus_imagePreview() {
        contactus_image.src = URL.createObjectURL(event.target.files[0]);
    }

    function contactus_banner_imagePreview() {
        contactus_banner_image.src = URL.createObjectURL(event.target.files[0]);
    }

    function team_banner_imagePreview() {
        team_banner_image.src = URL.createObjectURL(event.target.files[0]);
    }

    function logoPreview() {
        logo.src = URL.createObjectURL(event.target.files[0]);
    }

    function faviconPreview() {
        favicon.src = URL.createObjectURL(event.target.files[0]);
    }

    function travelStyle_imagePreview() {
        travelStyle_image.src = URL.createObjectURL(event.target.files[0]);
    }


    function classicVacation_imagePreview() {
        classicVacation_image.src = URL.createObjectURL(event.target.files[0]);
    }

    function aboutus_imagePreview() {
        aboutus_image.src = URL.createObjectURL(event.target.files[0]);
    }

    function aboutus_side_image_homePreview() {
        aboutus_side_image_home.src = URL.createObjectURL(event.target.files[0]);
    }

    function travelGuide_imagePreview() {
        travelGuide_image.src = URL.createObjectURL(event.target.files[0]);
    }

    function destination_banner_imagePreview() {
        destination_banner_image.src = URL.createObjectURL(event.target.files[0]);
    }

    //We accept
    function wa_image1Preview() {
        wa_image1.src = URL.createObjectURL(event.target.files[0]);
    }

    function wa_image2Preview() {
        wa_image2.src = URL.createObjectURL(event.target.files[0]);
    }

    function wa_image3Preview() {
        wa_image3.src = URL.createObjectURL(event.target.files[0]);
    }

    function wa_image4Preview() {
        wa_image4.src = URL.createObjectURL(event.target.files[0]);
    }
</script>


@endpush