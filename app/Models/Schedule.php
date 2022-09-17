<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $with = ["movie","studio"];

    public function studio()
    {
        return $this->belongsTo(Studio::class);
    }
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
    public function htrans()
    {
        return $this->hasMany(Htrans::class);
    }
}
