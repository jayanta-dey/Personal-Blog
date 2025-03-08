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
}
