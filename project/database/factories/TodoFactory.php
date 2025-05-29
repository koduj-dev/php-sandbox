<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake("cs")->sentence(7),
            'content' => fake("cs")->realText(350),

            'completed_at' => fake()->boolean(30) ? fake()->dateTime(): null,
            'created_at' => fake()->dateTime(),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
