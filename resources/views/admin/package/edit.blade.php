@extends('admin.layouts.app')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .box-destination-record {
        padding: 10px;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.4);
        width: 100%;
    }

    .border-ck {
        border: 1px solid black;
    }

    .nav-item .nav-link.active {
        color: #fff;
        font-weight: 600;
        background: #4ccdd3;
        transition: 0.5s;
    }
</style>
@endpush

@section('content')

<div class="page-content fade-in-up">

    @include('admin.package.include.topnavbar')
    @if(Session::has('message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('message') !!}</em></div>
    @endif
    <form method="post" action="{{route('package.update', $detail->id)}}" enctype="multipart/form-data">
        {{csrf_field()}}
        @method('put')
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">SEO Details</div>

                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                        </div>
                    </div>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- @include('admin.layouts._partials.messages.info') -->
                    <div class="ibox-body" style="display:none;">

                        <div class="row">
                            <!--<div class="form-group col-md-6">-->
                            <!--    <label>Page Title</label>-->
                            <!--    <input class="form-control" type="text" name="page_title" value="{{$detail->page_title}}" placeholder="Enter Page Title">-->
                            <!--</div>-->
                            <div class="form-group col-md-6">
                                <label>Meta Title</label>
                                <input class="form-control" type="text" name="meta_title" value="{{$detail->meta_title}}" placeholder="Enter Meta Title">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Meta Description</label>
                                <input class="form-control" type="text" value="{{$detail->meta_description}}" name="meta_description" placeholder="Enter Meta Description">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Keywords</label>
                                <input class="form-control" type="text" value="{{$detail->keyword}}" name="keyword" placeholder="Enter Keywords">
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
                        <div class="ibox-title">Package Edit</div>

                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                        </div>
                    </div>

                    <div class="ibox-body" style="">

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Package Name</label>
                                <input class="form-control" type="text" name="package_name" value="{{$detail->package_name}}" placeholder="Enter Package Name">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Select Destination Type</label>
                                <select name="destinationtype_id" class="form-control">
                                    <option value="">-- select one --</option>
                                    @foreach($destinationTypes as $desti)
                                    <option value="{{$desti->id}}" {{$desti->id==$detail->destinationtype_id?'selected':''}}>{{$desti->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-6 col-sm-6 form-group">
                                <label><strong>Category</strong></label>
                                <div class="input-group">
                                    <select name="category_id" id="category_id" class="form-control custom-select">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if($detail->category_id==$category->id) selected @endif>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 form-group" id="sub_cat_div">
                                <label><strong>Sub Category</strong></label>
                                <select class="form-control custom-select " id="subcategory_id" name="subcategory_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                    @foreach ($category->regions as $subcat)
                                    <option value="{{ $subcat->id }}" data-category-id="{{ $category->id }}" @if($detail->region_id==$subcat->id) selected @endif>{{ $subcat->name }}</option>
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>

                            <!-- <div class="form-group col-md-6">
                                <label>Select Region</label>
                                <select name="region_id" class="form-control">
                                    <option value="">-- select one --</option>
                                    @foreach($regions as $region)
                                    <option value="{{$region->id}}" {{$region->id==$detail->region_id?'selected':''}}>{{$region->name}}</option>
                                    @endforeach
                                </select>
                            </div> -->

                            {{-- <div class="form-group col-md-6">
                                <label>Selct Activity</label>
                                <select name="activity_id" class="form-control">
                                    <option value="">-- select one --</option>
                                    @foreach($activities as $activity)
                                        <option value="{{$activity->id}}"{{$activity->id==$detail->activity_id?'selected':''}}>{{$activity->name}}</option>
                            @endforeach
                            </select>
                        </div> --}}


                        {{-- <div class="form-group col-md-6">
                            <label>Accomodation</label>
                            <input class="form-control" type="text" name="accommodation" value="{{$detail->accommodation}}" placeholder="Enter accomodation eg. Hotel/Lodge/Tea House during the trek">
                    </div> --}}

                    {{-- <div class="form-group col-md-6">
                            <label>Distance</label>
                            <input class="form-control" type="text" name="distance" value="{{$detail->distance}}" placeholder="Enter Distance eg. lukla-EBC-Lukla(130km/80miles)">
                </div> --}}

                <div class="form-group col-md-6">
                    <label>Slug</label>
                    <input class="form-control" type="text" value="{{$detail->slug}}" name="slug" placeholder="Enter Slug">
                </div>

                <div class="form-group col-md-6">
                    <label>Start Point</label>
                    <input class="form-control" type="text" value="{{$detail->start_point}}" name="start_point" placeholder="Enter Start Point Eg. Kathmandu">
                </div>

                <div class="form-group col-md-6">
                    <label>End Point</label>
                    <input class="form-control" type="text" value="{{$detail->end_point}}" name="end_point" placeholder="Enter Start Point Eg. Kathmandu">
                </div>

                <div class="form-group col-md-6">
                    <label>Duration (eg. 3 Nights 4 Days)</label>
                    <input class="form-control" type="text" value="{{$detail->days_and_nights}}" name="days_and_nights" placeholder="Enter Days And Nights (eg. 3 Nights 4 Days)">
                </div>

                {{-- <div class="form-group col-md-6">
                                <label>Max Altitude</label>
                                <input class="form-control" type="text" value="{{$detail->max_altitude}}" name="max_altitude" placeholder="Enter Max. Altitude Eg. 5,555M at Kalapatthar">
            </div> --}}

            {{-- <div class="form-group col-md-6">
                                <label>Meals Include </label>
                                <input class="form-control" type="text" value="{{$detail->meals_include}}" name="meals_include" placeholder="Enter Start Point Eg. (Breakfast, Lunch & Dinner) during the trek">
        </div> --}}

        <div class="form-group col-md-6">
            <label>Group Size</label>
            <input class="form-control" type="text" value="{{$detail->group_size}}" name="group_size" placeholder="Enter Group Size Eg. 2-30">
        </div>

        {{-- <div class="form-group col-md-6">
                    <label>Nature of Package</label>
                    <input class="form-control" type="text" value="{{$detail->nature_of_trek}}" name="nature_of_trek" placeholder="Example: Cultural, Adventure">
</div> --}}

<div class="form-group col-md-6">
    <label>Best Month</label>
    <input class="form-control" type="text" value="{{$detail->best_season}}" name="best_season" placeholder="Enter Best Season Eg. Feb, Mar, Apr, May, une, Sept, Oct, Nov & Dec">
</div>
<div class="form-group col-md-6">
    <label>Altitude</label>
    <input class="form-control" type="text" value="{{$detail->altitude}}" name="altitude" placeholder="Enter Altitude">
</div>
<div class="form-group col-md-6">
    <label>Activities</label>
    <input class="form-control" type="text" value="{{$detail->activities}}" name="activities" placeholder="Enter activities">
</div>

{{-- <div class="form-group col-md-6">
                                <label>Trip Code</label>
                                <input class="form-control" type="text" value="{{$detail->trip_code}}" name="trip_code" placeholder="Enter Trip Code Eg. DWTTK01">
</div> --}}

<div class="form-group col-md-6">
    <label>Price</label>
    <input class="form-control" type="text" value="{{$detail->price}}" name="price" placeholder="Enter Price eg. 50000">
</div>
{{-- <div class="form-group col-md-6">
            <label>Discount Price</label>
            <input class="form-control" type="text" value="{{$detail->discount_price}}" name="discount_price" placeholder="Enter Discount Price eg. 30000">
</div> --}}

{{-- <div class="form-group col-md-6">
                                <label>Activity Per Day</label>
                                <input class="form-control" type="text" value="{{$detail->activity_per_day}}" name="activity_per_day" placeholder="Enter Activity Per Day Eg. Approximately 4-6 hrs walking">
</div> --}}

{{-- <div class="form-group col-md-6">
                                <label>Transportation </label>
                                <input class="form-control" type="text" value="{{$detail->transportation}}" name="transportation" placeholder="Enter Transportation Eg. Domestic Flight (KTM-Lukla-KTM) and private vehicle">
</div> --}}

<div class="form-group col-md-6">
    <label>Trip Grading</label>
    <input class="form-control" type="text" value="{{$detail->grade}}" name="grade" placeholder="Enter Grade  Eg. Challenging">
</div>
{{-- <div class="form-group col-md-6">
    <label>package Star</label>
    <input class="form-control" name="star" value="{{$detail->star}}" type="number" min="1" max="5" placeholder="Only 1-5">
</div> --}}

<div class="form-group col-md-6">
    <label>Image</label>
    <input id="fileUpload" class="form-control" type="file" name="image">
    <div id="wrapper" class="mt-2">
        <div id="image-holder">
            @if($detail->image)
            <img src="{{ $detail->imageUrl() }}" style="margin-top:12px; margin-bottom:12px;" height="120px" width="120px" alt="">
            @endif
        </div>
    </div>
</div>

<div class="form-group col-md-6">
    <label>Map Image</label>
    <input id="fileUpload1" class="form-control" type="file" name="map_image" onchange="imagepreview()>
    <div id=" wrapper1" class="mt-2">
    <div id="image-holder1">
        @if($detail->map_image)
        <img src="{{ $detail->mapimageUrl() }}" style="margin-top:12px; margin-bottom:12px;" height="120px" width="120px" alt="">
        @endif
    </div>
</div>
<div class="form-group col-md-6">
    <label>Upload Brochure</label>
    <input id="package_pdf" class="form-control" type="file" name="package_pdf">
    <div id="wrapper" class="mt-2">
        <div id="image-holder">
        </div>
    </div>
</div>
</div>


{{-- <div class="form-group col-md-6">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="4"
                                    cols="80">{{$detail->description}}</textarea>
</div> --}}

</div>

<div class="row">
    <div class="check-list col-md-2">
        <label class="ui-checkbox ui-checkbox-primary">
            <input name="published" type="checkbox" {{$detail->published ? 'checked' : ''}}>
            <span class="input-span"></span>Published</label>
    </div>

    {{-- <div class="check-list col-md-2">
                                <label class="ui-checkbox ui-checkbox-primary">
                                    <input name="trip_of_the_month" type="checkbox"
                                        {{$detail->trip_of_the_month ? 'checked' : ''}} onclick="return confirm('Are you sure you want to change Trip OF The Month?')">
    <span class="input-span"></span>Trip of the month</label>
</div> --}}

{{-- <div class="check-list col-md-2">
    <label class="ui-checkbox ui-checkbox-primary">
        <input name="popular_tours" type="checkbox" {{$detail->popular_tours ? 'checked' : ''}}>
<span class="input-span"></span>Popular Tours</label>
</div>

<div class="check-list col-md-2">
    <label class="ui-checkbox ui-checkbox-primary">
        <input name="upcoming_trips" type="checkbox" {{$detail->upcoming_trips ? 'checked' : ''}}>
        <span class="input-span"></span>Upcoming Trips</label>
</div> --}}

<div class="check-list col-md-2">
    <label class="ui-checkbox ui-checkbox-primary">
        <input name="best_sells" type="checkbox" {{$detail->best_sells ? 'checked' : ''}}>
        <span class="input-span"></span>Our Best Sells</label>
</div>

{{-- <div class="check-list col-md-2">
    <label class="ui-checkbox ui-checkbox-primary">
        <input name="mountain_trek" type="checkbox" {{$detail->mountain_trek ? 'checked' : ''}}>
<span class="input-span"></span>Mountain Trekking</label>
</div>
<div class="check-list col-md-2">
    <label class="ui-checkbox ui-checkbox-primary">
        <input name="peak_climbing_expeditions" type="checkbox" {{$detail->peak_climbing_expeditions ? 'checked' : ''}}>
        <span class="input-span"></span>Peak Climbing & Expeditions</label>
</div>

<div class="check-list col-md-2">
    <label class="ui-checkbox ui-checkbox-primary">
        <input name="adventure_road_trip" type="checkbox" {{$detail->adventure_road_trip ? 'checked' : ''}}>
        <span class="input-span"></span>Adventure Road Trip</label>
</div> --}}

<div class="check-list col-md-2">
    <label class="ui-checkbox ui-checkbox-primary">
        <input name="popular_package" type="checkbox" {{$detail->popular_package ? 'checked' : ''}}>
        <span class="input-span"></span>Recommended Packages</label>
</div>
<div class="check-list col-md-2">
    <label class="ui-checkbox ui-checkbox-primary">
        <input name="luxury_package" type="checkbox" {{$detail->luxury_package ? 'checked' : ''}}>
        <span class="input-span"></span>Luxury Packages</label>
</div>
</div>

<div class="box-destination-record mt-5">

    <div class="clf">

        <div class="row">

            <div class="col-md-3">

                <ul class="nav nav-tabs tabs-line-left">
                    <li class="nav-item">
                        <a class="nav-link active" href="#overview_description-1" data-toggle="tab"></i>
                            Overview</a>
                    </li>
                    {{-- <li class="nav-item">
                                                <a class="nav-link" href="#trip_highlights_description-1"
                                                    data-toggle="tab">Trip Highlights</a>
                                            </li> --}}

                    {{-- <li class="nav-item">
                                                <a class="nav-link" href="#perks_description-1" data-toggle="tab"></i>
                                                    Perks</a>
                                            </li> --}}


                    {{-- <li class="nav-item">
                                                <a class="nav-link" href="#photo_video_title-1" data-toggle="tab"></i>
                                                    Video</a>
                                            </li> --}}

                    <li class="nav-item">
                        <a class="nav-link" href="#includes_description-1" data-toggle="tab"></i>
                            Includes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#excludes_description-1" data-toggle="tab"></i>
                            Excludes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#package_description-1" data-toggle="tab"></i>
                            Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#package_gears-1" data-toggle="tab"></i>
                            Trekking Gears</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#package_info-1" data-toggle="tab"></i>
                            Helpful Info</a>
                    </li>



                    {{-- <li class="nav-item">
                                                <a class="nav-link" href="#map_title-1" data-toggle="tab"></i>
                                                    Map</a>
                                            </li> --}}
                    {{-- <li class="nav-item">
                                                <a class="nav-link" href="#trip_info_description-1" data-toggle="tab"></i>
                                                    Trip Info</a>
                                            </li> --}}
                    {{-- <li class="nav-item">
                                                <a class="nav-link" href="#faq_answer-1" data-toggle="tab"></i>
                                                    FAQ's</a>
                                            </li> --}}
                    <!--<li class="nav-item">
                                  <a class="nav-link" href="#hotels-1" data-toggle="tab"></i> Hotels</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#terms_and_conditions-1" data-toggle="tab"></i> Terms And Conditions</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#payment_and_cancellation-1" data-toggle="tab"></i> Payment And Cancellation</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#trip_extension-1" data-toggle="tab"></i> Trip Extension</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#notes-1" data-toggle="tab"></i> Trip Notes</a>
                              </li>-->

                </ul>
            </div>

            <div class="col-md-9">
                <div class="tab-content">

                    {{-- <div class="tab-pane show active border-ck" id="trip_highlights_description-1">
                                                <div class="form-group col-md-12">
                                                    <label>Trip Highlights Title</label>
                                                    <input class="form-control" type="text" name="trip_highlights_title" value="{{$detail->trip_highlights_title}}" placeholder="Enter Package Name">
                </div>
                <div class="form-group col-md-12">
                    <label>Trip Highlights Description</label>
                    <textarea class="form-control" name="trip_highlights_description" rows="8" cols="80">{{$detail->trip_highlights_description}}</textarea>
                </div>
            </div> --}}

            {{-- <div class="tab-pane border-ck" id="perks_description-1">
                                                <div class="form-group col-md-12">
                                                    <label>Perks Title</label>
                                                    <input class="form-control" type="text" name="perks_title"value="{{$detail->perks_title}}" placeholder="Enter Perks Title">
        </div>
        <div class="form-group col-md-12">
            <label>Perks Description</label>
            <textarea class="form-control" name="perks_description" rows="8" cols="80">{{$detail->perks_description}}</textarea>
        </div>
    </div> --}}

    <div class="tab-pane show active border-ck" id="overview_description-1">
        <div class="form-group col-md-12">
            <label>Overview Title</label>
            <input class="form-control" type="text" name="overview_title" value="{{$detail->overview_title}}" placeholder="Enter Overview Title">
        </div>
        <div class="form-group col-md-12">
            <label>Overview Description</label>
            <textarea class="form-control" name="overview_description" rows="8" cols="80">{{$detail->overview_description}}</textarea>
        </div>
        {{-- <div class="form-group col-md-12">
                                                    <label>Overview Highlights </label>
                                                    <textarea class="form-control" name="overview_highlights" rows="4" cols="80">{{$detail->overview_highlights}}</textarea>
    </div> --}}
</div>

{{-- <div class="tab-pane border-ck" id="photo_video_title-1">
                                                <div class="form-group col-md-12">
                                                    <label>Video Title</label>
                                                    <input class="form-control" type="text" name="photo_video_title"value="{{$detail->photo_video_title}}" placeholder="Enter Photo/Video Title">
</div>
<div class="form-group col-md-12">
    <label>Video Youtube Link</label>
    <input class="form-control" type="text" name="youtube_video_link" value="{{$detail->youtube_video_link}}" placeholder="Enter Photo/Video Link">
</div>
</div> --}}

<div class="tab-pane border-ck" id="includes_description-1">
    <div class="form-group col-md-12">
        <label>Includes Title</label>
        <input class="form-control" type="text" name="includes_title" value="{{$detail->includes_title}}" placeholder="Enter Includes Title">
    </div>
    <div class="form-group col-md-12">
        <label>Includes Description</label>
        <textarea class="form-control" name="includes_description" rows="8" cols="80">{{$detail->includes_description}}</textarea>
    </div>
</div>

<div class="tab-pane border-ck" id="excludes_description-1">
    <div class="form-group col-md-12">
        <label>Excludes Title</label>
        <input class="form-control" type="text" name="excludes_title" value="{{$detail->excludes_title}}" placeholder="Enter Excludes Title">
    </div>
    <div class="form-group col-md-12">
        <label>Excludes Description</label>
        <textarea class="form-control" name="excludes_description" rows="8" cols="80">{{$detail->excludes_description}}</textarea>
    </div>
</div>

<div class="tab-pane border-ck" id="package_description-1">
    {{-- <div class="form-group col-md-12">
                                                    <label>Includes Title</label>
                                                    <input class="form-control" type="text" name="includes_title"value="{{$detail->includes_title}}" placeholder="Enter Includes Title">
</div> --}}
<div class="form-group col-md-12">
    <label>Description</label>
    <textarea class="form-control" name="description" rows="8" cols="80">{{$detail->description}}</textarea>
</div>


</div>
<div class="tab-pane border-ck" id="package_gears-1">
    <div class="form-group col-md-12">
        <label>Trekking Gears</label>
        <textarea class="form-control" name="trekking_gears" rows="8" cols="80">{{@$detail->trekking_gears}}</textarea>
    </div>
</div>
<div class="tab-pane border-ck" id="package_info-1">
    <div class="form-group col-md-12">
        <label>Helpful Info</label>
        <textarea class="form-control" name="helpful_info" rows="8" cols="80">{{@$detail->helpful_info}}</textarea>
    </div>
</div>

{{-- <div class="tab-pane border-ck" id="map_title-1">
                                                <div class="form-group col-md-12">
                                                    <label>Map Title</label>
                                                    <input class="form-control" type="text" name="map_title"value="{{$detail->map_title}}" placeholder="Enter Map Title">
</div> --}}

</div>

{{-- <div class="tab-pane border-ck" id="trip_info_description-1">
                                                <div class="form-group col-md-12">
                                                    <label>Trip Info Title</label>
                                                    <input class="form-control" type="text" name="trip_info_title"value="{{$detail->trip_info_title}}" placeholder="Enter Trip Info Title">
</div>
<div class="form-group col-md-12">
    <label>Trip Info Description</label>
    <textarea class="form-control" name="trip_info_description" rows="8" cols="80">{{$detail->trip_info_description}}</textarea>
</div>
<div class="form-group col-md-12">
    <label>Trip Info Special Notice </label>
    <textarea class="form-control" name="trip_info_special_notes" rows="4" cols="80">{{$detail->trip_info_special_notes}}</textarea>
</div>
</div> --}}

{{-- <div class="tab-pane border-ck" id="faq_answer-1">
                                                <div class="form-group col-md-12">
                                                    <label>FAQ's Question</label>
                                                    <input class="form-control" type="text" name="faq_question"value="{{$detail->faq_question}}" placeholder="Enter FAQ's Question">
</div>
<div class="form-group col-md-12">
    <label>FAQ's Answer</label>
    <textarea class="form-control" name="faq_answer" rows="8" cols="80">{{$detail->faq_answer}}</textarea>
</div>
</div> --}}
</div>

</div>
</div>
</div>
</div>
<br>
<div class="form-group">
    <button class="btn btn-default" type="submit">Submit</button>
</div>

</div>
</div>
</div>
</div>

</form>

</div>

@endsection

<?php $name = ['trip_highlights_description', 'helpful_info', 'trekking_gears', 'perks_description', 'overview_description', 'overview_highlights', 'includes_description', 'excludes_description', 'trip_info_description', 'trip_info_special_notes', 'notes', 'description']; ?>

@push('scripts')
<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>

<!-- <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js"></script>



@include('admin.layouts._partials.imagepreview')

@foreach($name as $data)
@include('admin.layouts._partials.ckdynamic', ['name' => $data])
@endforeach
<script>
    $(document).ready(function() {
        $('.travel-style').select2({
            placeholder: "Select Travel Styles",
        });
    });
</script>
<script>
    function imagepreview() {
        imageframe.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
<script>
    $(document).ready(function() {
        // Filter subcategory
        function filterSubcategory(selectedCategoryId) {
            // let selectedCategoryId = $(this).val()
            $('#subcategory_id option').each(function() {
                if ($(this).data('category-id') == selectedCategoryId || $(this).attr('value') == '') {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        // Filter product category
        function filterProductCategory(selectedSubcategoryId) {
            $('#product_category_id option').each(function() {
                if ($(this).data('subcategory-id') == selectedSubcategoryId || $(this).attr('value') == '') {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
        // On form load
        filterSubcategory({
            {
                $detail - > category_id
            }
        });
        filterProductCategory({
            {
                $detail - > region_id
            }
        });

        $('#category_id').change(function() {
            filterSubcategory($(this).val());
            $('#subcategory_id').val('');
        });

        $('#subcategory_id').change(function() {
            filterProductCategory($(this).val());
            $('#product_category_id').val('');
        });

    });
</script>

@endpush