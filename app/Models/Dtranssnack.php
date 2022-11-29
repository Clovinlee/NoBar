<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtranssnack extends Model
{
    use HasFactory;

    public function snack(){
        return $this->belongsTo(Snack::class);
    }

    public function htranssnack(){
        return $this->belongsTo(Htranssnack::class);
    }

}
