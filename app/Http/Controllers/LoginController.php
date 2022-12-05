<?php

namespace App\Http\Controllers;

use App\Models\Htranssnack;
use App\Http\Requests\StoreHtranssnackRequest;
use App\Http\Requests\UpdateHtranssnackRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function loginPage(Request $r){
        return view("login");
    }
}
