<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Movie extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "movies";

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }

    public static function getmovietoday(){

        //$db = DB::select('select * from movies where DATE(movies.created_at) = DATE(current_date) limit 3');
        $db=Movie::whereIn("id",function ($q)
        {
            $q->select("movie_id")
            ->from("schedules")
            ->whereDate("time",Carbon::today());
            //->where("deleted_at","=","null");
        })
        ->whereNotIn("id",function ($q)
        {
            $q->select("movie_id")
            ->from("schedules")
            ->where("deleted_at","!=","null");
        })
        ->get();
        return $db;
    }
    // public function getmovietodayAjax(){
    //     $db=Movie::whereDate("created_at",Carbon::today())->get();
    //     //$db = DB::select('select * from movies where DATE(movies.created_at) = DATE(current_date) limit 3');
    //     return $db;
    // }

    public static function getmovienewest(){
        // $db = DB::select('select * from movies where id = "select ident_current(`movies`)"' );
        $id = Movie::orderBy("id","desc")->limit(3)->get();
        // $id = DB::table('movies')->where('id', DB::raw("(select max(`id`) from movies)"))->first();
        // dd($id);
        // $db = DB::table("movies")->where('id', $id)->first();
        // // $data = DB::table("movies")
        // //         ->orderBy("id", "desc")
        // //         ->first();
        // dd($db);
        // $db = DB::table("movies")->orderBy('id', 'desc')->first();
        return $id;
    }
    // public static function getmovienewestAjax(){
    //     // $db = DB::select('select * from movies where id = "select ident_current(`movies`)"' );
    //     $id = DB::table("movies")->orderBy("id","desc")->limit(3)->get();
    //     // $id = DB::table('movies')->where('id', DB::raw("(select max(`id`) from movies)"))->first();
    //     // dd($id);
    //     // $db = DB::table("movies")->where('id', $id)->first();
    //     // // $data = DB::table("movies")
    //     // //         ->orderBy("id", "desc")
    //     // //         ->first();
    //     // dd($db);
    //     // $db = DB::table("movies")->orderBy('id', 'desc')->first();
    //     return $id;
    // }
}
