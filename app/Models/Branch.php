<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Client\Request;

class Branch extends Model
{
    use HasFactory,SoftDeletes;

    public function studio()
    {
        return $this->hasMany(Studio::class);
    }

    public function schedule(){
        return $this->hasMany(Schedule::class);
    }
}
