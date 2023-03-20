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


    <form method="post" action="{{route('package.store')}}" enctype="multipart/form-data">
        {{csrf_field()}}

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
                            <!--    <input class="form-control" type="text" name="page_title" value=""-->
                            <!--        placeholder="Enter Page Title">-->
                            <!--</div>-->
                            <div class="form-group col-md-6">
                                <label>Meta Title</label>
                                <input class="form-control" type="text" name="meta_title" placeholder="Enter Meta Title">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Meta Description</label>
                                <input class="form-control" type="text" value="" name="meta_description" placeholder="Enter Meta Description">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Keywords</label>
                                <input class="form-control" type="text" value="" name="keyword" placeholder="Enter Keywords">
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
                        <div class="ibox-title">Package Create</div>

                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                        </div>
                    </div>

                    <div class="ibox-body" style="">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Package Name</label>
                                <input class="form-control" type="text" name="package_name" value="{{old('package_name')}}" placeholder="Enter Package Name">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Select Destination Type</label>
                                <select name="destinationtype_id" class="form-control">
                                    <option value="">-- select one --</option>
                                    @foreach($destinationTypes as $desti)
                                    <option value="{{$desti->id}}">{{$desti->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-6 col-sm-6 form-group">
                                <label><strong>Category</strong></label>
                                <div class="input-group">
                                    <select name="category_id" id="category_id" class="form-control custom-select">
                                        <option value="">-- select one --</option>
                                        @foreach($categories as $desti)
                                        <option value="{{$desti->id}}">{{$desti->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 form-group d-none" id="sub_cat_div">
                                <label><strong>Region</strong></label>
                                <select class="form-control custom-select " id="region_id" name="region_id">
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Duration(eg. 3 Nights 4 Days)</label>
                                <input class="form-control" type="text" value="{{old('days_and_nights')}}" name="days_and_nights" placeholder="Enter Days And Nights (eg. 3 Nights 4 Days)">
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
                                <label>Group Size</label>
                                <input class="form-control" type="text" value="{{old('group_size')}}" name="group_size" placeholder="Enter Group Size Eg. 2-30">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Best Month</label>
                                <input class="form-control" type="text" value="{{old('best_season')}}" name="best_season" placeholder="Enter Best Season Eg. Feb, Mar, Apr, May, une, Sept, Oct, Nov & Dec">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Altitude</label>
                                <input class="form-control" type="text" value="{{old('altitude')}}" name="altitude" placeholder="Enter Altitude">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Activities</label>
                                <input class="form-control" type="text" value="{{old('activities')}}" name="activities" placeholder="Enter activities">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Price</label>
                                <input class="form-control" type="text" value="{{old('price')}}" name="price" placeholder="Enter Price Eg. 2000">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Trip Grading </label>
                                <input class="form-control" type="text" value="{{old('grade')}}" name="grade" placeholder="Enter Grade  Eg. Challenging">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Image</label>
                                <input id="fileUpload" class="form-control" type="file" name="image">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder">
                                    </div>
                                </div>
                            </div>

                            <!--<div class="form-group col-md-6">-->
                            <!--    <label>Map Image</label>-->
                            <!--    <input id="fileUpload" class="form-control" type="file" name="map_image">-->
                            <!--    <div id="wrapper" class="mt-2">-->
                            <!--        <div id="image-holder">-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="4" cols="80">{{old('description')}}</textarea>
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
                                    <input name="best_sells" type="checkbox">
                                    <span class="input-span"></span>Our Best Sells</label>
                            </div>
                            <div class="check-list col-md-2">
                                <label class="ui-checkbox ui-checkbox-primary">
                                    <input name="popular_package" type="checkbox">
                                    <span class="input-span"></span>Recommended Packages</label>
                            </div>
                            <div class="check-list col-md-2">
                                <label class="ui-checkbox ui-checkbox-primary">
                                    <input name="luxury_package" type="checkbox">
                                    <span class="input-span"></span>Luxury Packages</label>
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
{{-- //CK editor --}}
<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<?php $name = ['description']; ?>
@foreach($name as $data)
@include('admin.layouts._partials.ckdynamic', ['name' => $data])
@endforeach
{{-- End ck editor --}}


@include('admin.layouts._partials.imagepreview')

<script>
    $(document).ready(function() {
        $('#category_id').change(function(e) {
            e.preventDefault();
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "/api/getregion",
                    type: "POST",
                    data: {
                        category_id: category_id
                    },

                    success: function(response) {
                        if (response.category) {
                            if (response.category.length != 0) {

                                $('#sub_cat_div').removeClass('d-none');

                                var html_options = "<option value=''>select any one</option>";
                                $.each(response.category, function(index, subcat_data) {
                                    html_options += "<option value='" + subcat_data.id +
                                        "'>" + subcat_data.name + "</option>";
                                });
                                $('#region_id').html(html_options);
                            } else {
                                $('#sub_cat_div').addClass('d-none');
                            }

                        } else {
                            $('#sub_cat_div').addClass('d-none');
                        }
                    }
                });
            } else {
                $("#subcategory_id").empty();
            }
        });

    });
</script>



@endpush