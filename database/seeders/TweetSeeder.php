<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tweet;

// php artisan make:seeder TweetSeeder
// php artisan db:seed --class=TweetSeeder (ejecutar)

class TweetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    // se llama cuando se ejecuta el db:seed comando Artisan
    public function run(): void
    {
        Tweet::factory()
        ->count(50)
        ->create();
    }
}
