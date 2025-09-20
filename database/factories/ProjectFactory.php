<?php
// Factory per Project
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'image_url' => 'https://placehold.co/600x400',
            'link' => $this->faker->url(),
        ];
    }
}
