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
            "user"=>1,
            "schedule"=>1,
            "total"=>100000,
            "status"=>1
        ]);
        Htrans::create([
            "user"=>1,
            "schedule"=>3,
            "total"=>50000,
            "status"=>1
        ]);
        Htrans::create([
            "user"=>1,
            "schedule"=>2,
            "total"=>50000,
            "status"=>0
        ]);
    }
}
