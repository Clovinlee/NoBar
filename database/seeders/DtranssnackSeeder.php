<?php

namespace Database\Seeders;

use App\Models\Dtranssnack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DtranssnackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Dtranssnack::create([
            "htranssnack_id"=>1,
            "snack_id"=>1,
            "harga"=>12000,
            "qty"=>5
        ]);
        Dtranssnack::create([
            "htranssnack_id"=>1,
            "snack_id"=>5,
            "harga"=>10000,
            "qty"=>4
        ]);
        Dtranssnack::create([
            "htranssnack_id"=>2,
            "snack_id"=>2,
            "harga"=>12000,
            "qty"=>10
        ]);
        Dtranssnack::create([
            "htranssnack_id"=>2,
            "snack_id"=>3,
            "harga"=>12000,
            "qty"=>5
        ]);
        Dtranssnack::create([
            "htranssnack_id"=>2,
            "snack_id"=>4,
            "harga"=>10000,
            "qty"=>2
        ]);
        Dtranssnack::create([
            "htranssnack_id"=>3,
            "snack_id"=>3,
            "harga"=>12000,
            "qty"=>5
        ]);
        
        Dtranssnack::create([
            "htranssnack_id"=>3,
            "snack_id"=>7,
            "harga"=>12000,
            "qty"=>5
        ]);
        
        Dtranssnack::create([
            "htranssnack_id"=>3,
            "snack_id"=>6,
            "harga"=>15000,
            "qty"=>6
        ]);
        
        Dtranssnack::create([
            "htranssnack_id"=>3,
            "snack_id"=>8,
            "harga"=>15000,
            "qty"=>6
        ]);

        
        Dtranssnack::create([
            "htranssnack_id"=>4,
            "snack_id"=>8,
            "harga"=>15000,
            "qty"=>10
        ]);
        
        Dtranssnack::create([
            "htranssnack_id"=>4,
            "snack_id"=>6,
            "harga"=>15000,
            "qty"=>10
        ]);
        
        Dtranssnack::create([
            "htranssnack_id"=>4,
            "snack_id"=>5,
            "harga"=>10000,
            "qty"=>5
        ]);
        
        Dtranssnack::create([
            "htranssnack_id"=>4,
            "snack_id"=>4,
            "harga"=>10000,
            "qty"=>5
        ]);

        
        Dtranssnack::create([
            "htranssnack_id"=>5,
            "snack_id"=>1,
            "harga"=>12000,
            "qty"=>10
        ]);
        
        Dtranssnack::create([
            "htranssnack_id"=>5,
            "snack_id"=>2,
            "harga"=>12000,
            "qty"=>10
        ]);
        
        Dtranssnack::create([
            "htranssnack_id"=>5,
            "snack_id"=>3,
            "harga"=>12000,
            "qty"=>10
        ]);
        
        Dtranssnack::create([
            "htranssnack_id"=>6,
            "snack_id"=>1,
            "harga"=>15000,
            "qty"=>8
        ]);
        
        Dtranssnack::create([
            "htranssnack_id"=>5,
            "snack_id"=>5,
            "harga"=>10000,
            "qty"=>2
        ]);
    }
}
