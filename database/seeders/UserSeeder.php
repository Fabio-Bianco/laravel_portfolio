<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 👑 Admin demo per correzione/test
        User::create([
            'name'              => 'Admin',
            'email'             => 'admin@portfolio.it',
            'password'          => Hash::make('Password123!'),
            'is_admin'          => true,
            'email_verified_at' => now(),
        ]);

        // 👥 10 utenti fake (non necessari al flusso attuale, ma utili a mostrare factory/seed)
        User::factory()->count(10)->create();
    }
}
