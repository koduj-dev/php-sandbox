<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $womens = $this->createWomens();
        $mens = $this->createMens();

        $authors = array_merge($womens, $mens);
        shuffle($authors);

        foreach ($authors as $author) {
            Author::create($author);
        }
    }

    protected function createWomens(): array {
        $womens = [];
        $usedWomens = range(1,20);
        shuffle($usedWomens);

        foreach (array_slice($usedWomens, 0, 20) as $i) {
            $born = fake()->dateTimeBetween('-100 years', '-30 years');
            $died = null;

            if (fake()->boolean(35)) {
                $ageAtDeath = fake()->numberBetween(20, 95);
                $died = (clone $born)->modify("+$ageAtDeath years");

                if ($died > now()) {
                    $died = null;
                }
            }

            $womens[] = [
                'name' => fake()->name('female'),
                'born_at' => $born->format('Y-m-d'),
                'died_at' => $died?->format('Y-m-d'),
                'bio' => fake()->paragraph(7),
                'photo_url' => "https://img.koduj.dev/women/{$i}.jpg",
                'primary_genre' => fake()->randomElement(
                    ['sci-fi', 'drama', 'poetry', 'non-fiction']
                )
            ];
        }

        return $womens;
    }

    protected function createMens(): array {
        $womens = [];
        $usedWomens = range(1,20);
        shuffle($usedWomens);

        foreach (array_slice($usedWomens, 0, 20) as $i) {
            $born = fake()->dateTimeBetween('-100 years', '-30 years');
            $died = null;

            if (fake()->boolean(35)) {
                $ageAtDeath = fake()->numberBetween(20, 95);
                $died = (clone $born)->modify("+$ageAtDeath years");

                if ($died > now()) {
                    $died = null;
                }
            }


            $womens[] = [
                'name' => fake()->name('male'),
                'born_at' => $born->format('Y-m-d'),
                'died_at' => $died?->format('Y-m-d'),
                'bio' => fake()->paragraph(7),
                'photo_url' => "https://img.koduj.dev/men/{$i}.jpg",
                'primary_genre' => fake()->randomElement(
                    ['sci-fi', 'drama', 'poetry', 'non-fiction']
                )
            ];
        }

        return $womens;
    }
}
