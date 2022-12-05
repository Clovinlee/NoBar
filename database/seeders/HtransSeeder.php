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
        Htrans::create([
            "id"=>1,
            "transaction_id"=>1,
            "user_id"=>1,
            "schedule_id"=>1,
            "status"=>"settlement",
            "total"=>100000,
            "created_at" => date("Y-m-d h:i:s", strtotime("2022-11-01 14:34:53"))
        ]);
        Htrans::create([
            "id"=>2,
            "transaction_id"=>2,
            "user_id"=>1,
            "schedule_id"=>2,
            "status"=>"settlement",
            "total"=>200000,
            "created_at" => date("Y-m-d h:i:s", strtotime("2022-11-02 14:34:53"))
        ]);
        Htrans::create([
            "id"=>3,
            "transaction_id"=>3,
            "user_id"=>1,
            "schedule_id"=>3,
            "status"=>"settlement",
            "total"=>300000,
            "created_at" => date("Y-m-d h:i:s", strtotime("2022-11-03 14:34:53"))
        ]);
        Htrans::create([
            "id"=>4,
            "transaction_id"=>4,
            "user_id"=>2,
            "schedule_id"=>4,
            "status"=>"settlement",
            "total"=>400000,
            "created_at" => date("Y-m-d h:i:s", strtotime("2022-11-04 14:34:53"))
        ]);
        Htrans::create([
            "id"=>5,
            "transaction_id"=>5,
            "user_id"=>2,
            "schedule_id"=>5,
            "status"=>"settlement",
            "total"=>500000,
            "created_at" => date("Y-m-d h:i:s", strtotime("2022-11-05 14:34:53"))
        ]);
        Htrans::create([
            "id"=>6,
            "transaction_id"=>6,
            "user_id"=>2,
            "schedule_id"=>6,
            "status"=>"settlement",
            "total"=>600000,
            "created_at" => date("Y-m-d h:i:s", strtotime("2022-11-06 14:34:53"))
        ]);
        Htrans::create([
            "id"=>7,
            "transaction_id"=>7,
            "user_id"=>3,
            "schedule_id"=>7,
            "status"=>"settlement",
            "total"=>700000,
            "created_at" => date("Y-m-d h:i:s", strtotime("2022-11-07 14:34:53"))
        ]);
        Htrans::create([
            "id"=>8,
            "transaction_id"=>8,
            "user_id"=>3,
            "schedule_id"=>8,
            "status"=>"settlement",
            "total"=>800000,
            "created_at" => date("Y-m-d h:i:s", strtotime("2022-11-08 14:34:53"))
        ]);
        Htrans::create([
            "id"=>9,
            "transaction_id"=>9,
            "user_id"=>3,
            "schedule_id"=>9,
            "status"=>"settlement",
            "total"=>900000,
            "created_at" => date("Y-m-d h:i:s", strtotime("2022-12-02 14:34:53"))
        ]);
        Htrans::create([
            "id"=>10,
            "transaction_id"=>10,
            "user_id"=>1,
            "schedule_id"=>10,
            "status"=>"settlement",
            "total"=>1000000,
            "created_at" => date("Y-m-d h:i:s", strtotime("2022-12-03 14:34:53"))
        ]);
        Htrans::create([
            "id"=>11,
            "transaction_id"=>11,
            "user_id"=>3,
            "schedule_id"=>11,
            "status"=>"settlement",
            "total"=>1100000,
            "created_at" => date("Y-m-d h:i:s", strtotime("2022-12-04 14:34:53"))
        ]);
    }
}
