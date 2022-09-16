<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VerificationController extends Controller
{
    //
    public function verifylogin(Request $r){
        $credentials = $r->validate([
            'email'=>'required|email:dns',
            'password'=>'required'
        ]);

        if(Auth::attempt($credentials)){
            $r->session()->regenerate();
            return redirect()->intended();
        }
        
        return back()->with("loginError","Invalid email / Password");
    }

    public function verifyregister(Request $r){
        $credentials = $r->validate([
            'name'=>'required|max:255',
            'email'=>'required|email:dns|unique:users,email',
            'password'=>'required|min:5|max:255',
            'confirm_password'=>'required|same:password'
        ]);

        // $usr = User::create(["name"=>$r->nama, "email"=>$r->email, "password"=>Hash::make($r->password)]);
        $credentials["password"] = Hash::make($credentials["password"]);
        $usr = User::create($credentials);
        event(new Registered($usr));

        // $usr->sendEmailVerificationNotification();

        Auth::login($usr);

        return redirect(url("/email/verify"));
    }

    public function logout(Request $r){
        Auth::logout();

        $r->session()->invalidate();
        $r->session()->regenerateToken();
        return redirect("/");
    }

    public function resend_email(Request $r){
        $r->user()->sendEmailVerificationNotification();

        return back()->with("message","Verification link sent!");
    }

    public function verify(EmailVerificationRequest $r){
        $r->fulfill();
        
        $link = url("/");
        return response()->view("verify.verify_success")->withHeaders(["Refresh"=>"4;url=$link"]); //Redirect after 3s
    }
}
