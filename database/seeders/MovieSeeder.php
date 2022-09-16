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
            "Synopsis"=>"In 1943 Los Alamos, New Mexico, a team of government scientists is working on the top-secret Manhattan Project in a race to produce an atomic bomb before the Nazis. Meanwhile, their families adjust to life on the military base.",
            "genre"=>"Superhero",
            "duration"=>"116",
            "status"=>"0"
        ]);

        Movie::create([
            "judul"=>"Manhattan Family",
            "slug"=>"manhattan-family",
            "image"=>"manhattan.jpg",
            "director"=>"Sam Shaw",
            "producer"=>"Avi Arad, Amy Pascal, Phil Lord, Christopher Miller, Christina Steinberg",
            "casts"=>"Rachel Brosnahan, Michael Chernus, Christopher Denham",
            "Synopsis"=>"In 1943 Los Alamos, New Mexico, a team of government scientists is working on the top-secret Manhattan Project in a race to produce an atomic bomb before the Nazis. Meanwhile, their families adjust to life on the military base.",
            "genre"=>"History, War",
            "duration"=>"30",
            "status"=>"0",
        ]);

        Movie::create([
            "judul"=>"Simpson Not Home",
            "slug"=>"simpson-not-home",
            "image"=>"simpsonnothome.jpg",
            "director"=>"Sam Shaw",
            "producer"=>"Avi Arad, Amy Pascal, Phil Lord, Christopher Miller, Christina Steinberg",
            "casts"=>"Rachel Brosnahan, Michael Chernus, Christopher Denham",
            "Synopsis"=>"In 1943 Los Alamos, New Mexico, a team of government scientists is working on the top-secret Manhattan Project in a race to produce an atomic bomb before the Nazis. Meanwhile, their families adjust to life on the military base.",
            "genre"=>"History, War",
            "duration"=>"30",
            "status"=>"0",
        ]);

        Movie::create([
            "judul"=>"Leverestence Mundia",
            "slug"=>"leverestence-mundia",
            "image"=>"leverestencemundia.jpg",
            "director"=>"Sam Shaw",
            "producer"=>"Avi Arad, Amy Pascal, Phil Lord, Christopher Miller, Christina Steinberg",
            "casts"=>"Rachel Brosnahan, Michael Chernus, Christopher Denham",
            "Synopsis"=>"In 1943 Los Alamos, New Mexico, a team of government scientists is working on the top-secret Manhattan Project in a race to produce an atomic bomb before the Nazis. Meanwhile, their families adjust to life on the military base.",
            "genre"=>"History, War",
            "duration"=>"30",
            "status"=>"0",
        ]);
    }
}
