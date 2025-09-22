<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'       => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'image_url'   => 'https://picsum.photos/seed/'.rand(1000,9999).'/600/400',
            'link'        => $this->faker->url(),
        ];
    }
}
