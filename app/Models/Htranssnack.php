<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Htranssnack extends Model
{
    use HasFactory;

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
}
