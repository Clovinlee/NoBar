<?php

namespace Database\Seeders;

use App\Models\Dtrans;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DtransSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Dtrans::create([
            "htrans"=>1,
            "chair"=>1
        ]);
    }
}
