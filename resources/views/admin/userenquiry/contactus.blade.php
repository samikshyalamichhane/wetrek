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
    <h1 class="page-title">Enquiry Lists</h1>
    <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href=""><i class="la la-home font-20"></i> Dashboard</a>
        </li>
        <li class="breadcrumb-item"> All News</li>
    </ol> -->
@include('admin.layouts._partials.messages.info')
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Message</div>
        </div>
        <div class="ibox-body">
            <table id="example-table" class="table table-striped table-bordered table-responsive table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th>SN</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Number</th>
                      <th>Type</th>
                      <!--<th>Message</th>-->
                      <th>Options</th>
                    </tr>
                </thead>
                <tbody>

                  @if($details->count())
                    @foreach($details as $key => $data)

                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->email}}</td>
                      <td>{{$data->number}}</td>
                      <td>{{$data->type}}</td>
                      <!--<td>{{$data->message}}</td>-->
                        <td>
                            <a href=""  class="btn btn-success btn-sm view" data-id="{{$data->id}}"><i class="fa fa-eye"></i></a>
                              <form class="adjust-delete-button" action="{{route('userenquiry.destroy', $data->id)}}" method="post">
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
                            You do not have any Data yet.
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          {{-- <h4 class="modal-title">Details</h4> --}}
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
                pageLength: 25,

            });
        })
    </script>

    {{-- popup show --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function(){
            $(".view").click(function(e) {
                e.preventDefault();
                id=$(this).data('id');
                $.ajax({
                    method:"post",
                    url:"{{route('viewContact')}}",
                    data:{id:id},
                    success:function(data){
                        console.log("Hello world");
                        console.log(data);
                        $('#myModal .modal-body').html(data);
                        $('#myModal').modal('show');
                    }
                });
            });
        });
    </script>

@endpush
