<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function profile_submit(ProfileUpdateRequest $request)
    {

        $admin_data = Admin::where('email', Auth::guard('admin')->user()->email)->first();

    
        if ($request->password != '') {

            $request->validate([
                'retype_password' => 'required|same:password'
            ]);

            $admin_data->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {

            if ($admin_data->photo &&  Storage::exists($admin_data->photo)) {
                Storage::delete($admin_data->photo);
            }

            $admin_data->photo = $request->file('photo')->store('admins');
        }

        $admin_data->name = $request->name;
        $admin_data->update();

        return redirect()
            ->back()
            ->with('success', 'Profile updated successfully');
    }
}
