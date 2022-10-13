<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Movie;
use App\Models\Schedule;
use Illuminate\Http\Request;
use stdClass;

class AdminController extends Controller
{
    //
    public function index(){
        $data=new stdClass;
        $data->branch=Branch::all();
        $data->schedule=Schedule::all();
        $data->movie=Movie::all();
        return view("admin.admin")->with("data",$data);
    }
}
