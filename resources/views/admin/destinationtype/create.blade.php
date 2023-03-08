@extends('admin.layouts.app')

@section('content')

<div class="page-content fade-in-up">
  <form method="post" action="{{route('destinationtype.store')}}" enctype="multipart/form-data">
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
                       {{-- <div class="form-group col-md-6">
                            <label>Page Title</label>
                            <input class="form-control" type="text" name="page_title" value="" placeholder="Enter Page Title">
                        </div> --}}
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
                                <div class="ibox-title">Create Destination Type</div>

                                <div class="ibox-tools">

                                </div>
                            </div>

                            <div class="ibox-body" style="">

                                  <div class="form-group">
                                      <label>Title</label>
                                      <input class="form-control" name="title" value="{{old('title')}}" type="text" placeholder="Enter Title">
                                  </div>

                                  <div class="form-group">
                                        <label>Select Destination</label>
                                        <select name="destination_id" class="form-control">
                                            <option value="">-- select one --</option>
                                            @foreach($destinations as $desti)
                                                <option value="{{$desti->id}}">{{$desti->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                  <div class="form-group">
                                      <label>Description</label>
                                      <textarea name="short_description" class="form-control" rows="8" cols="80">{{old('short_description')}}</textarea>
                                      <!--<input class="form-control" name="short_description" value="{{old('short_description')}}" type="text" placeholder="Enter Short Description">-->
                                  </div>

                                  <div class="form-group">
                                      <label>Banner Image</label>
                                      <input class="form-control" id="fileUpload" value="{{old('banner_image')}}" name="banner_image" type="file">
                                      <div id="wrapper" class="mt-2">
                                          <div id="image-holder">
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
                                </form>
                            </div>
                        </div>
                    </div>

                </div>



            </div>

@endsection

@push('scripts')

{{-- //CK editor --}}
<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<?php $name = ['short_description']; ?>
@foreach($name as $data)
@include('admin.layouts._partials.ckdynamic', ['name' => $data])
@endforeach
{{-- End ck editor --}}

@include('admin.layouts._partials.imagepreview')

@endpush
