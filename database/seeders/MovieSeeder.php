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
            "director"=>"Peter Ramsey, Bob Persichetti, and Rodney Rothman",
            "producer"=>"Avi Arad, Amy Pascal, Phil Lord, Christopher Miller, Christina Steinberg",
            "casts"=>"Shameik Moore, Jake Johnson, Hailee Steinfeld, Mahershala Ali, Brian Tyree Henry",
            "Synopsis"=>"In 1943 Los Alamos, New Mexico, a team of government scientists is working on the top-secret Manhattan Project in a race to produce an atomic bomb before the Nazis. Meanwhile, their families adjust to life on the military base.",
            "genre"=>"Superhero, Comedy, Action",
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
            "image"=>"simpsonnothome.png",
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

        Movie::create([
            "judul"=>"Avenger Last Breath",
            "slug"=>"avenger-last-breath",
            "image"=>"avengerlastbreath.jpg",
            "director"=>"Chrisanto Sinatra",
            "producer"=>"Avi Arad, Amy Pascal, Phil Lord, Christopher Miller, Christina Steinberg",
            "casts"=>"Rachel Brosnahan, Michael Chernus, Christopher Denham",
            "Synopsis"=>"In 1943, thor mati.",
            "genre"=>"History, War",
            "duration"=>"120",
            "status"=>"0",
        ]);

        Movie::create([
            "judul"=>"Annoying George",
            "slug"=>"annoying-george",
            "image"=>"annoyinggeorge.jpg",
            "director"=>"Georgio Manadaros",
            "producer"=>"Avi Arad, Amy Pascal, Phil Lord, Christopher Miller, Christina Steinberg",
            "casts"=>"Rachel Brosnahan, Michael Chernus, Christopher Denham",
            "Synopsis"=>"George the jungle hates the jungle.",
            "genre"=>"Nature, Life",
            "duration"=>"135",
            "status"=>"0",
        ]);

        Movie::create([
            "judul"=>"The State of Detroit",
            "slug"=>"the-state-of-detroit",
            "image"=>"thestateofdetroit.jpg",
            "director"=>"Makalo Kamalo",
            "producer"=>"Avi Arad, Amy Pascal, Phil Lord, Christopher Miller, Christina Steinberg",
            "casts"=>"Rachel Brosnahan, Michael Chernus, Christopher Denham",
            "Synopsis"=>"Detroit or texas, you choose.",
            "genre"=>"Nature, Life",
            "duration"=>"135",
            "status"=>"0",
        ]);

        Movie::create([
            "judul"=>"CyberNesia",
            "slug"=>"cybernesia",
            "image"=>"cybernesia.jpg",
            "director"=>"Kamaji Madaji",
            "producer"=>"Avi Arad, Amy Pascal, Phil Lord, Christopher Miller, Christina Steinberg",
            "casts"=>"Rachel Brosnahan, Michael Chernus, Christopher Denham",
            "Synopsis"=>"Wake up bamboo runcing, we have a city to burn",
            "genre"=>"History, cyberpunk",
            "duration"=>"135",
            "status"=>"0",
        ]);
    }
}
