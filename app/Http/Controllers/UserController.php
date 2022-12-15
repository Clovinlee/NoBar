<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\old_password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    //ini buat user
    public function index(){
        return view("users.userpage",["currentUser" => Auth::user()]);
    }

    public function edit_user(){
        return view("users.useredit",["currentUser" => Auth::user()]);
    }


    public function SearchMovie(Request $request){
        $tampung = $request->input("search");
        $movie = DB::table('movies')->where('judul','like','%'.$tampung.'%')->paginate(4);
        return view("users.search",[
            "hasil" => $movie,
            "key" => $tampung
        ]);
    }

    public function fix_edit_user(Request $r){
        $user = Auth::user();
        $credentials = $r->validate([
            'nama_lengkap'=>'required|max:255',
            'old_password'=>[new old_password($r->old_password)],
            'new_password'=>'required|min:5|max:255',
            'conf_password'=>'required|same:new_password'
        ]);
        $credentials["new_password"] = Hash::make($credentials["new_password"]);
        $user->name = $credentials["nama_lengkap"];
        $user->password = $credentials["new_password"];
        // @ts-ignore
        $user->save();
        return view("users.userpage",["currentUser" => Auth::user()]);
    }

    public function history()
    {
        $username = Session::get("username");
        $itemBuy = DB::table('htrans')
        ->join("htrans","dtrans.htrans_id","=","htrans.id")
        ->select("htrans.id","htrans.transaction_id","htrans.user_id","htrans.schedule_id","htrans.created_at")
        ->where("htrans.user_id",$username)
        ->get();
        return View::make("historypage",[
            "itemBuy"=>$itemBuy
        ]);
    }
}
