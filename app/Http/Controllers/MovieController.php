<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Branch;
use App\Models\Schedule;
use App\Models\Studio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use function PHPSTORM_META\map;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Movie $movie)
    {
        //
        return view("movie.detailmovie",["movie" => $movie]);
    }

    public function schedule(Movie $movie){
        $tNow = date("Y-m-d");

        $tNext = date("Y-m-d", strtotime(date("Y-m-d") . "1 days"));

        $scheduleNow = $movie->schedule()->whereDate("time",$tNow)->orderBy("time","ASC")->get();
        $scheduleTomorrow = $movie->schedule()->whereDate("time",$tNext)->orderBy("time","ASC")->get();

        // $scheduleNow = DB::table("schedules")->where("movie_id",$movie->id)->whereDate("time",$tNow)->get();
        // $scheduleTomorrow = DB::table("schedules")->where("movie_id",$movie->id)->whereDate("time",$tNext)->get();

        //Access using for loop, then ->branch
        $branchNow = $scheduleNow->unique("branch_id");
        $branchTomorrow = $scheduleTomorrow->unique("branch_id");

        return view("movie.schedulepage",["movie" => $movie, "scheduleNow" => $scheduleNow, "scheduleTomorrow" => $scheduleTomorrow, "branchNow" => $branchNow, "branchTomorrow" => $branchTomorrow]);
    }

    public function verifyschedule(Movie $movie, Request $r){
        $inp = $r->input();

        $token = $inp["_token"] ?? "";
        if($token == csrf_token()){
            $schedule = Schedule::find($inp["idJadwal"]);
            return view("movie.bookingseat",["movie"=>$movie, "data"=>$inp, "schedule"=>$schedule]);
        }else{
            return abort(403);
        }

    }

    public function booking_seat(Request $r){
        // _token
        // $jadwal = $r->jadwal;
        // $slugMovie = $r->slugMovie;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
