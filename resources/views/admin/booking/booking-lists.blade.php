@extends('admin.layouts.app')
@push('styles')
<link href="{{asset('/assets/admin/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />

<style media="screen">
.adjust-delete-button {
  margin-top: -28px;
  margin-left: 37px;
}
</style>
@endpush
@section('content')

<div class="page-heading">
@include('admin.layouts._partials.messages.info')
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Bookings List</div>
            <!-- <div>
                <a class="btn btn-info btn-md" href="{{route('bookings.create')}}">Trekking Package Inquery</a>
            </div> -->
        </div>


        <div class="ibox-body">
            <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>No. Of Traveller</th>
                        <!--<th>Date</th>-->
                        <th>Package Name</th>
                        <th>Options </th>
                    </tr>
                </thead>
                <tbody>

                  @if($bookingLists->count())
                    @foreach($bookingLists as $key => $data)

                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$data->no_of_traveller}}</td>
                      <!--<td>-->
                      <!--{{date('Y-m-d', strtotime($data->costanddate->start_date ?? ""))}} to {{date('Y-m-d', strtotime($data->costanddate->end_date ?? ""))}}-->
                      <!--</td>-->
                      <td>{{@$data->package->package_name}}</td>
                        <td>
                        <a href="#"  class="btn btn-success btn-sm view" data-id="{{$data->id}}"><i
                                    class="fa fa-eye"></i></a>
                                    <form class="adjust-delete-button" action="{{route('removeBooking', $data->id)}}" method="post">
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this.?')"><i class="fa fa-trash"></i></button>
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

   <!-- Modal -->
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Booking Details</h4>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

@endsection
@push('scripts')
<script src="{{asset('/assets/admin/vendors/DataTables/datatables.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $('#example-table').DataTable({
            pageLength: 100,

        });
    })
</script>
<script>
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".view").click(function(e) {
        e.preventDefault();
        id=$(this).data('id');
        $.ajax({
            method:"post",
            url:"{{route('viewBooking')}}",
            data:{id:id},
            success:function(data){
                console.log(data);
                $('#myModal .modal-body').html(data);
                $('#myModal').modal('show');
            }
        });
    });
});
</script>
@endpush
