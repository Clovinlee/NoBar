<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Chair;
use App\Models\H_Trans;
use App\Models\Htrans;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([MovieSeeder::class, UserSeeder::class,BranchSeeder::class,StudioSeeder::class,ChairSeeder::class,ScheduleSeeder::class,HtransSeeder::class]);
    }
}
