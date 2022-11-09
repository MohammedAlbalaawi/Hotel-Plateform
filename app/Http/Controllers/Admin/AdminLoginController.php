<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminLoginController extends Controller
{

    /* Login */
    public function index(){
        return view('admin.login');
    }

    public function login_submit(Request $request){
        $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:3',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()
                ->route('admin_home');
        }else{
            return redirect()
                ->route('admin_login')
                ->with('error', 'Email or password is incorrect');
        }
    }

    /* Password Operations*/
    public function forget_password(){
        return view('admin.forget_password');
    }

    public function forget_password_submit(Request $request){

        $request->validate([
            'email' =>'required|email',
        ]);

        $admin_data = Admin::where('email', $request->email)->first();

        if(!$admin_data){
            return redirect()
                ->back()
                ->with('error', 'Email address not found');
        }

        $token = hash('sha256', time());
        $admin_data->token = $token;
        $admin_data->update();

        $reset_link = url('admin/reset-password/' . $token . "/" . $request->email);
        $subject = "Reset Password Link";
        $message = "Please click the link below to reset your password<br>";
        $message .= "<a href='" . $reset_link . "'>Click Here</a>";

        Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()
            ->route('admin_login')
            ->with('success', 'Password reset link has been sent Successfully');
    }

    public function reset_password($token, $email){
        $admin_data = Admin::where('token',$token)->where('email', $email)->first();

        if(!$admin_data){
            return redirect()
                ->route('admin.login');
        }

        return view('admin.reset_password',compact('token', 'email'));
    }

    public function reset_password_submit(Request $request){
        $request->validate([
            'password' =>'required|min:3',
            'retype_password' =>'required|same:password',
        ]);

        $admin_data = Admin::where('token',$request->token)->where('email', $request->email)->first();

        $admin_data->password =Hash::make($request->password);
        $admin_data->token = '';
        $admin_data->update();

        return redirect()
            ->route('admin_login')
            ->with('success','Password has been Reset Success');
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }
}
