@extends('admin.layouts.app')

@push('styles')
<style>
    .box-destination-record {
        padding: 10px;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.4);
        width: 100%;
    }

    .border-ck {
        border: 1px solid black;
    }

    .nav-item .nav-link.active {
        color: #fff;
        font-weight: 600;
        background: #4ccdd3;
        transition: 0.5s;
    }
</style>
@endpush

@section('content')

<div class="page-content fade-in-up">
    @include('admin.layouts._partials.messages.info')

    <form name="adminForm" id="adminForm" method="post" action="{{ url('admin/update-role/'.$adminDetails['id']) }}" >@csrf
        @csrf

        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Role And PErmission</div>

                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-plus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                    class="fa fa-ellipsis-v"></i></a>

                        </div>
                    </div>

                    <div class="ibox-body" style="">

                        <div class="form-group">
                            @if(!empty($adminRoles))
                                @foreach ($adminRoles as $role)
                                    @if($role['module']=="siteSetting")
                                        @if($role['view_access']==1)
                                            @php $viewSiteSetting = "Checked"; @endphp
                                        @else
                                            @php $viewSiteSetting = ""; @endphp
                                        @endif

                                        @if($role['edit_access']==1)
                                            @php $editSiteSetting = "Checked"; @endphp
                                        @else
                                            @php $editSiteSetting = ""; @endphp
                                        @endif

                                        @if($role['full_access']==1)
                                            @php $fullSiteSetting = "Checked"; @endphp
                                        @else
                                            @php $fullSiteSetting = ""; @endphp
                                        @endif

                                        
                                    @endif
                                @endforeach
                            @endif
                            <label><strong>Site Setting</strong></label>
                            <div class="row mt-3">
                                <div class="check-list col-md-2">
                                    <label class="ui-checkbox ui-checkbox-primary">
                                        <input type="checkbox" name="siteSetting[view]" value="1" @if(isset($viewSiteSetting)) {{ $viewSiteSetting }} @endif> 
                                        <span class="input-span"></span> View Access</label>
                                </div>
                                <div class="check-list col-md-2">
                                    <label class="ui-checkbox ui-checkbox-primary">
                                        <input type="checkbox" name="siteSetting[edit]" value="1" @if(isset($viewSiteSetting)) {{ $editSiteSetting }} @endif> 
                                        <span class="input-span"></span>View/Edit Access</label>
                                </div>
                                <div class="check-list col-md-2">
                                    <label class="ui-checkbox ui-checkbox-primary">
                                        <input type="checkbox" name="siteSetting[full]" value="1" @if(isset($viewSiteSetting)) {{ $fullSiteSetting }} @endif>
                                        <span class="input-span"></span>Full Access</label>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            @if(!empty($adminRoles))
                                @foreach ($adminRoles as $role)
                                    @if($role['module']=="bookingList")
                                        @if($role['view_access']==1)
                                            @php $viewBookingList = "Checked"; @endphp
                                        @else
                                            @php $viewBookingList = ""; @endphp
                                        @endif
                                        
                                        @if($role['edit_access']==1)
                                            @php $editBookingList = "Checked"; @endphp
                                        @else
                                            @php $editBookingList = ""; @endphp
                                        @endif

                                        @if($role['full_access']==1)
                                            @php $fullBookingList = "Checked"; @endphp
                                        @else
                                            @php $fullBookingList = ""; @endphp
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                            <label><strong>Booking List</strong></label>
                            <div class="row mt-3">
                                <div class="check-list col-md-2">
                                    <label class="ui-checkbox ui-checkbox-primary">
                                        <input type="checkbox" name="bookingList[view]" value="1" @if(isset($viewBookingList)) {{ $viewBookingList }} @endif>
                                        <span class="input-span"></span>View Access</label>
                                </div>
                                <div class="check-list col-md-2">
                                    <label class="ui-checkbox ui-checkbox-primary">
                                        <input type="checkbox" name="bookingList[edit]" value="1" @if(isset($editBookingList)) {{ $editBookingList }} @endif>
                                        <span class="input-span"></span>View/Edit Access</label>
                                </div>
                                <div class="check-list col-md-2">
                                    <label class="ui-checkbox ui-checkbox-primary">
                                        <input type="checkbox" name="bookingList[full]" value="1" @if(isset($fullBookingList)) {{ $fullBookingList }} @endif> 
                                        <span class="input-span"></span>Full Access</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            @if(!empty($adminRoles))
                                @foreach ($adminRoles as $role)
                                    @if($role['module']=="destination")
                                        @if($role['view_access']==1)
                                            @php $viewDestination = "Checked"; @endphp
                                        @else
                                            @php $viewDestination = ""; @endphp
                                        @endif

                                        @if($role['edit_access']==1)
                                            @php $editDestination = "Checked"; @endphp
                                        @else
                                            @php $editDestination = ""; @endphp
                                        @endif

                                        @if($role['full_access']==1)
                                            @php $fullDestination = "Checked"; @endphp
                                        @else
                                            @php $fullDestination = ""; @endphp
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                            <label><strong>Destination</strong></label>
                            <div class="row mt-3">
                                <div class="check-list col-md-2">
                                    <label class="ui-checkbox ui-checkbox-primary">
                                        <input type="checkbox" name="destination[view]" value="1" @if(isset($viewDestination)) {{ $viewDestination }} @endif>
                                        <span class="input-span"></span> View Access </label>
                                </div>
                                <div class="check-list col-md-2">
                                    <label class="ui-checkbox ui-checkbox-primary">
                                        <input type="checkbox" name="destination[edit]" value="1" @if(isset($editDestination)) {{ $editDestination }} @endif>
                                        <span class="input-span"></span>View/Edit Access</label>
                                </div>
                                <div class="check-list col-md-2">
                                    <label class="ui-checkbox ui-checkbox-primary">
                                        <input type="checkbox" name="destination[full]" value="1" @if(isset($fullDestination)) {{ $fullDestination }} @endif>
                                        <span class="input-span"></span>Full Access</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-default" type="submit">Submit</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </form>

</div>

@endsection

@push('scripts')

@endpush