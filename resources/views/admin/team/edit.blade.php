@extends('admin.layouts.app')

@section('content')


<div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Edit Team</div>

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

                            <div class="ibox-body" style="">
                                <form method="post" action="{{route('team.update', $detail->id)}}" enctype="multipart/form-data">
                                  @csrf
                                  @method('put')

                                <div class="row">

                                  <div class="col-md-6 form-group">
                                      <label>Name</label>
                                      <input class="form-control" name="name" value="{{$detail->name}}" type="text" placeholder="Enter Name">
                                  </div>

                                  <div class="col-md-6 form-group">
                                <label>Designation</label>
                                <input class="form-control" name="designation" value="{{$detail->designation}}" type="text" placeholder="Enter Designation">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Facebook</label>

                                <input class="form-control" name="facebook" value="{{$detail->facebook}}" type="text" placeholder="Enter facebook link here">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Twitter</label>

                                <input class="form-control" name="twitter" value="{{$detail->twitter}}" type="text" placeholder="Enter twitter link here">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Instagram</label>

                                <input class="form-control" name="instagram" value="{{$detail->instagram}}" type="text" placeholder="Enter instagram link here">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Linkedin</label>

                                <input class="form-control" name="linkedin" value="{{$detail->linkedin}}" type="text" placeholder="Enter linkedin link here">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Position</label>
                                <input class="form-control" name="position" value="{{$detail->position}}" type="number" placeholder="Enter position">
                            </div>

                                </div>

                                  <div class="form-group">
                                      <label>Description</label>
                                      <textarea name="description" class="form-control" rows="3">{{$detail->description}}</textarea>
                                  </div>

                                  <div class="form-group">
                                      <label>Image</label>
                                      <input id="fileUpload" class="form-control" value="" name="image" type="file">
                                      <div id="wrapper" class="mt-2">
                                          <div id="image-holder">
                                            @if($detail->image)
                                              <img src="{{ $detail->imageUrl() }}" style="margin-top:12px; margin-bottom:12px;" height="120px" width="120px" alt="">
                                            @endif
                                          </div>
                                      </div>
                                  </div>

                                  <div class="check-list">
                                      <label class="ui-checkbox ui-checkbox-primary">
                                      <input name="published" type="checkbox" {{$detail->published ? 'checked' : ''}}>
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
@include('admin.layouts._partials.ckeditorsetting')
@include('admin.layouts._partials.imagepreview')
@endpush
