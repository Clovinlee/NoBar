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
            "image"=>"spiderverse.jpg",
            "director"=>"Peter Ramsey, Bob Persichetti, and Rodney Rothman",
            "producer"=>"Avi Arad, Amy Pascal, Phil Lord, Christopher Miller, Christina Steinberg",
            "casts"=>"Shameik Moore, Jake Johnson, Hailee Steinfeld, Mahershala Ali, Brian Tyree Henry",
            "status"=>"0"
        ]);

        Movie::create([
            "judul"=>"Manhattan Family",
            "slug"=>"manhattan-family",
            "image"=>"manhattan.jpg",
            "status"=>"0",
        ]);

        Movie::create([
            "judul"=>"Simpson Not Home",
            "slug"=>"simpson-not-home",
            "image"=>"simpsonnothome.jpg",
            "status"=>"0",
        ]);

        Movie::create([
            "judul"=>"Leverestence Mundia",
            "slug"=>"leverestence-mundia",
            "image"=>"leverestencemundia.jpg",
            "status"=>"0",
        ]);
    }
}
