<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PDO;

class Schedule extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "schedules";

    public function movie()
    {
        return $this->belongsTo(Movie::class)->withTrashed();
    }

    public function studio(){
        return $this->belongsTo(Studio::class)->withTrashed();
    }
    public function branch(){
        return $this->belongsTo(Branch::class)->withTrashed();
    }

    public static function schedulelalu(){
        $qry = Schedule::select('movies.judul', 'movies.image')
                ->distinct()
                ->join('movies', 'schedules.movie_id', '=', 'movies.id')
                ->where('schedules.time', '<', date("Y-m-d, 0:0:0"))
                ->whereNotIn('movies.id',function ($q)
                {
                    $q->select("movie_id")
                    ->from("schedules")
                    ->whereDate("time",">=",Carbon::today());
                })
                ->whereIn('movies.id',function ($q)
                {
                    $q->select("movie_id")
                    ->from("schedules")
                    ->whereDate("time","<",Carbon::today());
                })
                ->get();
        //print_r(date("Y-m-d, 0:0:0"));
        return $qry;
    }

    public static function schedulesetelah(){
        $qry = Schedule::select('schedules.*', 'movies.judul', 'movies.image', 'studios.nama', 'branches.nama as lokasi')
                ->join('movies', 'schedules.movie_id', '=', 'movies.id')
                ->join('studios', 'schedules.studio_id', '=', 'studios.id')
                ->join('branches', 'schedules.branch_id', '=', 'branches.id')
                ->where('schedules.time', '>', date("Y-m-d, 0:0:0"))
                ->whereNotIn('movies.id',function ($q)
                {
                    $q->select("movie_id")
                    ->from("schedules")
                    ->whereDate("time","<=",Carbon::today());
                })
                ->whereIn('movies.id',function ($q)
                {
                    $q->select("movie_id")
                    ->from("schedules")
                    ->whereDate("time",">",Carbon::today());
                })
                ->limit(4)
                ->get();
        
        return $qry;
    }
}
