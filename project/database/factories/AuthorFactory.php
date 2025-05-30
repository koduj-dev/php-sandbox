<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $born = fake()->dateTimeBetween('-100 years', '-30 years');
        $died = fake()->boolean(30) ? fake()->dateTimeBetween($born) : null;

        return [
            'name' => fake()->name(),
            'born_at' => $born->format('Y-m-d'),
            'died_at' => $died?->format('Y-m-d'),
            'bio' => fake()->paragraph(7),
            'primary_genre' => fake()->randomElement(
                ['sci-fi', 'drama', 'poetry', 'non-fiction']
            )
        ];
    }
}
