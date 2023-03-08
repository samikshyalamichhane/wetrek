@extends('admin.layouts.app')

@push('styles')
<style>

.nav-item .nav-link.active{
    color: #fff;
    font-weight: 600;
    background: #4ccdd3;
    transition: 0.5s;
}

</style>

@endpush

@section('content')


<div class="page-content fade-in-up">

    @include('admin.package.include.topnavbar')

      <div class="row">
          <div class="col-md-6">
              <div class="ibox">
                  <div class="ibox-head">
                      <div class="ibox-title">Edit Package Review</div>

                      <div class="ibox-tools">
                          <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                          <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                      </div>
                  </div>

                  <form method="post" action="{{route('packagereview.update', [$d_id, $detail->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                  <div class="ibox-body" style="">

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                      <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" value="{{$detail->name}}" type="text">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="title" value="{{$detail->title}}" type="text">
                      </div>

                      <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" value="{{$detail->email}}" type="text">
                      </div>

                      <div class="form-group">
                        <label>Phone</label>
                        <input class="form-control" name="phone" value="{{$detail->phone}}" type="text">
                      </div>

                    <div class="form-group">
                        <label>Country</label>
                        <input class="form-control" name="country" value="{{$detail->country}}" type="text">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3" cols="80">{{$detail->description}}</textarea>
                    </div>

                   <div class="form-group">
                      <label>Review</label>
                      <input class="form-control" name="overall_review" value="{{$detail->overall_review}}" type="number" min="1" max="5" placeholder="Only 1-5">
                  </div>
                  {{--<div class="form-group">
                      <label>Pre trip info</label>
                      <input class="form-control" name="pre_trip_info" value="{{$detail->pre_trip_info}}" type="number" min="1" max="5" placeholder="Only 1-5">
                  </div>
                  <div class="form-group">
                      <label>Meals</label>
                      <input class="form-control" name="meal" value="{{$detail->meal}}" type="number" min="1" max="5" placeholder="Only 1-5">
                  </div>
                  <div class="form-group">
                      <label>Guides</label>
                      <input class="form-control" name="guide" value="{{$detail->guide}}" type="number" min="1" max="5" placeholder="Only 1-5">
                  </div>
                  <div class="form-group">
                      <label>Transportation</label>
                      <input class="form-control" name="transportation" value="{{$detail->transportation}}" type="number" min="1" max="5" placeholder="Only 1-5">
                  </div>
                  <div class="form-group">
                      <label>Value for Money</label>
                      <input class="form-control" name="value_for_money" value="{{$detail->value_for_money}}" type="number" min="1" max="5" placeholder="Only 1-5">
                  </div>
                  <div class="form-group">
                      <label>Accommodation</label>
                      <input class="form-control" name="accommodation" value="{{$detail->accommodation}}" type="number" min="1" max="5" placeholder="Only 1-5">
                  </div> --}}

                  <div class="form-group">
                        <label>Image</label>
                        <input  class="form-control" id="fileUpload" name="image" type="file">
                        <div id="wrapper" class="mt-2">
                            <div id="image-holder">
                            @if($detail->image)
                                <img src="{{asset('images/thumbnail/'. $detail->image)}}" style="margin-top:12px; margin-bottom:12px;" height="120px" width="120px" alt="">
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

                  </div>
                </form>
              </div>
          </div>

          <div class="col-md-6">

              <div class="ibox">
                  <div class="ibox-head">
                      <div class="ibox-title">Review List</div>
                  </div>
                  <div class="ibox-body">
                      <table class="table table-bordered table-hover">
                          <thead class="thead-default">
                              <tr>
                                  <!-- <th>S.N.</th> -->
                                  <th>Name</th>
                                  <th>Country</th>
                                  <th>Description</th>
                                  <th>Published</th>
                                  <th>Options</th>
                              </tr>
                          </thead>
                          <tbody>


                            @if($packagereview->count())
                              @foreach($packagereview as $key => $data)

                              <tr>
                                <!-- <td>{{++$key}}</td> -->
                                <td>{{$data->name}}</td>
                                <td>{{$data->country}}</td>
                                <td>
                                {!! \Illuminate\Support\Str::limit($data->description, 50, '...') !!}</td>
                                <td>{{$data->published == 1 ? 'Published' : 'Not Published'}}</td>
                                  <td>
                                      <a href="{{route('packagereview.edit', [$d_id, $data->id])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>

                                        <form class="adjust-delete-button" action="{{route('packagereview.destroy', [$d_id, $data->id])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></button>
                                        </form>
                                  </td>
                              </tr>
                              @endforeach
                              @else
                              <tr>
                                  <td colspan="8">
                                      You do not have any data yet.
                                  </td>
                              </tr>
                              @endif
                          </tbody>
                      </table>
                  </div>
              </div>
            </div>

        </div>





      </div>

@endsection


@push('scripts')
<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
@include('admin.layouts._partials.ckdynamic', ['name' => 'description'])
@include('admin.layouts._partials.imagepreview')
@endpush