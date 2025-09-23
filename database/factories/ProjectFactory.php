<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->unique()->sentence(3);

        // Generiamo uno slug univoco a partire dal titolo per rispettare il binding {project:slug}
        $baseSlug = Str::slug($title) ?: 'project';
        // Aggiungiamo un suffisso breve per ridurre il rischio di collisioni durante i seed
        $slug = $baseSlug.'-'.Str::lower(Str::random(6));

        return [
            'title'       => $title,
            'slug'        => $slug,
            'description' => $this->faker->paragraph(),
            'image_url'   => 'https://picsum.photos/seed/'.rand(1000,9999).'/600/400',
            'link'        => $this->faker->url(),
        ];
    }
}
