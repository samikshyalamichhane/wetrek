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
  <form method="post" action="{{route('whywithus.store')}}" enctype="multipart/form-data">
    @csrf


                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Create Travel With US</div>

                                <div class="ibox-tools">

                                </div>
                            </div>

                            <!-- <h3>Blog Details</h3> -->
                            <div class="ibox-body" style="">

                              <div class="row">
                                  <div class="form-group col-md-12">
                                      <label>Travel With US Title</label>
                                      <input class="form-control" name="whywithus_title" value="{{old('	whywithus_title')}}" type="text" placeholder="Enter Title">
                                  </div>

                                  {{-- <div class="form-group col-md-6">
                                      <label>Slug</label>
                                      <input class="form-control" name="slug" value="{{old('slug')}}" type="text" placeholder="Enter Slug">
                                  </div> --}}
                              </div>

                                  <div class="form-group">
                                      <label>Description (For Home Page)</label>
                                      <textarea name="whywithus_description" class="form-control" rows="8" cols="80">{{old('whywithus_description')}}</textarea>
                                  </div>

                                  <div class="form-group">
                                    <label>Description (For Aboout Us page)</label>
                                    <textarea name="description" class="form-control" rows="8" cols="80">{{old('description')}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Icon Link</label>
                                    <input class="form-control" name="whywithus_icon" value="{{old('whywithus_icon')}}" type="text" placeholder="Eg. <i class=lnr lnr-briefcase></i>">
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-9 col-form-label">
                                        <div class="row">
                                            {{-- <div class="col-6 colxs-12">
                                                <label>Icone</label>
                                                <div class="form-check checkbox">
                                                    <input type="file" name="whywithus_icon" class="form-control" onchange="whywithus_iconpreview()">
                                                    <img id="whywithus_iconframe" src="" width="100px" height="100px" />
                                                </div>
                                            </div> --}}

                                            <div class="col-6 colxs-12">
                                                <label>Image</label>
                                                <div class="form-check checkbox">
                                                    <input type="file" name="image1" class="form-control" onchange="image1preview()">
                                                    <img id="image1frame" src="" width="100px" height="100px" />
                                                </div>
                                            </div>
                                            <div class="col-6 colxs-12">
                                                <label>Second Image (For about us)</label>
                                                <div class="form-check checkbox">
                                                    <input type="file" name="image2" class="form-control" onchange="image2preview()">
                                                    <img id="image2frame" src="" width="100px" height="100px" />
                                                </div>
                                            </div>

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
<?php $name = ['whywithus_description','description']; ?>
@foreach($name as $data)
@include('admin.layouts._partials.ckdynamic', ['name' => $data])
@endforeach
{{-- End ck editor --}}



{{-- New image holder CV --}}
<script>
    function whywithus_iconpreview() {
        whywithus_iconframe.src=URL.createObjectURL(event.target.files[0]);
    }
    function image1preview() {
        image1frame.src=URL.createObjectURL(event.target.files[0]);
    }
    function image2preview() {
        image2frame.src=URL.createObjectURL(event.target.files[0]);
    }

    </script>
@endpush
