@extends('admin.layouts.app')

@push('styles')
<style media="screen">
    .line {
        width: 100%;
        height: 1px;
        background-color: green;
    }
</style>
@endpush

@section('content')


<div class="page-content fade-in-up">


    <div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Add Package Multiple Images</div>

                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                class="fa fa-ellipsis-v"></i></a>

                    </div>
                </div>
                <form method="post" action="{{route('packagemultipleimages.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="ibox-body" style="">

                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <input type="hidden" name="package_id" value="{{ $package_id }}">
                        <div class="form-group">
                            <label>Slider images</label>
                            <input class="form-control" type="file" name="sliderimages[]" multiple="multiple">
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-default" type="submit">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">

            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Package Slider List</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-default">
                            <tr>
                                <th>S.N.</th>
                                <th>Photos</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if($details->count())
                            @foreach($details as $key => $detail)

                            <tr>
                                <td>{{++$key}}</td>
                                <td> <img src="{{ asset('images/package/multiple/'. $detail->sliderimages) }}" width="100">
                                </td>
                                <td>
                                    <form method="post" action="{{ route('packagemultipleimages.destroy', $detail->id) }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button onclick="return confirm('Are you sure want to delete this?')"
                                            type="submit" class="btn btn-danger" style="display:inline">Delete</button>
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

    </div>

</div>

</div>

@endsection

@push('scripts')
@include('admin.layouts._partials.ckeditorsetting')
@include('admin.layouts._partials.imagepreview')
@endpush
