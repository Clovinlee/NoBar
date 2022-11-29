<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Studio;
use App\Models\Snack;
use Illuminate\Http\Request;
use stdClass;

class AdminController extends Controller
{
    //
    public function index(){
        $data=new stdClass;
        $data->branch=Branch::all();
        $data->studio=Studio::orderBy("branch_id")->get();
        $data->snack = Snack::all();
        $data->schedule=Schedule::all();
        $data->schedule->asal="";
        $data->schedule->nama="";
        $data->movie=Movie::all();
        return view("admin.admin")->with("data",$data);
    }
    public function Get()
    {
        $data=new stdClass;
        $data->branch=Branch::all();
        foreach ($data->branch as $key => $s) {
            $s->studio=$s->studio;
        }
        $data->schedule=Schedule::all();
        $data->movie=Movie::all();
        return json_encode($data);
    }
}
