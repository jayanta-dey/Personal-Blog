<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;





class AdminController extends Controller
{
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
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
        return redirect()->route('admin.profile');
       

    } //end method 




}
