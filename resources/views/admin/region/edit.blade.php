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
  <form method="post" action="{{route('region.update',$detail->id)}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="row">
      <div class="col-md-12">
        <div class="ibox">
          <div class="ibox-head">
            <div class="ibox-title">Edit Region</div>

            <div class="ibox-tools">

            </div>
          </div>

          <!-- <h3>Blog Details</h3> -->
          <div class="ibox-body" style="">

            <div class="row">
              <div class="form-group col-md-6">
                <label>Name</label>
                <input class="form-control" name="name" value="{{$detail->name}}" type="text" placeholder="Enter Region Name">
              </div>

              <div class="form-group col-md-6">
                <label>Slug</label>
                <input class="form-control" name="slug" value="{{$detail->slug}}" type="text" placeholder="Enter Region Slug">
              </div>

            </div>
            <div class="form-group col-md-12">
              <label>Banner Image</label>
              <input class="form-control" id="fileUpload" name="banner_image" type="file">
              <div id="wrapper" class="mt-2">
                <div id="image-holder">
                  @if($detail->banner_image)
                  <img src="{{asset('images/thumbnail/'. $detail->banner_image)}}" style="margin-top:12px; margin-bottom:12px;" height="120px" width="120px" alt="">
                  @endif
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Description</label>
              <textarea name="description" class="form-control" rows="8" cols="80">{{$detail->description}}</textarea>
            </div>


            <div class="check-list">
              <label class="ui-checkbox ui-checkbox-primary">
                <input name="publish" type="checkbox" {{$detail->publish==1?'checked':''}}>
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

<?php $name = ['description']; ?>

@push('scripts')
<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>

@include('admin.layouts._partials.imagepreview')

@foreach($name as $data)
@include('admin.layouts._partials.ckdynamic', ['name' => $data])
@endforeach

@endpush