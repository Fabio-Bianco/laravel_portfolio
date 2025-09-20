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
            'image_url'   => 'https://picsum.photos/400/200?random=' . rand(1, 1000),
            'link'        => $this->faker->url(),
        ];
    }
}
