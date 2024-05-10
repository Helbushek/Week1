<?php

namespace Database\Seeders;

use Database\Factories\NewsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NewsFactory::factory()->count(20)->create();
    }

    
}
