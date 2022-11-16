<?php

namespace Database\Seeders;

use App\Models\Schedule;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tNow = date("Y-m-d");

        $tNext = date("Y-m-d", strtotime(date("Y-m-d") . "1 days"));

        Schedule::create([
            "movie_id"=>2,
            "studio_id"=>1, 
            "branch_id"=>1, 
            "price"=>45000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNow 04:00:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>1, 
            "branch_id"=>1,
            "price"=>45000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNow 08:00:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>2, 
            "branch_id"=>1,
            "price"=>45000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNow 08:30:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>3, 
            "branch_id"=>1,
            "price"=>45000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNow 09:30:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>4, 
            "branch_id"=>1,
            "price"=>45000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNow 10:30:00"))
        ]);

        // Schedule::create([
        //     "movie_id"=>1,
        //     "studio_id"=>5, 
        //     "branch_id"=>2,
        //     "price"=>45000,
        //     "time"=>date("Y-m-d H:i:s",strtotime("$tNow 13:20:00"))
        // ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>1, 
            "branch_id"=>1,
            "price"=>45000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNow 19:20:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>2, 
            "branch_id"=>1,
            "price"=>45000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNow 20:40:00"))
        ]);

        Schedule::create([
            "movie_id"=>3,
            "studio_id"=>3, 
            "branch_id"=>1,
            "price"=>45000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNow 21:40:00"))
        ]);

        Schedule::create([
            "movie_id"=>3,
            "studio_id"=>4, 
            "branch_id"=>1,
            "price"=>45000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNow 22:40:00"))
        ]);

        Schedule::create([
            "movie_id"=>3,
            "studio_id"=>5, 
            "branch_id"=>3,
            "price"=>45000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNow 14:20:00"))
        ]);

        Schedule::create([
            "movie_id"=>4,
            "studio_id"=>5, 
            "branch_id"=>2,
            "price"=>45000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNow 15:20:00"))
        ]);

        Schedule::create([
            "movie_id"=>4,
            "studio_id"=>5, 
            "branch_id"=>2,
            "price"=>45000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNow 11:20:00"))
        ]);

        Schedule::create([
            "movie_id"=>4,
            "studio_id"=>5, 
            "branch_id"=>3,
            "price"=>45000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNow 16:20:00"))
        ]);

        Schedule::create([
            "movie_id"=>4,
            "studio_id"=>5, 
            "branch_id"=>3,
            "price"=>45000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNow 12:20:00"))
        ]);

        // NEXT DAY

        Schedule::create([
            "movie_id"=>4,
            "studio_id"=>1, 
            "branch_id"=>1,
            "price"=>50000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNext 13:00:00"))
        ]);

        Schedule::create([
            "movie_id"=>3,
            "studio_id"=>2, 
            "branch_id"=>1,
            "price"=>50000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNext 08:30:00"))
        ]);

        Schedule::create([
            "movie_id"=>2,
            "studio_id"=>3, 
            "branch_id"=>1,
            "price"=>50000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNext 09:30:00"))
        ]);

        Schedule::create([
            "movie_id"=>3,
            "studio_id"=>4, 
            "branch_id"=>1,
            "price"=>50000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNext 10:30:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>1, 
            "branch_id"=>1,
            "price"=>50000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNext 13:20:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>2, 
            "branch_id"=>1,
            "price"=>50000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNext 14:20:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>3, 
            "branch_id"=>1,
            "price"=>50000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNext 15:20:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>4, 
            "branch_id"=>1,
            "price"=>50000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNext 16:20:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>1, 
            "branch_id"=>1,
            "price"=>50000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNext 19:20:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>2, 
            "branch_id"=>1,
            "price"=>50000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNext 20:40:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>5, 
            "branch_id"=>2,
            "price"=>50000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNext 21:40:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>5, 
            "branch_id"=>3,
            "price"=>50000,
            "time"=>date("Y-m-d H:i:s",strtotime("$tNext 22:40:00"))
        ]);

        //

        // Schedule::create([
        //     "movie_id"=>3,
        //     "studio_id"=>5, 
        //     "branch_id"=>2,
        //     "price"=>50000,
        //     "time"=>date("Y-m-d H:i:s",strtotime("2022-09-23 12:00:00"))
        // ]);

        // Schedule::create([
        //     "movie_id"=>4,
        //     "studio_id"=>5, 
        //     "branch_id"=>3,
        //     "price"=>50000,
        //     "time"=>date("Y-m-d H:i:s",strtotime("2022-09-23 08:45:00"))
        // ]);
    }
}
