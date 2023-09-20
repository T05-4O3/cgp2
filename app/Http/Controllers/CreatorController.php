<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class CreatorController extends Controller
{
    public function CreatorDashboard(){

        return view('creator.index');
        
    } // End Method

    public function CreatorLogin(){
        return view('creator.creator_login');
    } // End Method

    public function CreatorRegister(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'creator',
            'status' => 'inactive',
        ]);
        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::CREATOR);
    } // End Method

    public function CreatorLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Creator Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/creator/login')->with($notification);
    } // End Method

    public function CreatorProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('creator.creator_profile_view',compact('profileData'));
        
    } // End Method

    public function CreatorProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->company = $request->company;
        
        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/creator_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/creator_images'),$filename);
            $data['photo'] = $filename;
        }
        
        $data->save();
        $notification = array(
            'message' => 'Creator Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

    public function CreatorChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('creator.creator_change_password',compact('profileData'));

    } // End Method

    public function CreatorUpdatePassword(Request $request){
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

}
