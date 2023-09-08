<?php

namespace Database\Seeders;

use App\Models\Console;
use App\Models\Publisher;
use App\Models\Videogame;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Support\Arr;

class VideogameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        // Get all consoles
        $publisher_ids = Publisher::pluck('id')->toArray();
        $publisher_ids[] = null;

        // Get all consoles
        $console_ids = Console::pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            $videogame = new Videogame();

            $videogame->title = $faker->sentence(3);
            $videogame->publisher_id = Arr::random($publisher_ids);
            $videogame->year = $faker->year();
            $videogame->cover = $faker->imageUrl();
            $videogame->description = $faker->paragraphs(10, true);

            $videogame->save();

            // Generate random tecnologies
            $videogame_consoles = [];
            foreach ($console_ids as $console_id) {
                if (rand(0, 1)) $videogame_consoles[] = $console_id;
            }

            $videogame->consoles()->attach($videogame_consoles);
        }
    }
}
