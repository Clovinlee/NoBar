<?php

namespace Database\Seeders;

use App\Models\Branch;
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
            "branch"=>1,
            "nama"=>"Studio 1",
            "slot"=>90
        ]);
    }
}
