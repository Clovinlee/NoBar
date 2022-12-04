<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Snack extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "snacks";

    public function getSnackNew(){
        $db = DB::select("select * from snacks where DATE(snacks.created_at) = DATE(current_date)");
        return $db;
    }
}
