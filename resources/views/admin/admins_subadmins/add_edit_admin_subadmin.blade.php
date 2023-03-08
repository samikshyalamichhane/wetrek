@extends('admin.layouts.app')

@push('styles')
  <style media="screen">
    .line{
       width:100%;
       height: 1px;
       background-color: green;
    }
  </style>
@endpush

@section('content')


<div class="page-content fade-in-up">
  <form name="admintForm" id="admintForm" @if(empty($admindata['id'])) action="{{ url('admin/add-edit-admin-subadmin') }}" @else action="{{ url('admin/add-edit-admin-subadmin/'.$admindata['id']) }}"  @endif method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Add Admin/User</div>

                    <div class="ibox-tools">

                    </div>
                </div>

                <!-- <h3>Blog Details</h3> -->
                <div class="ibox-body" style="">

                  <div class="row">
                      <div class="form-group col-md-6">
                          <label>Name</label>
                          <input type="text" class="form-control" name="admin_name" id="admin_name" placeholder="Enter Admin Name" @if(!empty($admindata['name'])) value="{{ $admindata['name'] }}" @else value="{{ old('admin_name') }}" @endif/>
                      </div>

                      <div class="form-group col-md-12">
                        <label>User Type</label>
                        <select class="form-control" name="admin_type" id="admin_type" required>
                            {{-- <select @if($admindata['id']!="") disabled @else required @endif  class="form-control" name="admin_type" id="admin_type"> --}}
                          <option value="">Select</option>
                              <option value="admin" @if(!empty($admindata['type']) && $admindata['type']=="admin") selected="" @endif>Admin</option>
                              <option value="user" @if(!empty($admindata['type']) && $admindata['type']=="user") selected="" @endif>User</option>
                      </select>
                    </div>
                    
                      <div class="form-group col-md-6">
                        <label>Email</label>
                        <input @if($admindata['id']!="") disabled @else required @endif type="email" class="form-control" name="admin_email" id="admin_email" placeholder="Enter Admin Email" @if(!empty($admindata['email'])) value="{{ $admindata['email'] }}" @else value="{{ old('admin_email') }}" @endif/>
                    </div>

                      <div class="form-group col-md-6">
                          <label>User Password</label>
                          <input type="password" class="form-control" name="admin_password" id="admin_password" placeholder="Enter Admin Password"/>
                      </div>
                  </div>

                      

                      
                      {{-- <div class="check-list">
                          <label class="ui-checkbox ui-checkbox-primary">
                          <input name="publish" type="checkbox">
                          <span class="input-span"></span>Publish</label>
                      </div> --}}

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
