<?php

namespace Database\Seeders;

use App\Models\branch_id;
use App\Models\Studio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Studio::create([
            "branch_id"=>1,
            "nama"=>"Studio 1",
            "slot"=>90
        ]);
        
        Studio::create([
            "branch_id"=>1,
            "nama"=>"Studio IMAX",
            "slot"=>150
        ]);

        Studio::create([
            "branch_id"=>1,
            "nama"=>"Studio 2",
            "slot"=>100
        ]);

        Studio::create([
            "branch_id"=>1,
            "nama"=>"Studio 3",
            "slot"=>80
        ]);

        Studio::create([
            "branch_id"=>2,
            "nama"=>"Studio 1",
            "slot"=>108
        ]);
        Studio::create([
            "branch_id"=>3,
            "nama"=>"Studio Premiere 1",
            "slot"=>30
        ]);
    }
}
