<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            "email"=>"mxzero@gmail.com",
            "email_verified_at"=>now(),
            "password"=>'$2y$10$mlYUCprlpKjUido8kw6CAuFEZSiysVIM9UcdDeKedFDHnKcgf2BzS', //mxzero
            "role"=>1
        ]);

        User::create([
            "name"=>"Chrisanto",
            "email"=>"chris@gmail.com",
            "password"=>'$2y$10$j9yWUE1./bhJzP7Uy4Y2vemTtPwiQsly1pckI.7gWexuAQYd.ssni', //chrisanto
            "role"=>2
        ]);
    }
}