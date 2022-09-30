<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;

    protected $with = ["branch","schedule"];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function chair()
    {
        return $this->hasMany(Chair::class,"studio");
    }
    public function schedule()
    {
        return $this->hasMany(Schedule::class,"studio");
    }
}
