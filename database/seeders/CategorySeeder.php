<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $names = [

        ];

        foreach ($names as $name) {
            $slug = Str::slug($name) ?: null;
            $category = Category::firstOrCreate(
                ['name' => $name],
                ['description' => null, 'slug' => $slug]
            );

            // Se la categoria esiste già ma è senza slug, aggiorniamo ora
            if (!$category->slug) {
                $category->slug = $slug;
                $category->save();
            }
        }
    }
}