<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Branch;
use App\Models\Dtrans;
use App\Models\Htrans;
use App\Models\Schedule;
use App\Models\Studio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use stdClass;

use function PHPSTORM_META\map;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function DashBoard(Request $r)
    {
        if ($r->ajax()) {
            $d=new stdClass();
            $d->mn=Movie::getmovienewest();
            $d->mt=Movie::getmovietoday();
            $d->sb=Schedule::schedulelalu();
            $d->sa=Schedule::schedulesetelah();
            return json_encode($d);
        }
    }
    public function index(Movie $movie)
    {
        //Now playing or Upcoming
        $queryStatus = DB::select('select * from movies m where m.id = ? and m.id not in (select movie_id from schedules)',[$movie->id]);
        $movieStatus = "Upcoming";
        if(count($queryStatus) == 0){
            $movieStatus = "Now Playing";
        }

        //Shows for 4 days ahead of schedule
        $scheduleUntil = env("WEEK_LATER");

        $tNow = date("Y-m-d");
        $tNext = date("Y-m-d", strtotime(date("Y-m-d") . $scheduleUntil." days"));

        $schedules = $movie->schedule()->whereDate("time",">=",$tNow)->whereDate("time","<=",$tNext)->orderBy('time',"ASC");

        $branches = $schedules->get()->unique("branch_id")->pluck("branch_id");

        return view("movie.detailmovie",["movie" => $movie, "movieStatus" => $movieStatus, "branches" => $branches, "schedules" => $schedules, "scheduleUntil"=>$scheduleUntil]);
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

    public function verifyseat(Movie $movie, Request $r){
        dd($r->seats);
    }

    public function verifyschedule(Movie $movie, Request $r){
        $inp = $r->input();
        try {
            $schedule = Schedule::find($inp["idJadwal"]);
            $token = $inp["_token"];
            $jadwal = $inp["jadwal"];
            $seatList = [];
            $htrans = Htrans::where("schedule_id",$schedule->id)->where("status","!=","expire")->where("status","!=","deny")->where("status","!=","cancel")->get();
            foreach ($htrans as $kh => $h) {
                foreach ($h->dtrans as $kd => $d) {
                    $seatList[$d->seat] = $h->status;
                    // $seat = new stdClass();
                    // $seat->seat = $d->seat;
                    // $seat->status = $h->status;
                    // array_push($seatList,$seat);
                }
            }
        } catch (\Throwable $th) {
            return redirect(url("/"));
        }
        return view("movie.bookingseat",["movie"=>$movie, "data"=>$inp, "schedule"=>$schedule, "seatList"=>$seatList,"htrans"=>$htrans]);
    }

    public function booking_seat(Request $r){
        // _token
        // $jadwal = $r->jadwal;
        // $slugMovie = $r->slugMovie;

    }

    public function refreshBooked(Request $r){
        if($r->ajax()){
            $seatList = json_decode($r->seatList);
            $output = "Seats of <b>";
            $output .= join(", ",$seatList)."</b> are booked. Please choose another seat!";

            Session::flash("bookedseat",$output);

            return $output;
        }
    }
    public function DeleteMovie(Request $r)
    {
        if ($r->ajax()) {
            $m=Movie::find($r->id);
            $m->delete();
            $data=Movie::all();
            return json_encode($data);
        }
    }
    public function AddMovie(Request $r)
    {
        if ($r->ajax()) {
            $m=new Movie;
            $m->judul=$r->judul;
            $m->slug=str_replace(" ","-",$r->judul);
            $img=$r->file("image");
            //$img->storeAs("/movie",$img->getClientOriginalName(),'public');
            $imgname=strtolower($img->getClientOriginalName());
            $img->move(public_path()."/assets/images/",$imgname);
            $m->image=$imgname;
            $m->producer=$r->produser;
            $m->casts=$r->cast;
            $m->director=$r->director;
            $m->synopsis=$r->synopsis;
            $m->genre=$r->genre;
            $m->duration=$r->duration;
            $m->save();
            $data=Movie::all();
            return json_encode($data);
        }
    }
    public function EditMovie(Request $r)
    {
        if ($r->ajax()) {
            $m=Movie::find($r->id);
            $m->judul=$r->judul;
            $m->slug=str_replace(" ","-",$r->judul);
            $img=$r->file("image");
            $imgname=strtolower($img->getClientOriginalName());
            $img->move(public_path()."/assets/images/",$imgname);
            $m->image=$imgname;
            $m->producer=$r->produser;
            $m->casts=$r->cast;
            $m->director=$r->director;
            $m->synopsis=$r->synopsis;
            $m->genre=$r->genre;
            $m->duration=$r->duration;
            $m->save();
            $data=Movie::all();
            return json_encode($data);
        }
    }
    public function GetMovie(Request $r)
    {
        $m=Movie::find($r->id);
        return json_encode($m);
    }

}
