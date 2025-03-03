<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tweet>
 */

// php artisan make:factory TweetFactory

class TweetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // helpers: fake()
        return [
            'message' => fake()->text(),
            'user_id' => rand(1, 10)
            // 'name' -> fake()->name()
        ];
    }
}
