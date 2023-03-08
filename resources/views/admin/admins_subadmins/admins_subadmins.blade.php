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
    <h1 class="page-title">Role & Permission</h1>
    <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href=""><i class="la la-home font-20"></i> Dashboard</a>
        </li>
        <li class="breadcrumb-item"> All News</li>
    </ol> -->
@include('admin.layouts._partials.messages.info')
    <div id="message_success" style="display:none;" class="alert alert-sm alert-success">Status Enabled</div>
    <div id="message_error" style="display:none;" class="alert alert-sm alert-danger">Status Disabled</div>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Role & Permission</div>
            <div>
                <a class="btn btn-info btn-md" href="{{ url('admin/add-edit-admin-subadmin') }}">Add User</a>
            </div>
        </div>


        <div class="ibox-body">
            <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th>SN</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($admins_subadmins as $admin)
                    <tr>
                      <td>{{ $admin['id'] }}</td>
                      <td>{{ $admin['name'] }}</td>
                      <td>{{ $admin['email'] }}</td>
                      <td>{{ $admin['type'] }}</td>
                      <td>
                        @if($admin['type']!="superadmin")
                            <input type="checkbox" class="AdminStatus btn btn-success" rel="{{  $admin['id']  }}"
                            data-toggle="toggle" data-on="Enabled" data-of="Disabled" data-onstyle="success" data-offstyle="danger"
                            @if($admin['status']==1) checked @endif>
                            <div id="myElem" style ="display:none;" class="alert alert-success">Status Enabled</div>
                        @endif
                     </td>
                      <td>
                        @if($admin['type']!="superadmin")
                            <a title="Edit Admin/Sub-Admin"  href="{{url('admin/add-edit-admin-subadmin/'.$admin['id'])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <form class="adjust-delete-button" action="{{route('userdestroy', $admin['id'])}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this.?')"><i class="fa fa-trash"></i></button>
                            </form>
                            {{-- <a title="Set Role-Permission" href="{{ url('admin/update-role/'.$admin['id']) }}" class="btn btn-success btn-sm mt-2">Role Permision</a> --}}
                        @endif
                      </td>

                    </tr>
                  @endforeach
                </tbody>

            </table>
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
@endpush
