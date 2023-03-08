@extends('admin.layouts.app')

@push('styles')
<style media="screen">
    .line {
        width: 100%;
        height: 1px;
        background-color: green;
    }
</style>
@endpush

@section('content')

<div class="page-content fade-in-up">
    <form method="post" action="{{route('pages.store')}}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Create Page</div>

                        <div class="ibox-tools">

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

                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Seo Details</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                            </div>
                        </div>
                        <div class="ibox-body" style="display: none;">

                            <div class="row">
                                <!-- <div class="col-md-6 form-group">
                                    <label>Page Title</label>
                                    <input class="form-control" name="page_title" value="{{old('page_title')}}" type="text" placeholder="Enter Page Title">
                                </div> -->

                                <div class="col-md-6 form-group">
                                    <label>Meta Title</label>
                                    <input class="form-control" name="meta_title" value="{{old('meta_title')}}" type="text" placeholder="Enter Meta Title">
                                </div>

                            </div>

                            <div class="form-group">
                                <label>Meta Description</label>
                                <input class="form-control" name="meta_description" value="{{old('meta_description')}}" type="text" placeholder="Enter Meta Description">
                            </div>

                            <div class="form-group">
                                <label>Keywords</label>
                                <input class="form-control" name="keywords" value="{{old('keywords')}}" type="text" placeholder="Enter Keywords">
                            </div>


                        </div>
                    </div>

                    <div class="line"></div>
                    <div class="ibox-body" style="">

                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" name="title" value="{{old('title')}}" type="text" placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label>Slug</label>
                            <input class="form-control" name="slug" value="{{old('slug')}}" type="text" placeholder="Enter Slug">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="8" cols="80">{{old('description')}}</textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Image</label>
                                <input id="fileUpload" class="form-control" value="{{old('image')}}" name="image" type="file">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Banner Image</label>
                                <input id="fileUpload1" class="form-control" type="file" name="banner_image" onchange="imagepreview()>
                            <div id=" wrapper1" class="mt-2">
                                <div id="image-holder1">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3 form-group check-list">
                                <label class="ui-checkbox ui-checkbox-primary">
                                    <input name="published" type="checkbox">
                                    <span class="input-span"></span>Publish</label>
                            </div>
                            <div class="col-sm-3 form-group check-list">
                                <label class="ui-checkbox ui-checkbox-primary">
                                    <input name="travel_guide" type="checkbox">
                                    <span class="input-span"></span>Show In Travel Guide</label>
                            </div>
                            <div class="col-sm-3 form-group check-list">
                                <label class="ui-checkbox ui-checkbox-primary">
                                    <input name="aboutus" type="checkbox">
                                    <span class="input-span"></span>Show In About Us</label>
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

    <pre id="output"></pre>
</div>

@endsection

@push('scripts')
@include('admin.layouts._partials.ckeditorsetting')
@include('admin.layouts._partials.imagepreview')
<script>
    function imagepreview() {
        imageframe.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

@endpush