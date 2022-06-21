<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Reda Ali',
            'email' => 'reda@example.com',
            'role' => 'admin'
        ]);

        User::factory(5)->create();

        Book::factory(10)->create([
            'user_id' => $user
        ]);
    }
}
