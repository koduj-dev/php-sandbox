<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(AuthorSeeder $authorSeeder, BookSeeder $bookSeeder): void
    {
        User::factory(10)->create();
        Todo::factory(140)->create();

        $authorSeeder->run();
        $bookSeeder->run();

        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */
    }
}
