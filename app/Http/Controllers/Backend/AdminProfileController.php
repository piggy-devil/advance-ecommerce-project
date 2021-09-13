<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Admin;
use App\Models\Role\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function AdminProfile() {
        $adminData = Admin::find(1);

        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function AdminProfileEdit() {
        $editData = Admin::find(1);

        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function AdminProfileStore(Request $request) {
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function AdminChangePassword(){

        return view('admin.admin_change_password');
    }

    public function AdminUpdateChangePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Admin::find(1)->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();

            Auth::logout();
            return redirect()->route('admin.logout');
        } else {
            return redirect()->back();
        }
    }

    public function AllUsers(){
		$users = User::latest()->get();
		return view('backend.user.all_user',compact('users'));
	}
    
    public function AdminEditUserRole($user_id, $role_id) {
        $user = User::findOrFail($user_id);
        $roles = Role::get();
        return view('backend.user.manage_user', compact('user', 'roles'));
    }

    public function AdminUpdateUserRole(Request $request, $user_id){

        $user = User::findOrFail($user_id);
        $user->role_id = $request->role_id;
        if($user->isDirty('role_id')) {
            $user->save();
            $notification = array(
                'message' => 'คุณแก้ไข สิทธิผู้ใช้งาน สำเร็จ!',
                'alert-type' => 'info'
            );
    
            return redirect()->route('all-users')->with($notification);
        }

        return redirect()->route('all-users');
        
    }

    public function AdminDeleteUser($user_id) {
        $user = User::findOrFail($user_id);
        $user->delete();

        $notification = array(
            'message' => 'คุณลบผู้ใช้งาน สำเร็จ!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
