<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->unique()->words(rand(1, 2), true); // es: "Laravel", "Web Design"
        return [
            'name'        => Str::title($name),
            'description' => $this->faker->optional()->sentence(),
        ];
    }
}
