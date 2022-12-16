<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(){
        $wL = env("WEEK_LATER");
        $weekLater = date('Y-m-d', strtotime(now(). ' + '.$wL.' days'));
        $nowPlaying = Schedule::whereDate('time',"<",$weekLater)->pluck("movie_id")->unique();

        $upComing = DB::select('select * from movies m where m.deleted_at is null 
        and (m.id not in (select movie_id from schedules) 
        and m.id not in (select movie_id from schedules where time < '.$weekLater.' ) )');


        return view("index",["nowPlaying" => $nowPlaying, "upComing" => $upComing]);
    }

    public function nowplaying(){
        $wL = env("WEEK_LATER");
        $weekLater = date('Y-m-d', strtotime(now(). ' + '.$wL.' days'));
        $nowPlaying = Schedule::whereDate('time',"<",$weekLater)->pluck("movie_id")->unique();

        return view("nowplaying", ["nowPlaying" => $nowPlaying]);
    }

    public function comingsoon(){
        $upComing = DB::select('select * from movies m where m.id not in (select movie_id from schedules)');
        return view("comingsoonpage",["upcoming" => $upComing]);
    }

    public function membership(){
        return view("membership");
    }

    public function contact(){
        return view("contact");
    }
    public function history(){
        return view("history");
    }
}
