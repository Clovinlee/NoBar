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

}
