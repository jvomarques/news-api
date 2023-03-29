<?php

namespace Database\Seeders;

use App\Models\NewsSource;
use Database\Factories\NewsSourceFactory;
use Illuminate\Database\Seeder;

class NewsSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NewsSourceFactory::factory(10)->create();
    }
}
