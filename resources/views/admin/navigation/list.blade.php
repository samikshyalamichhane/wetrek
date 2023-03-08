@extends('admin.layouts.app')
@push('styles')
<link href="{{asset('/assets/admin/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />

<!-- <style media="screen">
.adjust-delete-button {
  margin-top: -28px;
  margin-left: 37px;
}
</style> -->
@endpush
@section('content')

<div class="page-heading">
    <h1 class="page-title">Navigation Lists</h1>


</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Navigations</div>
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
              @if($details->count())
               @foreach($details as $key => $data)
                    <tr id="{{$data->id}}">
                        <td>{{++$key}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->slug}}</td>
                        <!-- <td>{{$data->parent}}</td> -->
                        <td>{{$data->published}}</td>
                        <td>
                            <a href="{{route('navigationEdit',$data->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
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
	          var itemIndex = $(el).index();
	          $.ajax({
	            url:"{{route('sortableNavigation')}}",
	            method:"post",
	             data: {itemID:itemID, itemIndex: itemIndex},
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
