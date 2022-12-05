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
            "seat"=>"A1"
        ]);
        Dtrans::create([
            "htrans_id"=>1,
            "seat"=>"A2"
        ]);
        Dtrans::create([
            "htrans_id"=>1,
            "seat"=>"A3"
        ]);
        Dtrans::create([
            "htrans_id"=>1,
            "seat"=>"A4"
        ]);
        Dtrans::create([
            "htrans_id"=>1,
            "seat"=>"A5"
        ]);
        Dtrans::create([
            "htrans_id"=>2,
            "seat"=>"B1"
        ]);
        
        Dtrans::create([
            "htrans_id"=>2,
            "seat"=>"B2"
        ]);
        
        Dtrans::create([
            "htrans_id"=>3,
            "seat"=>"C1"
        ]);
        
        Dtrans::create([
            "htrans_id"=>4,
            "seat"=>"D1"
        ]);
        
        Dtrans::create([
            "htrans_id"=>4,
            "seat"=>"D2"
        ]);
        
        Dtrans::create([
            "htrans_id"=>5,
            "seat"=>"E1"
        ]);
        Dtrans::create([
            "htrans_id"=>5,
            "seat"=>"E2"
        ]);
        Dtrans::create([
            "htrans_id"=>5,
            "seat"=>"E3"
        ]);
        Dtrans::create([
            "htrans_id"=>5,
            "seat"=>"E4"
        ]);
        Dtrans::create([
            "htrans_id"=>6,
            "seat"=>"F6"
        ]);
        Dtrans::create([
            "htrans_id"=>6,
            "seat"=>"F7"
        ]);
        Dtrans::create([
            "htrans_id"=>6,
            "seat"=>"F8"
        ]);
        Dtrans::create([
            "htrans_id"=>6,
            "seat"=>"F9"
        ]);
        Dtrans::create([
            "htrans_id"=>6,
            "seat"=>"F10"
        ]);
        Dtrans::create([
            "htrans_id"=>6,
            "seat"=>"F11"
        ]);
        Dtrans::create([
            "htrans_id"=>7,
            "seat"=>"G1"
        ]);
        Dtrans::create([
            "htrans_id"=>8,
            "seat"=>"H5"
        ]);
        
        Dtrans::create([
            "htrans_id"=>8,
            "seat"=>"H6"
        ]);
        
        Dtrans::create([
            "htrans_id"=>9,
            "seat"=>"I1"
        ]);
        
        Dtrans::create([
            "htrans_id"=>9,
            "seat"=>"I2"
        ]);
        
        Dtrans::create([
            "htrans_id"=>9,
            "seat"=>"I3"
        ]);
        
        Dtrans::create([
            "htrans_id"=>10,
            "seat"=>"J11"
        ]);
        
        Dtrans::create([
            "htrans_id"=>10,
            "seat"=>"J12"
        ]);
        
        Dtrans::create([
            "htrans_id"=>10,
            "seat"=>"J13"
        ]);
        
        Dtrans::create([
            "htrans_id"=>10,
            "seat"=>"J14"
        ]);
        
        Dtrans::create([
            "htrans_id"=>11,
            "seat"=>"A10"
        ]);
    }
}
