<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 




class AdminController extends Controller
{
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    } //end method destroy


    public function profile()
    {
        $id = Auth::id();
        $admindata = User::find($id);
        return view('admin.admin_profile_view', compact('admindata'));

    } //end method profile


    
    public function editProfile()
    {
        $id = Auth::id();
        $admindata = User::find($id);
        return view('admin.admin_profile_edit', compact('admindata'));
       

    } //end method profile
    public function profilestore(Request $request)
    {
        $id = Auth::id();
        $admindata = User::find($id);
        $admindata->name = $request->name;
        $admindata->email = $request->email;
        $admindata->username = $request->username;

        if ($request->file('profile_image')) {

         $file = $request->file('profile_image');

         $filename = date('YmdHi').$file->getClientOriginalName();
         $file->move(public_path('upload/admin_images'),$filename);
         $admindata['profile_image'] = $filename;

        }
        $admindata->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
      

    } //end method 

    public function ChangePassword()
    {
        return view('admin.admin_change_password');
    } //end method ChangePassword


    public function UpdatePassword(Request $request)
    {
        $validateData = $request->validate([
            'currentpassword' => 'required',
            'newpassword' => 'required',
            'confirmnewpassword' => 'required|same:newpassword',
        ]);
    $hashedPassword = Auth::user()->password;
       if(Hash::check($request->currentpassword, $hashedPassword)){
        $users = User::find(Auth::id());
        $users->password = Hash::make($request->newpassword);
        $users->save();

        session()->flash('message', 'Password Updated Successfully');
        return redirect()->back();
         }else{
            session()->flash('message', 'Current Password is Invalid');
            return redirect()->back(); 

       }
    } //end method UpdatePassword

}
