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
        
        $technologies = [
            // Frontend
            [
                'name' => 'JavaScript',
                'slug' => 'javascript',
                'category' => 'frontend',
                'logo' => 'devicon-javascript-plain colored',
                'is_learning' => false,
            ],
            [
                'name' => 'React',
                'slug' => 'react',
                'category' => 'frontend',
                'logo' => 'devicon-react-original colored',
                'is_learning' => false,
            ],
            [
                'name' => 'CSS3',
                'slug' => 'css3',
                'category' => 'frontend',
                'logo' => 'devicon-css3-plain colored',
                'is_learning' => false,
            ],

            // Backend
            [
                'name' => 'PHP',
                'slug' => 'php',
                'category' => 'backend',
                'logo' => 'devicon-php-plain colored',
                'is_learning' => false,
            ],
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
                'category' => 'backend',
                'logo' => 'devicon-laravel-plain colored',
                'is_learning' => false,
            ],
            [
                'name' => 'MySQL',
                'slug' => 'mysql',
                'category' => 'backend',
                'logo' => 'devicon-mysql-plain colored',
                'is_learning' => false,
            ],

            // Dev Tools
            [
                'name' => 'Git',
                'slug' => 'git',
                'category' => 'dev-tools',
                'logo' => 'devicon-git-plain colored',
                'is_learning' => false,
            ],
            [
                'name' => 'VS Code',
                'slug' => 'vs-code',
                'category' => 'dev-tools',
                'logo' => 'devicon-vscode-plain colored',
                'is_learning' => false,
            ],

            // Learning Technologies
            [
                'name' => 'Vue.js',
                'slug' => 'vue-js',
                'category' => 'frontend',
                'logo' => 'devicon-vuejs-plain colored',
                'is_learning' => true,
            ],
            [
                'name' => 'Node.js',
                'slug' => 'node-js',
                'category' => 'backend',
                'logo' => 'devicon-nodejs-plain colored',
                'is_learning' => true,
            ],
            [
                'name' => 'Docker',
                'slug' => 'docker',
                'category' => 'dev-tools',
                'logo' => 'devicon-docker-plain colored',
                'is_learning' => true,
            ],
        ];

        foreach ($technologies as $tech) {
            Technology::create($tech);
        }
    }
}
