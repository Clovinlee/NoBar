<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //ini buat user
    public function index(){
        return view("users.userpage",["currentUser" => Auth::user()]);
    }

    public function edit_user(){
        return view("users.useredit",["currentUser" => Auth::user()]);
    }

    public function fix_edit_user(Request $r){
        $user = Auth::user();
        $credentials = $r->validate([
            'nama_lengkap'=>'required|max:255',
            'new_password'=>'required|min:5|max:255',
            'conf_password'=>'required|same:new_password'
        ]);
        $credentials["new_password"] = Hash::make($credentials["new_password"]);
        $user->name = $credentials["nama_lengkap"];
        $user->password = $credentials["new_password"];
        $user->save();
        return view("users.userpage",["currentUser" => Auth::user()]);
    }

    public function history(){
        return view("users.historypage");
    }
}
