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


    <form method="post" action="{{route('destination.store')}}" enctype="multipart/form-data">
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
                           {{-- <div class="form-group col-md-6">
                                <label>Page Title</label>
                                <input class="form-control" type="text" name="page_title"
                                    value="{{$detail->page_title}}" placeholder="Enter Page Title">
                            </div> --}}
                            <div class="form-group col-md-6">
                                <label>Meta Title</label>
                                <input class="form-control" type="text" name="meta_title"
                                    value="{{old('meta_title')}}" placeholder="Enter Meta Title">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Meta Description</label>
                                <input class="form-control" type="text" value="{{old('meta_description')}}"
                                    name="meta_description" placeholder="Enter Meta Description">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Keywords</label>
                                <input class="form-control" type="text" value="{{old('meta_keyword')}}" name="meta_keyword"
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
                        <div class="ibox-title">Destination Country Name</div>

                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                    class="fa fa-ellipsis-v"></i></a>

                        </div>
                    </div>

                    <div class="ibox-body" style="">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Country Name</label>
                                <input class="form-control" type="text" name="country_name"
                                    value="{{old('country_name')}}" placeholder="Enter County Name">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Slug</label>
                                <input class="form-control" type="text" value="{{old('slug')}}" name="slug"
                                    placeholder="Enter Slug">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Heading Title</label>
                                <input class="form-control" type="text" name="heading_title"
                                    value="{{old('heading_title')}}" placeholder="Heading Title">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Introduction</label>
                                <textarea name="intro" class="form-control" rows="3">{{old('intro')}}</textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3">{{old('description')}}</textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Banner Image</label>
                                <input id="fileUpload" class="form-control" value="{{old('banner_image')}}" name="banner_image" type="file">
                                <div id="wrapper" class="mt-2">
                                    <div id="image-holder">
                                    </div>
                                </div>
                            </div>

                            <div class="check-list col-md-2">
                                <label class="ui-checkbox ui-checkbox-primary">
                                    <input name="published" type="checkbox">
                                    <span class="input-span"></span>Published</label>
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

<?php $name = ['intro','description']; ?>

@push('scripts')
<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>

@include('admin.layouts._partials.imagepreview')

@foreach($name as $data)
@include('admin.layouts._partials.ckdynamic', ['name' => $data])
@endforeach





@endpush