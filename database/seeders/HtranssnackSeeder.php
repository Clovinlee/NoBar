<?php

namespace Database\Seeders;

use App\Models\Htranssnack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HtranssnackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Htranssnack::create([
            "transaction_id"=>1,
            "user_id"=>2,
            "branch_id"=>1,
            "status"=>"settlement",
            "total"=>100000,
            "created_at" => date("Y-m-d h:i:s", strtotime("2022-12-11 14:34:53"))
        ]);
        Htranssnack::create([
            "transaction_id"=>2,
            "user_id"=>2,
            "branch_id"=>2,
            "status"=>"settlement",
            "total"=>200000,
            "created_at" => date("Y-m-d h:i:s", strtotime("2022-12-12 14:34:53"))
        ]);
        Htranssnack::create([
            "transaction_id"=>3,
            "user_id"=>2,
            "branch_id"=>3,
            "status"=>"settlement",
            "total"=>300000,
            "created_at" => date("Y-m-d h:i:s", strtotime("2022-12-13 14:34:53"))
        ]);
        Htranssnack::create([
            "transaction_id"=>4,
            "user_id"=>2,
            "branch_id"=>3,
            "status"=>"settlement",
            "total"=>400000,
            "created_at" => date("Y-m-d h:i:s", strtotime("2022-12-14 14:34:53"))
        ]);
        Htranssnack::create([
            "transaction_id"=>5,
            "user_id"=>2,
            "branch_id"=>3,
            "status"=>"settlement",
            "total"=>500000,
            "created_at" => date("Y-m-d h:i:s", strtotime("2022-12-15 14:34:53"))
        ]);
    }
}
