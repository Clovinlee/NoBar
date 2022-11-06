<?php

namespace Database\Seeders;

use App\Models\Htrans;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HtransSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Htrans::create([
            "user_id"=>1,
            "order_id"=>"auqi2u81",
            "schedule_id"=>1,
            "total"=>100000,
            "status"=>1
        ]);
        Htrans::create([
            "user_id"=>1,
            "order_id"=>"ijd81d",
            "schedule_id"=>3,
            "total"=>50000,
            "status"=>1
        ]);
        Htrans::create([
            "user_id"=>1,
            "order_id"=>"aksdasd02",
            "schedule_id"=>2,
            "total"=>50000,
            "status"=>0
        ]);
    }
}
