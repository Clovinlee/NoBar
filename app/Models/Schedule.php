<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class Schedule extends Model
{
    use HasFactory;

    protected $table = "schedules";

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function studio(){
        return $this->belongsTo(Studio::class);
    }
    public function branch(){
        return $this->belongsTo(Branch::class);
    }

}
