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
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-09 13:00:00"))
        ]);
        Schedule::create([
            "movie"=>3,
            "studio"=>3,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-09 12:00:00"))
        ]);
        Schedule::create([
            "movie"=>4,
            "studio"=>1,
            "time"=>date("Y-m-d H:m:s",strtotime("2022-september-10 08:45:00"))
        ]);
    }
}
