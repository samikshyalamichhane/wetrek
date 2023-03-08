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
  <form method="post" action="{{route('category.update',$detail->id)}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="row">
      <div class="col-md-12">
        <div class="ibox">
          <div class="ibox-head">
            <div class="ibox-title">Edit Category</div>

            <div class="ibox-tools">

            </div>
          </div>

          <!-- <h3>Blog Details</h3> -->
          <div class="ibox-body" style="">

            <div class="row">
              <div class="form-group col-md-6">
                <label>Title</label>
                <input class="form-control" name="title" value="{{$detail->title}}" type="text" placeholder="Enter Category Title">
              </div>

            </div>

            <div class="check-list">
              <label class="ui-checkbox ui-checkbox-primary">
                <input name="published" type="checkbox" {{$detail->published==1?'checked':''}}>
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