<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use PDO;

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
        $credentials["password"] = Hash::make($credentials["password"]);
        
        $usr = User::create($credentials);

        event(new Registered($usr));

        $usr->sendEmailVerificationNotification();

        Auth::login($usr);

        return redirect(url("/email/verify"))->with("email",$credentials["email"]);
    }

    public function verifyemail(EmailVerificationRequest $r){
        $r->fulfill();
        
        $link = url("/");
        return response()->view("verify.verify_success")->withHeaders(["Refresh"=>"4;url=$link"]); //Redirect after 3s
    }

    public function verifyforgot(Request $r){
        $r->validate([
            'email'=>'required|email:dns'
        ]);

        $status = Password::sendResetLink($r->only("email"));

        if($status === Password::RESET_LINK_SENT){
            return redirect(url('/forgot_password/verify'))->with(["email"=>$r->input("email")]);
        }else{
            return abort(404,"Error: ".$status);
        }
    }
    
    public function reset_password($token, Request $r){
        $r->validate([
            'password'=>'required|min:5|max:255',
            'confirm_password'=>'required|same:password'
        ]);

        $emailUser = $r->get("email");

        // Check if User email in URL valid or no
        $usr = User::where("email",$emailUser)->first();
        if($usr == null){
            return redirect(url('/forgot_password'))->with("error","Invalid email address");
        }
        
        //Check if token is valid 
        $tokenDB = DB::table("password_resets")->where("email",$emailUser)->where("created_at",">",Carbon::now()->subMinutes(60));
        if($tokenDB->first() == null){
            return redirect(url('/forgot_password'))->with("error","Invalid Reset Password Token");
        }

        //Check if token expired
        $expireToken = Hash::check($token, $tokenDB->first()->token);
        if($expireToken == false){
            return redirect(url('/forgot_password'))->with("error","Reset Passowrd Token Expired. Please request a new one");
        }

        $usr->forceFill([
            "password"=>Hash::make($r["password"])
        ]);
        $usr->save();
        event(new PasswordReset($usr));

        $tokenDB->delete();

        return redirect(url("/login"))->with("success","Reset Password Successful");
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
}
