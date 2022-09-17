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
            "movie"=>1,
            "studio"=>1,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-17 13:00:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>2,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-17 08:30:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>3,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-17 09:30:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>4,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-17 10:30:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>1,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-17 13:20:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>2,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-17 14:20:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>3,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-17 15:20:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>4,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-17 16:20:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>1,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-17 19:20:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>2,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-17 20:40:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>3,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-17 21:40:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>4,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-17 22:40:00"))
        ]);

        // NEXT DAY

        Schedule::create([
            "movie"=>1,
            "studio"=>1,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-18 13:00:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>2,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-18 08:30:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>3,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-18 09:30:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>4,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-18 10:30:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>1,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-18 13:20:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>2,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-18 14:20:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>3,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-18 15:20:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>4,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-18 16:20:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>1,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-18 19:20:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>2,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-18 20:40:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>3,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-18 21:40:00"))
        ]);

        Schedule::create([
            "movie"=>1,
            "studio"=>4,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-18 22:40:00"))
        ]);

        //

        Schedule::create([
            "movie"=>3,
            "studio"=>4,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-09 12:00:00"))
        ]);
        Schedule::create([
            "movie"=>4,
            "studio"=>1,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-10 08:45:00"))
        ]);
    }
}
