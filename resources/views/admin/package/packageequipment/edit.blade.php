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
                      <div class="ibox-title">Edit Package Equipment</div>

                      <div class="ibox-tools">
                          <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                          <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                      </div>
                  </div>

                  <form method="post" action="{{route('packageequipment.update', [$d_id, $detail->id])}}" enctype="multipart/form-data">
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
                                <label>Title</label>
                                <input class="form-control" type="text" name="title" value="{{$detail->title}}" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                              <label>Description </label>
                              <textarea class="form-control" name="description" rows="3" cols="80">{{$detail->description}}</textarea>
                          </div>
                          <div class="form-group">
                              <label>Head </label>
                              <textarea class="form-control" name="head" rows="3" cols="80">{{$detail->head}}</textarea>
                          </div>
                          <div class="form-group">
                              <label>Face </label>
                              <textarea class="form-control" name="face" rows="3" cols="80">{{$detail->face}}</textarea>
                          </div>
                          <div class="form-group">
                              <label>Body</label>
                              <textarea class="form-control" name="body" rows="3" cols="80">{{$detail->body}}</textarea>
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
                      <div class="ibox-title">Package Equipment List</div>
                  </div>
                  <div class="ibox-body">
                      <table class="table table-bordered table-hover">
                          <thead class="thead-default">
                              <tr>
                                  <!-- <th>S.N.</th> -->
                                  <th>Title</th>
                                  <th>Description</th>
                                  <th>Face</th>
                                  <th>Options</th>
                              </tr>
                          </thead>
                          <tbody>

                            @if($packageequipment->count())
                              @foreach($packageequipment as $key => $data)

                              <tr>
                                <!-- <td>{{++$key}}</td> -->
                                <td>{{$data->title}}</td>
                                <td>{{$data->description}}</td>
                                <td>{!! str_limit($data->face, 200) !!}</td>

                                  <td>
                                      <a href="{{route('packageequipment.edit', [$d_id, $data->id])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>

                                        <form class="adjust-delete-button" action="{{route('packageequipment.destroy', [$d_id, $data->id])}}" method="post">
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
<?php $name = ['head','face','body']; ?>
@foreach($name as $data)
@include('admin.layouts._partials.ckdynamic', ['name' => $data])
@endforeach
@endpush
