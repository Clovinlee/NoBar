<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            "name"=>"MxZero",
            "email"=>"mxzeromxzero6@gmail.com",
            "email_verified_at"=>now(),
            "password"=>Hash::make("mxzero"), //mxzero
            "role"=>1
        ]);

        User::create([
            "name"=>"Chrisanto",
            "email"=>"chris@gmail.com",
            "email_verified_at"=>now(),
            "password"=>Hash::make("chrisanto"), //chrisanto
            "role"=>2
        ]);

        User::create([
            "name"=>"Calvin Kwan",
            "email"=>"kwan@gmail.com",
            "password"=>Hash::make("kwan"), //kwan
            "role"=>3,
        ]);
    }
}
