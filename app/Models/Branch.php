<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;

class Branch extends Model
{
    use HasFactory;

    public function studio()
    {
        return $this->hasMany(Studio::class);
    }

    public function schedules(){
        return $this->hasMany(Schedule::class);
    }
    public function adminpage(Request $r){
        if ($r->ajax()) {
            return Branch::all();
        }
    }
}
