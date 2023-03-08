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
    <h1 class="page-title">Package Bookings Inquery</h1>
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
            <div class="ibox-title">All Package Bookings Inquery</div>

        </div>


        <div class="ibox-body">
            <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Type</th>
                        <th>Package Name</th>
                        <th>Options </th>
                    </tr>
                </thead>
                <tbody>

                  @if($packageBookingInquiry->count())
                    @foreach($packageBookingInquiry as $key => $data)

                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$data->full_name}}</td>
                      <td>{{$data->email}}</td>
                      <td>{{$data->country}}</td>
                      <td>{{$data->type}}</td>
                        <td>
                            @if ($data->package)
                            {{@$data->package->package_name}}

                            @elseif ($data->tourpackage)
                            {{@$data->tourpackage->package_name}}

                            @elseif ($data->adventurepackage)
                            {{@$data->adventurepackage->package_name}}

                            @elseif ($data->helitourpackage)
                            {{@$data->helitourpackage->package_name}}
                            
                            @elseif ($data->naturepackage)
                            {{@$data->naturepackage->package_name}}
                            @endif
                        </td>

                        <td>
                            {{-- @if($bookingListModule['edit_access']==1 || $bookingListModule['full_access']==1) --}}
                                @if ($data->package)
                                    <a href="{{route('bookings.edit', $data->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                    @elseif ($data->tourpackage)
                                    <a href="{{route('tourbookings.edit', $data->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                    @elseif ($data->adventurepackage)
                                    <a href="{{route('adventurebookings.edit', $data->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                    @elseif ($data->helitourpackage)
                                    <a href="{{route('helitourbookings.edit', $data->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                    @elseif ($data->naturepackage)
                                    <a href="{{route('naturebookings.edit', $data->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                @endif
                            {{-- @endif --}}


                            @if ($data->package)
                            <form class="adjust-delete-button" action="{{route('bookings.destroy', $data->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></button>
                            </form>

                            @elseif ($data->tourpackage)
                            <form class="adjust-delete-button" action="{{route('tourbookings.destroy', $data->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></button>
                            </form>

                            @elseif ($data->adventurepackage)
                            <form class="adjust-delete-button" action="{{route('adventurebookings.destroy', $data->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></button>
                            </form>

                            @elseif ($data->helitourpackage)
                            <form class="adjust-delete-button" action="{{route('helitourbookings.destroy', $data->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></button>
                            </form>

                            @elseif ($data->naturepackage)
                            <form class="adjust-delete-button" action="{{route('naturebookings.destroy', $data->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></button>
                            </form>

                        @endif
                                <!-- <a href="{{route('blog.destroy', $data->id)}}" class="btn btn-danger btn-sm" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this Blog?')"><i class="fa fa-trash"></i></a> -->
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
