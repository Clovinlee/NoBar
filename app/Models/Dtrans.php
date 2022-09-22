<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtrans extends Model
{
    use HasFactory;

    protected $with = ["htrans"];

    public function htrans()
    {
        return $this->belongsTo(Htrans::class);
    }
    public function chair()
    {
        return $this->belongsTo(Chair::class);
    }
}
