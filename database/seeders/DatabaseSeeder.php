<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'login' => 'Admin',
            'fio' => 'Admin User',
            'tel' => '+78577487584',
            'email' => 'admin@example.com',
            'password' => 1111,
        ]);

        User::factory(5)->create();
    }
}
