<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed di base: utente admin, tassonomie Type/Technology
        $this->call([
            UserSeeder::class,
            TypeSeeder::class,
            TechnologySeeder::class,
        ]);

        // Progetti faker disabilitati di default. Abilita impostando SEED_FAKE_PROJECTS=true in .env
        if ((bool) env('SEED_FAKE_PROJECTS', false)) {
            $this->call([
                ProjectSeeder::class,
            ]);
        }
    }
}
