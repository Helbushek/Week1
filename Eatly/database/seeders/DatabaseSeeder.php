<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\DishesSeeder;
use Database\Seeders\NewsSeeder;
use Database\Seeders\ReviewsSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            NewsSeeder::class,
            DishesSeeder::class,
            ReviewsSeeder::class,
        ]);
    }
}
