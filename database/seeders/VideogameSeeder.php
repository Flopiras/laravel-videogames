<?php

namespace Database\Seeders;

use App\Models\Videogame;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;

class VideogameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $videogame = new Videogame();

            $videogame->title = $faker->sentence(3);
            $videogame->year = $faker->year();
            $videogame->cover = $faker->imageUrl();
            $videogame->description = $faker->paragraphs(10, true);

            $videogame->save();
        }
    }
}
