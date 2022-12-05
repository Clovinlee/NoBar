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
            "htrans_id"=>1,
            "chair"=>"A1"
        ]);
        Dtrans::create([
            "htrans_id"=>1,
            "chair"=>"A2"
        ]);
        Dtrans::create([
            "htrans_id"=>1,
            "chair"=>"A3"
        ]);
        Dtrans::create([
            "htrans_id"=>1,
            "chair"=>"A4"
        ]);
        Dtrans::create([
            "htrans_id"=>1,
            "chair"=>"A5"
        ]);
        Dtrans::create([
            "htrans_id"=>2,
            "chair"=>"B1"
        ]);
        
        Dtrans::create([
            "htrans_id"=>2,
            "chair"=>"B2"
        ]);
        
        Dtrans::create([
            "htrans_id"=>3,
            "chair"=>"C1"
        ]);
        
        Dtrans::create([
            "htrans_id"=>4,
            "chair"=>"D1"
        ]);
        
        Dtrans::create([
            "htrans_id"=>4,
            "chair"=>"D2"
        ]);
        
        Dtrans::create([
            "htrans_id"=>5,
            "chair"=>"E1"
        ]);
        Dtrans::create([
            "htrans_id"=>5,
            "chair"=>"E2"
        ]);
        Dtrans::create([
            "htrans_id"=>5,
            "chair"=>"E3"
        ]);
        Dtrans::create([
            "htrans_id"=>5,
            "chair"=>"E4"
        ]);
        Dtrans::create([
            "htrans_id"=>6,
            "chair"=>"F6"
        ]);
        Dtrans::create([
            "htrans_id"=>6,
            "chair"=>"F7"
        ]);
        Dtrans::create([
            "htrans_id"=>6,
            "chair"=>"F8"
        ]);
        Dtrans::create([
            "htrans_id"=>6,
            "chair"=>"F9"
        ]);
        Dtrans::create([
            "htrans_id"=>6,
            "chair"=>"F10"
        ]);
        Dtrans::create([
            "htrans_id"=>6,
            "chair"=>"F11"
        ]);
        Dtrans::create([
            "htrans_id"=>7,
            "chair"=>"G1"
        ]);
        Dtrans::create([
            "htrans_id"=>8,
            "chair"=>"H5"
        ]);
        
        Dtrans::create([
            "htrans_id"=>8,
            "chair"=>"H6"
        ]);
        
        Dtrans::create([
            "htrans_id"=>9,
            "chair"=>"I1"
        ]);
        
        Dtrans::create([
            "htrans_id"=>9,
            "chair"=>"I2"
        ]);
        
        Dtrans::create([
            "htrans_id"=>9,
            "chair"=>"I3"
        ]);
        
        Dtrans::create([
            "htrans_id"=>10,
            "chair"=>"J11"
        ]);
        
        Dtrans::create([
            "htrans_id"=>10,
            "chair"=>"J12"
        ]);
        
        Dtrans::create([
            "htrans_id"=>10,
            "chair"=>"J13"
        ]);
        
        Dtrans::create([
            "htrans_id"=>10,
            "chair"=>"J14"
        ]);
        
        Dtrans::create([
            "htrans_id"=>11,
            "chair"=>"A10"
        ]);
    }
}
