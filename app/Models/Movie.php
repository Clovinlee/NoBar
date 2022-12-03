<?php

namespace App\Models;

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

    public function getmovietoday(){
        $db = DB::select('select * from movies where DATE(movies.created_at) = DATE(current_date)');
        return $db;
    }

    public function getmovienewest(){
        // $db = DB::select('select * from movies where id = "select ident_current(`movies`)"' );
        $id = DB::table("movies")->find(DB::table('movies')->max('id'));
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
}
