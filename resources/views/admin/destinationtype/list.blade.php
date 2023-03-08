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

@include('admin.layouts._partials.messages.info')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Destinationtype</div>
            <div>
               <a class="btn btn-info btn-md" href="{{route('destinationtype.create')}}">Add Destinationtype</a>
            </div>
        </div>

        <div class="ibox-body">
            <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th>SN</th>
                      <th>Title</th>
                      <th>Slug</th>
                      <th>Destination</th>
                      <th>Banner Image</th>
                      <th>Published</th>
                      <th>Options</th>
                    </tr>
                </thead>
                <tbody class="row_drag">

                  @if($details->count())
                    @foreach($details as $key => $data)

                    <tr data-id="{{$data->id}}">
                      <td>{{++$key}}</td>
                      <td>{{$data->title}}</td>
                      <td>{{$data->slug}}</td>
                      <td>{{@$data->destination->country_name}}</td>
                      <td>
                      @if($data->banner_image)
                            <img class="img-fluid rounded" src="{{ $data->imageUrl() }}" style="width: 3rem;">
                            @else
                            <p>N/A</p>
                            @endif
                      </td>

                      <td>{{$data->published == 1 ? 'Published' : 'Not Published'}}</td>

                        <td>
                            <a href="{{route('destinationtype.edit', $data->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>

                              <form class="adjust-delete-button" action="{{route('destinationtype.destroy', $data->id)}}" method="post">
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></button>
                              </form>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript">
    // $(function() {
    //     $('#faqTable').DataTable({
    //         pageLength: 100,
    //         //"ajax": './assets/demo/data/table_data.json',
    //         /*"columns": [
    //             { "data": "name" },
    //             { "data": "office" },
    //             { "data": "extn" },
    //             { "data": "start_date" },
    //             { "data": "salary" }
    //         ]*/
    //     });
    // });
    $( ".row_drag" ).sortable({
        delay: 100,
        stop: function() {
            var selectedRow = new Array();
            $('.row_drag>tr').each(function() {
                selectedRow.push($(this).attr("id"));
            });
           let data=[];
           $('.row_drag>tr').each(function(key,ele){
               data.push({'id':$(this).attr("data-id"),'order_row':key});
           });
           $.ajax({
              type:"POST",
              data :{"_token":"{{csrf_token()}}","data":data},
              url:"{{route('destinationtype.update.order')}}",
           });
        }
    });
</script>

@endpush
