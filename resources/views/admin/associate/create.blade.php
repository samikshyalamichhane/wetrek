@extends('admin.layouts.app')

@section('content')


<div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Create Accreditations</div>

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
                                <form method="post" action="{{route('associate.store')}}" enctype="multipart/form-data">
                                  @csrf

                                <div class="row">
                                <div class="col-md-12 form-group">
                                      <label>Link</label>
                                      <input class="form-control" name="link" value="{{old('link')}}" type="link" placeholder="Enter Link">
                                  </div>
                                    <div class="col-md-12 form-group">
                                        <label>Image</label>
                                        <input id="fileUpload" class="form-control" value="{{old('image')}}" name="image" type="file">
                                        <div id="wrapper" class="mt-2">
                                            <div id="image-holder">
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

                                </form>
                            </div>
                        </div>
                    </div>

                </div>



            </div>

@endsection

@push('scripts')

@include('admin.layouts._partials.imagepreview')
@endpush
