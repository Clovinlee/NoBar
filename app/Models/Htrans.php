<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Htrans extends Model
{
    use HasFactory;
    public function schedule()
    {
        $this->belongsTo(Schedule::class);
    }
    public function user()
    {
        $this->belongsTo(User::class);
    }
}
