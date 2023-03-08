<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\AdminsRole;
use Session;
use Auth;

class AdminController extends Controller
{
    public function adminsSubadmins()
    {
        if(Auth::user()->type=="user"){
            Session::flash('error','This section is restricted for User.');
            return redirect('admin/dashboard');
        }
        // Session::put('page','admins_subadmins');
        $admins_subadmins = User::get()->toArray();
        // dd($admins_subadmins); die;
        return view('admin.admins_subadmins.admins_subadmins')->with(compact('admins_subadmins'));
    }

    public function updateAdminStatus(Request $request, $id=null)
    {
        $data = $request->all();
        User::where('id',$data['id'])->update(['status'=>$data['status']]);
    }

    public function deleteAdmin($id)
    {
        User::find($id)->delete();
        return redirect()->route('admins-subadmins')->with('message', 'User Deleted Successfuly.');

    }

    public function removeUser($id)
    {
        $data = User::findorfail($id);
        $data->delete();
        return redirect()->back()->with('message', 'User Deleted Successfully.');
    }

    //Add user
    public function addEditAdminSubadmin(Request $request, $id=null)
    {
        Session::put('page','admins_subadmins');
        if($id==""){
            $title = "Add Admin/Sub-Admin";
            $admindata = new User;
            $message = "User added Successfuly!!";

        }else{
            $title = "Edit Admin/Sub-Admin";
            $admindata = User::find($id);
            // $admindata = json_decode(json_encode($admindata),true);
            // echo "<pre>"; print_r($admindata); die;
            $message = "User Updated Successfuly!!";
        }

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if($id==""){
                $adminCount = User::where('email',$data['admin_email'])->count();
                if($adminCount>0){
                    Session::flash('error','User already exists!');
                    return redirect('admin/admins-subadmins');
                }
            }
            $rules = [
                'admin_name' => 'required|regex:/^[\pL\s\-]+$/u'
            ];
            $customMessages = [
                'admin_name.required' => 'Name is required',
                'admin_name.regex' => 'Valid Name is Required',
            ];
            $this->validate($request,$rules,$customMessages);
            
            // Upload Admin Details
            $admindata->name = $data['admin_name'];
            $admindata->type = $data['admin_type'];
            if($id==""){
                $admindata->email = $data['admin_email'];
                // $admindata->type = $data['admin_type'];
            }
            if($data['admin_password']!=""){
                $admindata->password = bcrypt($data['admin_password']);
            }
            $admindata->save();
            Session::flash('message',$message);
            return redirect('admin/admins-subadmins');
        }
        return view('admin.admins_subadmins.add_edit_admin_subadmin')->with(compact('title','admindata'));

    }



        // Admin role and permision
        public function updateRole(Request $request, $id)
        {
            // Session::put('page','admins_subadmins');
            if($request->isMethod('post')){
                $data = $request->all();
                unset($data['_token']);
                // echo "<pre>"; print_r($data); die;  
    
                AdminsRole::where('admin_id',$id)->delete();
    
                foreach ($data as $key => $value)
                {
                    if(isset($value['view'])){
                        $view = $value['view'];
                    }else{
                        $view = 0;
                    }
    
                    if(isset($value['edit'])){
                        $edit = $value['edit'];
                    }else{
                        $edit = 0;
                    }
                    if(isset($value['full'])){
                        $full = $value['full'];
                    }else{
                        $full = 0;
                    }
                    AdminsRole::where('admin_id',$id)->insert([
                        'admin_id'=>$id,
                        'module'=>$key,
                        'view_access'=>$view,
                        'edit_access'=>$edit,
                        'full_access'=>$full
                    ]);
                }
    
                $message = "Role Updated successfully";
                Session::flash('message',$message);
                return redirect()->back();
            }
    
            $adminDetails = User::where('id',$id)->first()->toArray();
            $adminRoles = AdminsRole::where('admin_id',$id)->get()->toArray();
            $title = "Update ".$adminDetails['name']." (".$adminDetails['type'].") Roles and Permissions";
            return view('admin.admins_subadmins.update_roles')->with(compact('title','adminDetails','adminRoles'));
        }


}
