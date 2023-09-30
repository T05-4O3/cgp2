<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class UserController extends Controller
{
    public function Index(){
        return view('frontend.index');

    } // End Method

    public function UserProfile(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.dashboard.edit_profile',compact('userData'));
    } // End Method

    public function UserProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->company = $request->company;
        
        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['photo'] = $filename;
        }
        
        $data->save();
        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

    public function ClientRegister(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'company' => $request->company,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'role' => 'user',
                'status' => 'active',
            ]);
    
            event(new Registered($user));
            Auth::login($user);
            return redirect(RouteServiceProvider::CLIENT);
        } catch(\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withErrors(['email' => 'Your Email is Already Registered.']);
        }
    } // End Method

    /**
     * Destroy an authenticated session.
     */
    public function UserLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    } // End Method

    public function UserChangePassword(){

        return view('frontend.dashboard.change_password');

    } // End Method


    public function UserPasswordUpdate(Request $request){
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
