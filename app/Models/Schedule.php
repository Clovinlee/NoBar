<?php

namespace App\Models;

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

    public function schedulelalu(){
        $qry = Schedule::select('movies.judul', 'movies.image')
                ->distinct()
                ->join('movies', 'schedules.movie_id', '=', 'movies.id')
                ->where('schedules.time', '<', date("Y-m-d, 0:0:0"))
                ->get();
        print_r(date("Y-m-d, 0:0:0"));
        return $qry;
    }

    public function schedulesetelah(){
        $qry = Schedule::select('schedules.*', 'movies.judul', 'movies.image', 'studios.nama', 'branches.nama as lokasi')
                ->join('movies', 'schedules.movie_id', '=', 'movies.id')
                ->join('studios', 'schedules.studio_id', '=', 'studios.id')
                ->join('branches', 'schedules.branch_id', '=', 'branches.id')
                ->where('schedules.time', '>', date("Y-m-d, 0:0:0"))
                ->get();
        
        return $qry;
    }
}
