<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtrans extends Model
{
    use HasFactory;
    public function htrans()
    {
        $this->belongsTo(Htrans::class);
    }
    public function chair()
    {
        $this->belongsTo(Chair::class);
    }
}
