<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Movie::create([
            "judul"=>"Spiderman The Spiderverse",
            "slug"=>"spiderman-the-spiderverse",
            "image"=>"spiderman.jpg",
            "status"=>"0",
        ]);

        Movie::create([
            "judul"=>"Manhattan Family",
            "slug"=>"manhattan-family",
            "image"=>"spiderman.jpg",
            "status"=>"0",
        ]);

        Movie::create([
            "judul"=>"Simpson Not Home",
            "slug"=>"simpson-not-home",
            "image"=>"spiderman.jpg",
            "status"=>"0",
        ]);

        Movie::create([
            "judul"=>"Leverestence Mundia",
            "slug"=>"leverestence-mundia",
            "image"=>"spiderman.jpg",
            "status"=>"0",
        ]);
    }
}
