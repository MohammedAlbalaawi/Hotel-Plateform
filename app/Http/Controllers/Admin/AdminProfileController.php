<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function index(){
        return view('admin.profile');
    }

    public function profile_submit(Request $request){
        $request->validate([
            'name' =>'required'
        ]);

        if($request->password != ''){
            $request->validate([
                'password' =>'required',
                'retype_password' => 'required|same:password'
            ]);
        }

        $admin_data = Admin::where('email',Auth::guard('admin')->user()->email)->first();
        $admin_data->name = $request->name;
        $admin_data->update();

        return redirect()
            ->back()
            ->with('success', 'Profile updated successfully');
    }
}
