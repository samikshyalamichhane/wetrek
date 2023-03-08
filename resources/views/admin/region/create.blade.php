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
    <form method="post" action="{{route('region.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Create Region</div>

                        <div class="ibox-tools">

                        </div>
                    </div>

                    <!-- <h3>Blog Details</h3> -->
                    <div class="ibox-body" style="">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Name</label>
                                <input class="form-control" name="name" value="{{old('name')}}" type="text" placeholder="Enter Region Name">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Slug</label>
                                <input class="form-control" name="slug" value="{{old('slug')}}" type="text" placeholder="Enter Region Slug">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Select Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">-- select one --</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label>Banner Image</label>
                            <input id="fileUpload" class="form-control" value="{{old('banner_image')}}" name="banner_image" type="file">
                            <div id="wrapper" class="mt-2">
                                <div id="image-holder">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="8" cols="80">{{old('description')}}</textarea>
                        </div>


                        <div class="check-list">
                            <label class="ui-checkbox ui-checkbox-primary">
                                <input name="publish" type="checkbox">
                                <span class="input-span"></span>Publish</label>
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

<?php $name = ['intro', 'description']; ?>

@push('scripts')
<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>

@include('admin.layouts._partials.imagepreview')

@foreach($name as $data)
@include('admin.layouts._partials.ckdynamic', ['name' => $data])
@endforeach





@endpush