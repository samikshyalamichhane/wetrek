@extends('admin.layouts.app')

@push('styles')
  <style media="screen">
    .line{
       width:100%;
       height: 1px;
       background-color: green;
    }
  </style>
@endpush

@section('content')


<div class="page-content fade-in-up">
  <form method="post" action="{{route('activity.update',$detail->id)}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Edit Activity</div>

                    <div class="ibox-tools">

                    </div>
                </div>

                <!-- <h3>Blog Details</h3> -->
                <div class="ibox-body" style="">

                  <div class="row">
                      <div class="form-group col-md-6">
                          <label>Activity Name</label>
                          <input class="form-control" name="name" value="{{$detail->name}}" type="text" placeholder="Enter Activity Name">
                      </div>

                      <div class="form-group col-md-6">
                          <label>Slug</label>
                          <input class="form-control" name="slug" value="{{$detail->slug}}" type="text" placeholder="Enter Activity Slug">
                      </div>
                      <div class="form-group col-md-12">
                          <label>Select Region</label>
                          <select class="form-control" name="region_id">
                            @foreach($region as $type)
                              <option value="{{$type->id}}" {{$detail->region_id==$type->id?'selected':''}}>{{$type->name}}</option>
                            @endforeach
                            
                            
                          </select>
                      </div>
                      
                  </div>

                      

                      
                      <div class="check-list">
                          <label class="ui-checkbox ui-checkbox-primary">
                          <input name="published" type="checkbox" {{$detail->published==1?'checked':''}}>
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

    </form>
</div>

@endsection

@push('scripts')

@endpush
