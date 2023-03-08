@extends('admin.layouts.app')

@section('content')


<div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Create Travelersreview</div>

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
                                <form method="post" action="{{route('travelersreview.store')}}" enctype="multipart/form-data">
                                  @csrf

                              <div class="row">

                                  <div class="col-md-6 form-group">
                                      <label>Name</label>
                                      <input class="form-control" name="name" value="{{old('name')}}" type="text" placeholder="Enter Name">
                                      <!-- {!!$errors->first('name', '<span class="text-danger has-error">:message</span>')!!} -->
                                  </div>

                                  <div class="col-md-6 form-group">
                                    <label>Country</label>
                                    <input class="form-control" name="country" value="{{old('country')}}" type="text" placeholder="Enter Country">
                                </div>

                                  <div class="col-md-6 form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="email" value="{{old('email')}}" type="email" placeholder="Enter Email">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label>Phone</label>
                                    <input class="form-control" name="phone" value="{{old('phone')}}" type="number" placeholder="Enter Phone no">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label>Star</label>
                                    <input class="form-control" name="star" value="{{old('star')}}" type="number" min="1" max="5" placeholder="Only 1-5">
                                </div>

                                  {{-- <div class="col-md-6 form-group">
                                      <label>Country</label>
                                      [Note: Post is changed to country ]
                                      <input class="form-control" name="post" value="{{old('post')}}" type="text" placeholder="Enter Country">
                                  </div> --}}

                                </div>

                                <div class="form-group">
                                    <label>Words</label>
                                    <textarea class="form-control" placeholder="Enter Words" value="{{old('words')}}" name="words" rows="3" cols="80"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Image</label>
                                    <input class="form-control" id="fileUpload" name="image" type="file">
                                    <br>
                                    <!-- {!!$errors->first('image', '<span class="text-danger has-error">:message</span>')!!} -->
                                    <div id="wrapper" class="mt-2">
                                        <div id="image-holder"></div>
                                    </div>

                                </div>

                                <div class="row">
                                  <div class="col-md-6 check-list">
                                      <label class="ui-checkbox ui-checkbox-primary">
                                      <input name="published" type="checkbox">
                                      <span class="input-span"></span>Publish</label>
                                  </div>


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
<?php $name = ['words',]; ?>
@foreach($name as $data)
@include('admin.layouts._partials.ckdynamic', ['name' => $data])
@endforeach
{{-- End ck editor --}}

<script>

       $(document).ready(function() {

         $("#fileUpload").on('change', function () {

           if (typeof (FileReader) != "undefined") {

            var image_holder = $("#image-holder");

            // console.log($("#image-holder"));
            $("#image-holder").children().remove();

            var reader = new FileReader();
            reader.onload = function (e) {

                $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image",
                    "width" : '50%'
                }).appendTo(image_holder);

            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    });

     });

</script>


@endpush
