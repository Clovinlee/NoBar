<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Snack extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "snacks";

    public static function getSnackNew(){
        $db=Snack::whereDate("created_at",Carbon::today())->orderBy("id","desc")->limit(3)->get();
        //$db = DB::select("select * from snacks where DATE(snacks.created_at) = DATE(current_date) order by id desc limit 3");
        return $db;
    }
    // public static function getSnackNewAjax(){
    //     $db=Snack::whereDate("created_at",Carbon::today())->orderBy("id","desc")->limit(3)->get();
    //     //$db = DB::select("select * from snacks where DATE(snacks.created_at) = DATE(current_date) order by id desc limit 3");
    //     return $db;
    // }
}
