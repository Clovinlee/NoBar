<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chair extends Model
{
    use HasFactory;
    public function studio()
    {
        return $this->belongsTo(Studio::class);
    }
    public function dtrans()
    {
        return $this->hasMany(Dtrans::class);
    }
}
