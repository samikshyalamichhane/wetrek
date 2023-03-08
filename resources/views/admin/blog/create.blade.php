@extends('admin.layouts.app')

@push('styles')
  <style media="screen">
    .line{
       width:100%;
       height: 1px;
       background-color: green;
    }
  </style>
@endpush

@section('content')


<div class="page-content fade-in-up">
  <form method="post" action="{{route('blog.store')}}" enctype="multipart/form-data">
    @csrf

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
                  <!-- @include('admin.layouts._partials.messages.info') -->
                <div class="ibox-body" style="display:none;">
                  @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    <ul>
                      @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif

                      <div class="row">
                          <div class="form-group col-md-6">
                              <label>Page Title</label>
                              <input class="form-control" type="text" name="page_title" value="" placeholder="Enter Page Title">
                          </div>
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
                                <div class="ibox-title">Create Blog</div>

                                <div class="ibox-tools">

                                </div>
                            </div>

                            <!-- <h3>Blog Details</h3> -->
                            <div class="ibox-body" style="">

                              <div class="row">
                                  <div class="form-group col-md-12">
                                      <label>Title</label>
                                      <input class="form-control" name="title" value="{{old('title')}}" type="text" placeholder="Enter Blog Title">
                                  </div>

                                  <div class="form-group col-md-6">
                                      <label>Slug</label>
                                      <input class="form-control" name="slug" value="{{old('slug')}}" type="text" placeholder="Enter Blog Slug">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>Author</label>
                                    <input class="form-control" name="author" value="{{old('author')}}" type="text" placeholder="Enter Author Name">
                                </div>
                              </div>

                                  <div class="form-group">
                                      <label>Short Description</label>
                                      <textarea name="short_description" class="form-control" rows="3">{{old('short_description')}}</textarea>
                                  </div>

                                  {{-- <div class="form-group">
                                      <label>Middle Description</label>
                                      <textarea name="mid_description" class="form-control" rows="8" cols="80">{{old('mid_description')}}</textarea>
                                  </div> --}}

                                  <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="8" cols="80">{{old('description')}}</textarea>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Image</label>
                                        <div class="form-check checkbox">
                                            <input type="file" name="image" class="form-control" onchange="imagepreview()">
                                            <img id="imageframe" src="" width="100px" height="100px" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Banner Image</label>
                                        <div class="form-check checkbox">
                                            <input type="file" name="banner_image" class="form-control" onchange="banner_imagepreview()">
                                            <img id="banner_imageframe" src="" width="100px" height="100px" />
                                        </div>
                                    </div>
                                </div>



                                  <div class="check-list">
                                      <label class="ui-checkbox ui-checkbox-primary">
                                      <input name="published" type="checkbox">
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

@push('scripts')
{{-- //CK editor --}}
<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<?php $name = ['short_description','mid_description','description',]; ?>
@foreach($name as $data)
@include('admin.layouts._partials.ckdynamic', ['name' => $data])
@endforeach
{{-- End ck editor --}}




    {{-- New image holder CV --}}
    <script>
        function imagepreview() {
            imageframe.src=URL.createObjectURL(event.target.files[0]);
        }
        function banner_imagepreview() {
            banner_imageframe.src=URL.createObjectURL(event.target.files[0]);
        }

    </script>


@endpush
