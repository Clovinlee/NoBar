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
            "deskripsi" => "ini minuman berkarbonasi yang sangat menyegarkan",
        ]);

        Snack::create([
            "nama" => "Lemon tea",
            "harga" => "12000",
            "tipe" => "beverage",
            "foto" => "lemon.jpg",
            "deskripsi" => "sensasi minum teh dengan rasa lemon yang menyegarkan",
        ]);

        Snack::create([
            "nama" => "Orange juice",
            "harga" => "12000",
            "tipe" => "beverage",
            "foto" => "orange.jpg",
            "deskripsi" => "jus jeruk yang sangat segar"
        ]);

        Snack::create([
            "nama" => "Aqua",
            "harga" => "10000",
            "tipe" => "beverage",
            "foto" => "aqua.jpg",
            "deskripsi" => "Air putih yang siap menemani disetiap saat",
        ]);

        Snack::create([
            "nama" => "Popcorn",
            "harga" => "10000",
            "tipe" => "food",
            "foto" => "popcorn.jpg",
            "deskripsi" => "Makanan ringan yang siap menemani nonton film mu",
        ]);

        Snack::create([
            "nama" => "Hotdog",
            "harga" => "15000",
            "tipe" => "food",
            "foto" => "hotdog.jpg",
            "deskripsi" => "Makanan ringan yang hadir untuk memberikan rasa kenyang",
        ]);

        Snack::create([
            "nama" => "French-fries",
            "harga" => "12000",
            "tipe" => "food",
            "foto" => "fries.jpg",
            "deskripsi" => "Makanan ringan yang siap menemani nonton film mu",
        ]);

        Snack::create([
            "nama" => "Burger",
            "harga" => "15000",
            "tipe" => "food",
            "foto" => "burger.jpg",
            "deskripsi" => "Makanan yang akan mengenyangkan perut mu pada saat menonton film", 
        ]);
    }
}
