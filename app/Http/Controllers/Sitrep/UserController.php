<?php

namespace App\Http\Controllers\Sitrep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function UserDashboard(){
        return view('sitrep.user.index');
    }

   

    public function UserLogin(){
        return view('sitrep.user.user_login');
    } // End Mehtod 


    public function UserDestroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        return redirect('/user/login');
    } // End Mehtod 

    public function UserProfile(){
        $id = Auth::user()->id;

        $userData = User::find($id);

        return view('sitrep.user.user_profile_view',compact('userData'));

    } // End Mehtod 

    public function UserProfileStore(Request $request){
 
         $id = Auth::user()->id;
         $data = User::find($id);
         $data->name = $request->name;
         $data->email = $request->email;
         $data->phone = $request->phone;
         $data->address = $request->address; 
 
 
         if ($request->file('photo')) {
             $file = $request->file('photo');
             @unlink(public_path('sitrep/upload/user_images/'.$data->photo));
             $filename = date('YmdHi').$file->getClientOriginalName();
             $file->move(public_path('sitrep/upload/user_images'),$filename);
             $data['photo'] = $filename;
         }
 
         $data->save();
 
         return redirect()->back();
         $notification = array(
            'message' => 'Personnel Profile Updated Successfully',
            'alert-type' => 'success'
        );


        return redirect()->back()->with($notification);
 
     } // End Mehtod 


     public function UserChangePassword(){
        return view('sitrep.user.user_change_password');
     } // End Mehtod 


     public function UserUpdatePassword(Request $request){
        // Validation 
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed', 
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Match!!");
        }

        // Update The new password 
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        return back()->with("status", " Password Changed Successfully");

    } // End Mehtod 
}

