<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Studio;
use Illuminate\Http\Request;
use stdClass;

class AdminController extends Controller
{
    //
    public function index(){
        $data=new stdClass;
        $data->branch=Branch::all();
        $data->studio=Studio::orderBy("branch_id")->get();
        $data->schedule=Schedule::all();
        $data->schedule->asal="";
        $data->schedule->nama="";
        $data->movie=Movie::all();
        return view("admin.admin")->with("data",$data);
    }
}
