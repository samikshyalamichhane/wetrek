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
    <h1 class="page-title">Destination</h1>
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
            <div class="ibox-title">All Destination</div>
            @if($destinationModule['full_access']==1)
            <div>
                <a class="btn btn-info btn-md" href="{{route('destination.create')}}">Add Destinaiton</a>
            </div>
            @endif
        </div>


        <div class="ibox-body" style="overflow-x: auto">
            <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th>SN</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Published</th>
                      @if($destinationModule['full_access']==1)
                        <th>FAQ</th>
                      @endif
                      <th>Options</th>
                    </tr>
                </thead>
                <tbody>

                  @if($details->count())
                    @foreach($details as $key => $data)

                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$data->country_name}}</td>
                      {{-- <td>{{$data->package_title}}</td>

                      <td>{{$data->slug}}</td>
                      <td>{{@$data->destinationtype->title}}</td>
                      <td>{{$data->price}}</td>
                      {{-- <td>{{str_limit($data->short_description, 200)}}</td> --}}

                      <td><a href="/images/main/{{$data->banner_image}}" target="_blank"><img style="height:120px; width: 120px;" src="{{$data->banner_image ? asset('/images/thumbnail/' . $data->banner_image) : '/assets/admin/images/image.jpg' }}"></a></td>

                      <td>{{$data->published == 1 ? 'Published' : 'Not Published'}}</td>

                        @if($destinationModule['full_access']==1)
                        <td>
                            <a href="{{route('destinationfaq.create', $data->id)}}"><i class="fa fa-calendar"></i>FAQ</a>
                        </td>
                        @endif
                        @if($destinationModule['edit_access']==1 || $destinationModule['full_access']==1)
                            <td>
                                <a href="{{route('destination.edit', $data->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                <form class="adjust-delete-button" action="{{route('destination.destroy', $data->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                      @endif

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
