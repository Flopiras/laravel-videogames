<?php

namespace Database\Seeders;

use App\Models\Console;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Consoles
        $consoles = [
            ['name' => 'NS', 'color' => 'danger'],
            ['name' => 'PS5', 'color' => 'primary'],
            ['name' => 'XBox', 'color' => 'success'],
            ['name' => 'PSP', 'color' => 'warning'],
            ['name' => 'PS4', 'color' => 'info']
        ];

        foreach ($consoles as $console) {
            $new_console = new Console();

            $new_console->name = $console['name'];
            $new_console->color = $console['color'];

            $new_console->save();
        }
    }
}
