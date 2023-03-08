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

    @include('admin.helitour_package.include.topnavbar')

      <div class="row">
          <div class="col-md-6">
              <div class="ibox">
                  <div class="ibox-head">
                      <div class="ibox-title">Add Heli Tour Package GDP</div>

                      <div class="ibox-tools">
                          <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                          <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                      </div>
                  </div>
                  @include('admin.layouts._partials.messages.info')
                  <form method="post" action="{{route('helitourpackagegdp.store', [$d_id])}}" enctype="multipart/form-data">
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
                                <label>No. Of Person</label>
                                <input class="form-control" type="text" name="no_of_persons" value="{{old('no_of_persons')}}" placeholder="Enter No of Person Eg. 1 Pax, 2 Paxes, 4 - 6 Paxes">
                            </div>
                             

                      <div class="form-group">
                          <label>Price per Person</label>
                          <input class="form-control" type="text" name="price_per_person" value="{{old('price_per_person')}}" placeholder="Enter Price Per Person Eg. US$ 1470">
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
                </form>
              </div>
          </div>

          <div class="col-md-6">

              <div class="ibox">
                  <div class="ibox-head">
                      <div class="ibox-title">GDP List</div>
                  </div>
                  <div class="ibox-body">
                      <table class="table table-bordered table-hover">
                          <thead class="thead-default">
                              <tr>
                                  <!-- <th>S.N.</th> -->
                                  <th>Question </th>
                                  <th>No Of Person</th>
                                  <th>Price Per Pson</th>
                                  <th>Options</th>
                              </tr>
                          </thead>
                          <tbody>
                          

                            @if($details->count())
                              @foreach($details as $key => $data)

                              <tr>
                                <!-- <td>{{++$key}}</td> -->
                                <td>{{$data->no_of_persons}}</td>
                                <td>{{$data->price_per_person}}</td>
                                <td>{{$data->published == 1 ? 'Published' : 'Not Published'}}</td>


                                  <td>
                                      <a href="{{route('helitourpackagegdp.edit', [$d_id, $data->id])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>

                                        <form class="adjust-delete-button" action="{{route('helitourpackagegdp.destroy', [$d_id, $data->id])}}" method="post">
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
@include('admin.layouts._partials.ckdynamic', ['name' => 'answers'])
@endpush
