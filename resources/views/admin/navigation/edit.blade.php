@extends('admin.layouts.app')


@section('content')

<div class="page-content fade-in-up">

@include('admin.layouts._partials.messages.info')
@if(@$childDetail->count())
    <div class="row">
        <div class="col-md-12">
          <div class="ibox">
              <div class="ibox-head">
                  <div class="ibox-title">Sub Menu</div>
              </div>


              <div class="ibox-body">
                  <table id="" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                      <thead>
                      <tr>
                          <th>SN</th>
                          <th>Name</th>
                          <th>Slug</th>
                          <!-- <th>Parent</th> -->
                          <th>Published</th>
                          <th>Options</th>
                      </tr>
                      </thead>

                      <tbody id="sortable">
                    @if($childDetail->count())
                     @foreach($childDetail as $key => $data)
                          <tr id="{{$data->id}}">
                              <td>{{++$key}}</td>
                              <td>{{$data->name}}</td>
                              <td>{{$data->slug}}</td>
                              <!-- <td>{{$data->parent}}</td> -->
                              <td>{{$data->published}}</td>
                              <td>
                                  <a href="{{route('navigationEdit',[$data->id,])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                              </td>
                          </tr>
                   @endforeach
                   @else
                   <tr>
                       <td colspan="8">
                           You do not have any Data yet.
                       </td>
                   </tr>
                   @endif
                      </tbody>

                  </table>
              </div>
          </div>
        </div>

    </div>
@endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Edit Menu</div>

                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <!-- <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(41px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item">option 1</a>
                                        <a class="dropdown-item">option 2</a>
                                    </div> -->
                                </div>
                            </div>
                              <!-- @include('admin.layouts._partials.messages.info') -->
                  <form method="post" action="{{route('navigation.save', $detail->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                            <div class="ibox-body" style="">

                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="name" value="{{$detail->name}}" placeholder="Enter Menu Name">
                                            {!!$errors->first('name', '<span class="text-danger has-error">:message</span>')!!}
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Slug</label>
                                            <input class="form-control" readonly type="text" name="slug" value="{{$detail->slug}}"  placeholder="Enter Slug">
                                            {!!$errors->first('slug', '<span class="text-danger has-error">:message</span>')!!}
                                        </div>
                                        <div class="check-list col-sm-6">
                                            <label class="ui-checkbox ui-checkbox-primary">
                                            <input name="published" type="checkbox" {{$detail->published == 1 ? 'checked' : ''}}>
                                            <span class="input-span"></span>Publish</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                      <input type="submit" class="btn btn-default" name="" value="Submit">
                                        <!-- <button class="btn btn-default" type="submit">Submit</button> -->
                                    </div>
                            </div>
                        </form>
                        </div>
                    </div>

                </div>
            </div>

@endsection

@push('scripts')


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="{{asset('/assets/admin/vendors/DataTables/datatables.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $(document).ready(function(){
       $('.delete').submit(function(e){
        e.preventDefault();
        var message=confirm('Are you sure to delete');
        if(message){
          this.submit();
        }
        return;
       });

       $("#sortable").sortable({
	      stop: function(){
	        $.map($(this).find('tr'), function(el) {
	          var itemID = el.id;
            var url = window.location.href;
            var stuff = url.split('/');
            var parentId = stuff[stuff.length-1];
	          var itemIndex = $(el).index();
	          $.ajax({
	            url:"{{route('navigationsortableChild')}}",
	            method:"post",
	             data: {itemID:itemID, itemIndex: itemIndex, parentId:parentId},
	            success:function(data){
                console.log(data);
	            }
	          })
	        });
	      }
	    });

    });
  </script>

@endpush
