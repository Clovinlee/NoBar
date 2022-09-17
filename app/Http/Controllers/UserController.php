<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //ini buat user
    public function index(){
        return view("users.userpage");
    }

    public function history(){
        return view("users.historypage");
    }
}
