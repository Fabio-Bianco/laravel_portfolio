<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@portfolio.it',
            'password' => Hash::make('Password123!'),
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);

        // Utenti fake
        User::factory()->count(10)->create();
    }
}
