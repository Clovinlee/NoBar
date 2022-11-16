<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Htrans extends Model
{
    use HasFactory;

    //protected $with = ["user","schedule","dtrans"];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function dtrans()
    {
        return $this->hasMany(Dtrans::class);
    }
    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
}
