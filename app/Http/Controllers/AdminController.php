<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        return view("admin.admin");
    }
    public function Reload()
    {
        $branch=Branch::all();
        foreach ($branch as $key => $b) {
            $b->studio=$b->studio();
            $b->save();
        }
    }
}
