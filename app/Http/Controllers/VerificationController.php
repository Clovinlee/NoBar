<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VerificationController extends Controller
{
    //
    public function login(){
        return view("login");
    }

    public function verifylogin(Request $r){
        $credentials = $r->validate([
            'email'=>'required|email:dns',
            'password'=>'required'
        ]);

        if(Auth::attempt($credentials)){
            $r->session()->regenerate();
            return redirect()->intended("/user");
        }
        
        return back()->with("loginError","Invalid email / Password");
    }

    public function verifyregister(Request $r){
        $credentials = $r->validate([
            'email'=>'required|email:dns|unique:users,email',
            'nama'=>'required|max:255',
            'password'=>'required|min:5|max:255',
            'confirm_password'=>'required|same:password'
        ]);

        dd($credentials);

        $usr = User::create(["name"=>$r->nama, "email"=>$r->email, "password"=>Hash::make($r->password)]);
        event(new Registered($usr));

        Auth::login($usr);

        return redirect(url("/email/verify"));
    }

    public function register(){
        return view("register");
    }

    public function logout(Request $r){
        Auth::logout();

        $r->session()->invalidate();
        $r->session()->regenerateToken();
        return redirect("/");
    }

    public function showverify(){
        return view("verify_email");
    }

    public function showresend(Request $r){
        $r->user()->sendEmailVerificationNotification();

        return back()->with("message","Verification link sent!");
    }

    public function verify(EmailVerificationRequest $r){
        $r->fulfill();

        return redirect('/login');
    }
}
