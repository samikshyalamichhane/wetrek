@extends('admin.layouts.app')
@section('title','Add Gallery')

@section('content')


<div class="page-content fade-in-up">
  <form method="post" action="{{route('gallery.store')}}" enctype="multipart/form-data" id="form">
    @csrf

    <div class="row">
      <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Seo Details</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                    </div>
                </div>
                <div class="ibox-body" style="display: none;">

                  <div class="row">

                    <div class="col-md-6 form-group">
                        <label>Page Title</label>
                        <input class="form-control" name="page_title" value="{{old('page_title')}}" type="text" placeholder="Enter Page Title">
                    </div>

                      <div class="col-md-6 form-group">
                          <label>Meta Title</label>
                          <input class="form-control" name="meta_title" value="{{old('meta_title')}}" type="text" placeholder="Enter Meta Title">
                      </div>

                      <div class="col-md-6 form-group">
                          <label>Meta Description</label>
                          <input class="form-control" name="meta_description" value="{{old('meta_description')}}" type="text" placeholder="Enter Meta Description">
                      </div>

                      <div class="col-md-6 form-group">
                          <label>Keywords</label>
                          <input class="form-control" name="keyword" value="{{old('keyword')}}" type="text" placeholder="Enter Keyword">
                      </div>
                  </div>

                </div>
            </div>
        </div>
    </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Create Gallery</div>

                                <div class="ibox-tools">

                                </div>
                            </div>
                            @if (count($errors) > 0)
                            <div class="alert alert-danger message">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                              </button>
                              <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                              </ul>
                            </div>
                            @endif

                            <div class="ibox-body" style="">


                          <!-- sdfsdfasd -->


                                  <div class="form-group">
                                      <label>Title</label>
                                      <input class="form-control" name="title" value="{{old('title')}}" type="text" placeholder="Enter Title">
                                  </div>

                                  <div class="form-group">
                                      <label>Slug</label>
                                      <input class="form-control" name="slug" value="{{old('slug')}}" type="text" placeholder="Enter Slug">
                                  </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="ibox">


                            <div class="ibox-body" style="">

                                  <div class="form-group">
                                      <label>Thumbnail Of Album</label>
                                      <input type="file" id="fileUpload" class="form-control" value="" name="image" >
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

                            </div>
                        </div>
                    </div>

                </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="ibox">
                    <div class="ibox-body" style="">
                      <div class="form-group">
                        <label>Images For Gallery</label>
                        <input class="form-control" id="gallery-photo-add" type="file" name="image1[]" multiple>
                        <div class="gallery mt-2">

                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>


                </form>
            </div>


@endsection

@push('scripts')
@include('admin.layouts._partials.imagepreview')

<script>

$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
      console.log(input.files);
      console.log(placeToInsertImagePreview);

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview).css({'width' : '150px' , 'height' : '150px', 'margin-right': '10px', 'margin-top': '10px'});
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});


</script>

@endpush
