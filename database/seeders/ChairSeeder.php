<?php

namespace Database\Seeders;

use App\Models\Chair;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chair::create([
            "studio_id"=>"1",
            "row"=>"A",
            "column"=>9
        ]);
        Chair::create([
            "studio_id"=>"3",
            "row"=>"C",
            "column"=>1
        ]);
        Chair::create([
            "studio_id"=>"1",
            "row"=>"D",
            "column"=>12
        ]);
        Chair::create([
            "studio_id"=>"2",
            "row"=>"F",
            "column"=>7
        ]);
        Chair::create([
            "studio_id"=>"3",
            "row"=>"E",
            "column"=>2
        ]);
    }
}
