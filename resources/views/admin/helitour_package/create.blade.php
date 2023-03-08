@extends('admin.layouts.app')

@push('styles')
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


    <form method="post" action="{{route('helitourpackage.store')}}" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">SEO Details</div>

                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                    class="fa fa-ellipsis-v"></i></a>

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
                            <div class="form-group col-md-6">
                                <label>Page Title</label>
                                <input class="form-control" type="text" name="page_title" value=""
                                    placeholder="Enter Page Title">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Meta Title</label>
                                <input class="form-control" type="text" name="meta_title"
                                    placeholder="Enter Meta Title">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Meta Description</label>
                                <input class="form-control" type="text" value="" name="meta_description"
                                    placeholder="Enter Meta Description">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Keywords</label>
                                <input class="form-control" type="text" value="" name="keyword"
                                    placeholder="Enter Keywords">
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
                        <div class="ibox-title">Heli Tour Package Create</div>

                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                    class="fa fa-ellipsis-v"></i></a>

                        </div>
                    </div>

                    <div class="ibox-body" style="">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Package Name</label>
                                <input class="form-control" type="text" name="package_name"
                                    value="{{old('package_name')}}" placeholder="Enter Package Name">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Select Destination</label>
                                <select name="destination_id" class="form-control">
                                    <option value="">-- select one --</option>
                                    @foreach($destinations as $desti)
                                        <option value="{{$desti->id}}">{{$desti->country_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Selct Activity</label>
                                <select name="activity_id" class="form-control">
                                    <option value="">-- select one --</option>
                                    @foreach($activities as $activity)
                                        <option value="{{$activity->id}}">{{$activity->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-md-6">
                                <label>Accomodation</label>
                                <input class="form-control" type="text" name="accommodation"
                                    value="{{old('accommodation')}}" placeholder="Enter accomodation eg. Hotel/Lodge/Tea House during the trek">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Distance</label>
                                <input class="form-control" type="text" name="distance"
                                    value="{{old('distance')}}" placeholder="Enter Distance eg. lukla-EBC-Lukla(130km/80miles)">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Slug</label>
                                <input class="form-control" type="text" value="{{old('slug')}}" name="slug" placeholder="Enter Slug">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Start Point</label>
                                <input class="form-control" type="text" value="{{old('start_point')}}" name="start_point" placeholder="Enter Start Point Eg. Kathmandu">
                            </div>

                            <div class="form-group col-md-6">
                                <label>End Point</label>
                                <input class="form-control" type="text" value="{{old('end_point')}}" name="end_point" placeholder="Enter Start Point Eg. Kathmandu">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Days And Nights (eg. 3 Nights 4 Days)</label>
                                <input class="form-control" type="text" value="{{old('days_and_nights')}}" name="days_and_nights" placeholder="Enter Days And Nights (eg. 3 Nights 4 Days)">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Max Altitude</label>
                                <input class="form-control" type="text" value="{{old('max_altitude')}}" name="max_altitude" placeholder="Enter Max. Altitude Eg. 5,555M at Kalapatthar">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Meals Include </label>
                                <input class="form-control" type="text" value="{{old('meals_include')}}" name="meals_include" placeholder="Enter Start Point Eg. (Breakfast, Lunch & Dinner) during the trek">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Group Size</label>
                                <input class="form-control" type="text" value="{{old('group_size')}}" name="group_size" placeholder="Enter Group Size Eg. 2-30">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Nature of Trek</label>
                                <input class="form-control" type="text" value="{{old('nature_of_trek')}}" name="nature_of_trek" placeholder="Enter Nature of Trek Eg. Lodge to Lodge Trekking">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Best Season</label>
                                <input class="form-control" type="text" value="{{old('best_season')}}" name="best_season" placeholder="Enter Best Season Eg. Feb, Mar, Apr, May, une, Sept, Oct, Nov & Dec">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Trip Code</label>
                                <input class="form-control" type="text" value="{{old('trip_code')}}" name="trip_code" placeholder="Enter Trip Code Eg. DWTTK01">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Price</label>
                                <input class="form-control" type="text" value="{{old('price')}}" name="price" placeholder="Enter Price Eg. 2000">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Discount Price</label>
                                <input class="form-control" type="text" value="{{old('discount_price')}}" name="discount_price" placeholder="Enter Discount Price Eg. 15000">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Activity Per Day</label>
                                <input class="form-control" type="text" value="{{old('activity_per_day')}}" name="activity_per_day" placeholder="Enter Activity Per Day Eg. Approximately 4-6 hrs walking">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Transportation </label>
                                <input class="form-control" type="text" value="{{old('transportation')}}" name="transportation" placeholder="Enter Transportation  Eg. Domestic Flight (KTM-Lukla-KTM) and private vehicle">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Grade </label>
                                <input class="form-control" type="text" value="{{old('grade')}}" name="grade" placeholder="Enter Grade  Eg. Challenging">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label>Package Image</label>
                                <input id="fileUpload" class="form-control" type="file" name="image">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Package PDF</label>
                                <input id="package_pdf" class="form-control" type="file" name="package_pdf">
                                {{-- <div id="wrapper" class="mt-2">
                                    <div id="image-holder">
                                    </div>
                                </div> --}}
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="4"
                                    cols="80">{{old('description')}}</textarea>
                            </div>

                        </div>

                        

                        <div class="row">
                            <div class="check-list col-md-2">
                                <label class="ui-checkbox ui-checkbox-primary">
                                    <input name="published" type="checkbox">
                                    <span class="input-span"></span>Published</label>
                            </div>
                            <div class="check-list col-md-2">
                                <label class="ui-checkbox ui-checkbox-primary">
                                    <input name="trip_of_the_month" type="checkbox" onclick="return confirm('Are you sure you want to change Trip OF The Month?')">
                                    <span class="input-span"></span>Trip of the month</label>
                            </div>
                            <div class="check-list col-md-2">
                                <label class="ui-checkbox ui-checkbox-primary">
                                    <input name="popular_tours" type="checkbox">
                                    <span class="input-span"></span>Popular Tours</label>
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

<?php $name = ['overview', 'trip_highlights', 'outline_itinerary', 'includes', 'excludes', 'hotels', 'terms_and_conditions', 'payment_and_cancellation', 'trip_extension', 'notes']; ?>

@push('scripts')
<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>

@include('admin.layouts._partials.imagepreview')

@foreach($name as $data)
@include('admin.layouts._partials.ckdynamic', ['name' => $data])
@endforeach





@endpush