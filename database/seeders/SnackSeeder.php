<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Snack;

class SnackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Snack::create([
            "nama" => "Coca - cola",
            "harga" => "12000",
            "tipe" => "beverage",
            "foto" => "cola.jpg",
        ]);

        Snack::create([
            "nama" => "Lemon tea",
            "harga" => "12000",
            "tipe" => "beverage",
            "foto" => "lemon.jpg",
        ]);

        Snack::create([
            "nama" => "Orange juice",
            "harga" => "12000",
            "tipe" => "beverage",
            "foto" => "orange.jpg",
        ]);

        Snack::create([
            "nama" => "Aqua",
            "harga" => "10000",
            "tipe" => "beverage",
            "foto" => "aqua.jpg",
        ]);

        Snack::create([
            "nama" => "Popcorn",
            "harga" => "10000",
            "tipe" => "food",
            "foto" => "popcorn.jpg",
        ]);

        Snack::create([
            "nama" => "Hotdog",
            "harga" => "15000",
            "tipe" => "food",
            "foto" => "hotdog.jpg",
        ]);

        Snack::create([
            "nama" => "French-fries",
            "harga" => "12000",
            "tipe" => "food",
            "foto" => "fries.jpg",
        ]);

        Snack::create([
            "nama" => "Burger",
            "harga" => "15000",
            "tipe" => "food",
            "foto" => "burger.jpg",
        ]);
    }
}
