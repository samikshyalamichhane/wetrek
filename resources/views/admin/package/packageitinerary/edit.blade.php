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
                      <div class="ibox-title">Edit Package Itinerary</div>

                      <div class="ibox-tools">
                          <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                          <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                      </div>
                  </div>

                  <form method="post" action="{{route('packageitinerary.update', [$d_id, $detail->id])}}" enctype="multipart/form-data">
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
                                <label>Day Number</label>
                                <input class="form-control" type="text" name="day_num" value="{{$detail->day_num}}" placeholder="Enter Day Number">
                            </div>
                              <div class="form-group">
                                  <label>Title</label>
                                  <input class="form-control" type="text" name="title" value="{{$detail->title}}" placeholder="Enter Title">
                              </div>

                              {{-- <div class="form-group">
                                <label>Trek Distance</label>
                                <input class="form-control" type="text" name="trek_distance" value="{{$detail->trek_distance}}" placeholder="Enter Title">
                            </div><div class="form-group">
                                <label>Flight Hours</label>
                                <input class="form-control" type="text" name="flight_hours" value="{{$detail->flight_hours}}" placeholder="Enter Title">
                            </div><div class="form-group">
                                <label>Highest Altitude</label>
                                <input class="form-control" type="text" name="highest_altitude" value="{{$detail->highest_altitude}}" placeholder="Enter Title">
                            </div><div class="form-group">
                                <label>Trek Duration</label>
                                <input class="form-control" type="text" name="trek_duration" value="{{$detail->trek_duration}}" placeholder="Enter Title">
                            </div> --}}

                      <div class="form-group">
                          <label>Short Description </label>
                          <textarea class="form-control" name="lodging" rows="3" cols="80">{{$detail->lodging}}</textarea>
                      </div>
                      <div class="form-group">
                        <label>Full Description </label>
                        <textarea class="form-control" name="fooding" rows="3" cols="80">{{$detail->fooding}}</textarea>
                    </div>

                      {{-- <div class="form-group">
                          <label>Activity Details</label>
                          <textarea class="form-control" name="activity_details" rows="3" cols="80">{{$detail->activity_details}}</textarea>
                      </div> --}}

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
                      <div class="ibox-title">Package Itinerary List</div>
                  </div>
                  <div class="ibox-body">
                      <table class="table table-bordered table-hover">
                          <thead class="thead-default">
                              <tr>
                                  <th>S.N.</th>
                                  <th>Title</th>
                                  {{-- <th>Day Num</th> --}}
                                  {{-- <th>Activity Details</th> --}}
                                  <th>Options</th>
                              </tr>
                          </thead>
                          <tbody>

                            @if($packageitinerary->count())
                              @foreach($packageitinerary as $key => $data)

                              <tr>
                                <td>{{++$key}}</td>
                                <td>{{$data->title}}</td>
                               

                                  <td>
                                      <a href="{{route('packageitinerary.edit', [$d_id, $data->id])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>

                                        <form class="adjust-delete-button" action="{{route('packageitinerary.destroy', [$d_id, $data->id])}}" method="post">
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
<?php $name = ['activity_details', 'lodging', 'fooding']; ?>
@foreach($name as $data)
@include('admin.layouts._partials.ckdynamic', ['name' => $data])
@endforeach
@endpush
