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
    <h1 class="page-title">Treking And Hikking Bookings</h1>
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
            <div class="ibox-title">All Treking And Hikking Bookings</div>
            <div>
                <a class="btn btn-info btn-md" href="{{route('bookings.create')}}">Trekking Package Inquery</a>
            </div>
        </div>


        <div class="ibox-body">
            <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Package Name</th>
                        <th>Type</th>
                        <th>Options </th>
                    </tr>
                </thead>
                <tbody>

                  @if($packageBooking->count())
                    @foreach($packageBooking as $key => $data)

                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$data->full_name}}</td>
                      <td>{{$data->email}}</td>
                      <td>{{$data->country}}</td>
                      <td>
                          @if ($data->costanddate)
                            {{@$data->costanddate->package->package_name}}
                             @elseif ($data->tourcostanddate)
                            {{@$data->tourcostanddate->tourpackage->package_name}}
                            @elseif ($data->adventurepackagecostanddate)
                            {{@$data->adventurepackagecostanddate->adventurepackage->package_name}}
                            @elseif ($data->helitourcostanddate)
                            {{@$data->helitourcostanddate->helitourpackage->package_name}}
                            @elseif ($data->naturepackagecostanddate)
                            {{@$data->naturepackagecostanddate->naturepackage->package_name}}
                          @endif
                      </td>
                      <td>{{$data->type}}</td>

                        <td>
                            @if($bookingListModule['edit_access']==1 || $bookingListModule['full_access']==1)
                                @if ($data->costanddate)
                                    <a href="{{route('bookings.show', $data->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                    @elseif ($data->tourcostanddate)
                                    <a href="{{route('tourbookings.show', $data->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                    @elseif ($data->adventurepackagecostanddate)
                                    <a href="{{route('adventurebookings.show', $data->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                    @elseif ($data->helitourcostanddate)
                                    <a href="{{route('helitourbookings.show', $data->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                    @elseif ($data->naturepackagecostanddate)
                                    <a href="{{route('naturebookings.show', $data->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                @endif
                            @endif
                            @if($bookingListModule['full_access']==1)
                                @if ($data->costanddate)
                                    <form class="adjust-delete-button" action="{{route('bookings.destroy', $data->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></button>
                                    </form>

                                    @elseif ($data->tourcostanddate)
                                    <form class="adjust-delete-button" action="{{route('tourbookings.destroy', $data->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></button>
                                    </form>

                                    @elseif ($data->adventurepackagecostanddate)
                                    <form class="adjust-delete-button" action="{{route('adventurebookings.destroy', $data->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></button>
                                    </form>

                                    @elseif ($data->helitourcostanddate)
                                    <form class="adjust-delete-button" action="{{route('helitourbookings.destroy', $data->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></button>
                                    </form>

                                    @elseif ($data->naturepackagecostanddate)
                                    <form class="adjust-delete-button" action="{{route('naturebookings.destroy', $data->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></button>
                                    </form>

                                @endif
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
