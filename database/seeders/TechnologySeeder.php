<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    public function run(): void
    {
        // SEEDER VUOTO - Nessuna tecnologia precaricata
        // Le tecnologie verranno aggiunte manualmente tramite:
        // - php artisan learning:manage add
        // - Interfaccia admin (se implementata)
        // - Inserimento diretto nel database
        
        $technologies = []; // Array vuoto - nessuna tecnologia di default
        
        // Non creare alcuna tecnologia automaticamente
        // Le sezioni Frontend, Backend, Dev-Tools rimarranno vuote
    }
}
