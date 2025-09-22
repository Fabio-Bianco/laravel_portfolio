<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@portfolio.it'],
            [
                'name' => 'Admin',
                'password' => 'Password123!', // cast "hashed" in model
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
