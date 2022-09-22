<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    // protected $with = ["schedule"];

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
}
