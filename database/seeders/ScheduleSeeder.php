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
        Schedule::create([
            "movie_id"=>2,
            "studio_id"=>1,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-24 04:00:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>1,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-24 08:00:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>2,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-24 08:30:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>3,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-24 09:30:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>4,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-24 10:30:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>5,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-24 13:20:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>6,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-24 14:20:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>5,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-24 15:20:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>6,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-24 16:20:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>1,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-24 19:20:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>2,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-24 20:40:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>3,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-24 21:40:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>4,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-24 22:40:00"))
        ]);

        // NEXT DAY

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>1,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-23 13:00:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>2,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-23 08:30:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>3,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-23 09:30:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>4,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-23 10:30:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>1,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-23 13:20:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>2,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-23 14:20:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>3,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-23 15:20:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>4,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-23 16:20:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>1,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-23 19:20:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>2,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-23 20:40:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>5,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-23 21:40:00"))
        ]);

        Schedule::create([
            "movie_id"=>1,
            "studio_id"=>6,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-23 22:40:00"))
        ]);

        //

        Schedule::create([
            "movie_id"=>3,
            "studio_id"=>5,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-23 12:00:00"))
        ]);
        Schedule::create([
            "movie_id"=>4,
            "studio_id"=>6,
            "time"=>date("Y-m-d H:i:s",strtotime("2022-09-23 08:45:00"))
        ]);
    }
}
