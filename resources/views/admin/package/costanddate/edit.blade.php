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
                      <div class="ibox-title">Edit Cost And Date</div>

                      <div class="ibox-tools">
                          <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                          <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                      </div>
                  </div>

                  <form method="post" action="{{route('costanddate.update', [$d_id, $detail->id])}}" enctype="multipart/form-data">
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
                            {{-- <div class="form-group">
                                <label>Select Category</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="">Select Category</option>
                                    <option value="{{$detail->category}}" {{ $detail->category ? 'selected' : '' }}>{{ $detail->category }}</option>
                                    <option value="Small Group Departure">Small Group Departure</option>
                                    <option value="Private Departure">Private Departure</option>
                                </select>
                            </div> --}}

                            <div class="form-group">
                                <label>Start Date</label>
                                <input class="form-control" type="date" name="start_date" value="{{$detail->start_date}}" placeholder="Enter Start Date">
                            </div>
                            <div class="form-group">
                                <label>End Date</label>
                                <input class="form-control" type="date" name="end_date"value="{{$detail->end_date}}" placeholder="Enter End Date">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input class="form-control" type="text" name="status" value="{{$detail->status}}" placeholder="Eg: Confirmed">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" type="text" name="price" value="{{$detail->price}}" placeholder="E.g $200">
                            </div>

                            {{-- <div class="form-group">
                                <label>End Date</label>
                                <input class="form-control" type="date" name="cad_date_to" value="{{$detail->cad_date_to}}" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" type="text" name="cad_price" value="{{$detail->cad_price}}" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>Discount Price</label>
                                <input class="form-control" type="text" name="cad_discount_price" value="{{$detail->cad_discount_price}}" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input class="form-control" type="text" name="cad_trip_status" value="{{$detail->cad_trip_status}}" placeholder="Enter Name">
                            </div> --}}
                            <div class="row ml-2">
                                <div class="check-list">
                                      <label class="ui-checkbox ui-checkbox-primary">
                                      <input name="published" type="checkbox" {{$detail->published ? 'checked' : ''}}>
                                      <span class="input-span"></span>Publish</label>
                                  </div>

                                  {{-- <div class="check-list ml-3">
                                    <label class="ui-checkbox ui-checkbox-primary">
                                    <input name="upcoming_treks" type="checkbox" {{$detail->upcoming_treks ? 'checked' : ''}}>
                                    <span class="input-span"></span>Front Upcoming Treks</label>
                                </div> --}}
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
                      <div class="ibox-title">Cost And Date List</div>
                  </div>
                  <div class="ibox-body">
                      <table class="table table-bordered table-hover">
                          <thead class="thead-default">
                              <tr>
                                  <!-- <th>S.N.</th> -->
                                  {{-- <th>Category</th> --}}
                                  <th>Start Date</th>
                                  <th>Published</th>
                                  <th>Options</th>
                              </tr>
                          </thead>
                          <tbody>


                            @if($costanddate->count())
                              @foreach($costanddate as $key => $data)

                              <tr>
                                <!-- <td>{{++$key}}</td> -->

                                {{-- <td>{{$data->category}}</td> --}}
                                <td>{{$data->start_date}}</td>

                                <td>{{$data->published == 1 ? 'Published' : 'Not Published'}}</td>

                                  <td>
                                      <a href="{{route('costanddate.edit', [$d_id, $data->id])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>

                                        <form class="adjust-delete-button" action="{{route('costanddate.destroy', [$d_id, $data->id])}}" method="post">
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
@include('admin.layouts._partials.ckdynamic', ['name' => 'costanddate'])
@endpush
