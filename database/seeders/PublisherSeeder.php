<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {

        $publisher = new Publisher();

        $publisher->label = $faker->company();
        $publisher->color = $faker->hexColor();

        $publisher->save();
    }
}
