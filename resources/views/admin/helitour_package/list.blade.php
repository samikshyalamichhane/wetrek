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
    <h1 class="page-title">Heli Tour Package</h1>
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
            <div class="ibox-title">All HeliTour Package</div>
            <div>
                <a class="btn btn-info btn-md" href="{{route('helitourpackage.create')}}">Add HeliTour Package</a>
            </div>
        </div>


        <div class="ibox-body" style="overflow-x: auto">
            <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th>SN</th>
                      <th>Package Name</th>
                      <th>Destination</th>
                      <th>Activity</th>
                      <th>Slug</th>
                      {{-- <th>Accommodation </th>
                      <th>Distance </th>
                      <th>Image</th>
                      <th>Description</th> --}}
                      <th>Published</th>
                      <th>Options</th>
                    </tr>
                </thead>
                <tbody>

                  @if($details->count())
                    @foreach($details as $key => $data)

                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$data->package_name}}</td>
                      <td>{{@$data->destination->country_name}}</td>
                      <td>{{@$data->activity->name}}</td>
                      <td>{{$data->slug}}</td>
                      {{-- <td>{{$data->accommodation}}</td>
                      <td>{{$data->distance}}</td>
                      <td><a href="/images/main/{{$data->image}}" target="_blank"><img style="height:150px; width: 200px;" src="{{$data->image ? asset('/images/thumbnail/' . $data->image) : '/assets/admin/images/image.jpg' }}"></a></td>
                      <td>{{str_limit($data->description, 100)}}</td> --}}
                      <td>{{$data->published == 1 ? 'Published' : 'Not Published'}}</td>

                        <td>
                            {{-- @if($packageModule['edit_access']==1 || $packageModule['full_access']==1) --}}
                            <a href="{{route('helitourpackage.edit', $data->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            {{-- @endif --}}
                            {{-- @if($packageModule['full_access']==1) --}}
                              <form class="adjust-delete-button" action="{{route('helitourpackage.destroy', $data->id)}}" method="post">
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></button>
                              </form>
                              {{-- @endif --}}
                              {{-- @if($packageModule['edit_access']==1 || $packageModule['full_access']==1) --}}
                            <a class="btn btn-info btn-sm mt-2" href="{{route('helitourpackagemultipleimages.create', $data->id)}}">Package
                                Images</a>
                            {{-- @endif --}}
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
