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
                      <div class="ibox-title">Add Package Itinerary</div>

                      <div class="ibox-tools">
                          <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                          <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                      </div>
                  </div>
                  @include('admin.layouts._partials.messages.info')
                  <form method="post" action="{{route('packageitinerary.store', [$d_id])}}" enctype="multipart/form-data">
                    @csrf
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
                                <input class="form-control" type="text" name="day_num" value="{{old('day_num')}}" placeholder="Enter Day Number">
                            </div>
                              <div class="form-group">
                                  <label>Title</label>
                                  <input class="form-control" type="text" name="title" value="{{old('title')}}" placeholder="Enter Title">
                              </div>
                                {{-- <div class="form-group">
                                    <label>Trek Distance</label>
                                    <input class="form-control" type="text" name="trek_distance" value="{{old('trek_distance')}}" placeholder="Enter Trek Distance">
                                </div>
                                <div class="form-group">
                                    <label>Flight Hours</label>
                                    <input class="form-control" type="text" name="flight_hours" value="{{old('flight_hours')}}" placeholder="Enter Flight Hours">
                                </div>
                                <div class="form-group">
                                    <label>Highest Altitude</label>
                                    <input class="form-control" type="text" name="highest_altitude" value="{{old('highest_altitude')}}" placeholder="Enter Highest Altitude">
                                </div>
                                <div class="form-group">
                                    <label>Trek Duration</label>
                                    <input class="form-control" type="text" name="trek_duration" value="{{old('trek_duration')}}" placeholder="Enter Trek Duration">
                                </div> --}}

                      <div class="form-group">
                          <label>Short Description </label>
                          <textarea class="form-control" name="lodging" rows="3" cols="80">{{old('lodging')}}</textarea>
                      </div>
                      <div class="form-group">
                        <label>Full Description </label>
                        <textarea class="form-control" name="fooding" rows="3" cols="80">{{old('fooding')}}</textarea>
                    </div>
                    {{-- <div class="form-group">
                        <label>Activity Details</label>
                        <textarea class="form-control" name="activity_details" rows="3" cols="80">{{old('activity_details')}}</textarea>
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
                                  <!-- <th>S.N.</th> -->
                                  <th>Day Num</th>
                                  <th>Title</th>
                                  <th>Activity Details</th>
                                  <th>Options</th>
                              </tr>
                          </thead>
                          <tbody class="row_drag">

                            @if($details->count())
                              @foreach($details as $key => $data)

                              <tr data-id="{{$data->id}}">
                                <!-- <td>{{++$key}}</td> -->
                                <td>{{$data->day_num}}</td>
                                <td>{{$data->title}}</td>
                                <td>
                                   
                                {!! \Illuminate\Support\Str::limit($data->activity_details, 200, '...') !!}
                                </td>

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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript">
    // $(function() {
    //     $('#faqTable').DataTable({
    //         pageLength: 100,
    //         //"ajax": './assets/demo/data/table_data.json',
    //         /*"columns": [
    //             { "data": "name" },
    //             { "data": "office" },
    //             { "data": "extn" },
    //             { "data": "start_date" },
    //             { "data": "salary" }
    //         ]*/
    //     });
    // });
    $( ".row_drag" ).sortable({
        delay: 100,
        stop: function() {
            var selectedRow = new Array();
            $('.row_drag>tr').each(function() {
                selectedRow.push($(this).attr("id"));
            });
           let data=[];
           $('.row_drag>tr').each(function(key,ele){
               data.push({'id':$(this).attr("data-id"),'order_row':key});
           });
           $.ajax({
              type:"POST",
              data :{"_token":"{{csrf_token()}}","data":data},
              url:"{{route('packageitinerary.update.order')}}",
           });
        }
    });
</script>
@endpush
