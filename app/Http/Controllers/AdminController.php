<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
USE Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function AdminDashboard(){

        return view('admin.index');
        
    } // End Method

    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Admin Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/admin/login')->with($notification);
    } // End Method

    public function AdminLogin(){
        return view('admin.admin_login');

    } // End Method

    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view',compact('profileData'));
        
    } // End Method

    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->company = $request->company;
        
        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }
        
        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

    public function AdminChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password',compact('profileData'));

    } // End Method

    public function AdminUpdatePassword(Request $request){
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        /// Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)){
            $notification = array(
                'message' => 'Old Password Does not Match!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        /// Update The New Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'Password Change Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);

        } // End Method


        /// Creator User All Method

        public function AllCreator(){
            $allcreator = User::where('role', 'creator')->get();
            return view('backend.creatoruser.all_creator', compact('allcreator'));
            
        } // End Method

        public function AddCreator(){
            return view('backend.creatoruser.add_creator');
            
        } // End Method

        public function StoreCreator(Request $request){
            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'company' => $request->company,
                'password' => Hash::make($request->password),
                'role' => 'creator',
                'status' => 'active',
            ]);
            $notification = array(
                'message' => 'Creator Created Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.creator')->with($notification);
            
        } // End Method

        public function EditCreator($id){
            $allcreator = User::findOrFail($id);
            return view('backend.creatoruser.edit_creator', compact('allcreator'));
            
        } // End Method

        public function UpdateCreator(Request $request){
            $user_id = $request->id;
            User::findOrFail($user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'company' => $request->company,
            ]);
            $notification = array(
                'message' => 'Creator Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.creator')->with($notification);
            
        } // End Method

        public function DeleteCreator($id){
            User::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Creator Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
            
        } // End Method

        public function changeStatus(Request $request){
            $user = User::find($request->user_id);
            $user->status = $request->status;
            $user->save();
            return response()->json(['success'=>'Status Change Successfully']);
            
        } // End Method

        /// Admin User All Method

        public function AllAdmin(){
            $alladmin = User::where('role', 'admin')->get();
            return view('backend.pages.admin.all_admin', compact('alladmin'));
            
        } // End Method

        public function AddAdmin(){
            $roles = Role::all();
            return view('backend.pages.admin.add_admin', compact('roles'));
            
        } // End Method

        public function StoreAdmin(Request $request){
            $user = new User();
            $user->username = $request->username;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->company = $request->company;
            $user->password = Hash::make($request->password);
            $user->role = 'admin';
            $user->status = 'active';
            $user->save();
            if($request->roles){
                $user->assignRole($request->roles);
            }
            $notification = array(
                'message' => 'New Admin User Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.admin')->with($notification);
            
        } // End Method

        public function EditAdmin($id){
            $user = User::findOrFail($id);
            $roles = Role::all();
            return view('backend.pages.admin.edit_admin', compact('user', 'roles'));
            
        } // End Method

        public function UpdateAdmin(Request $request, $id){
            $user = User::findOrFail($id);
            $user->username = $request->username;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->company = $request->company;
            $user->password = Hash::make($request->password);
            $user->role = 'admin';
            $user->status = 'active';
            $user->save();
            $user->roles()->detach();
            if($request->roles){
                $user->assignRole($request->roles);
            }
            $notification = array(
                'message' => 'New Admin User Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.admin')->with($notification);
            
        } // End Method

        public function DeleteAdmin($id){
            $user = User::findOrFail($id);
            if(!is_null($user)){
                $user->delete();
            }
            $notification = array(
                'message' => 'Admin User Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
            
        } // End Method

}
