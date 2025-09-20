<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Utente admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@portfolio.test',
            'password' => bcrypt('password'),
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);

        // INSERISCI QUI IL TUO SEEDERS

        $this->call(ProjectTableSeeder::class);
  
    }
}
