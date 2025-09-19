<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;


class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // Project::truncate(); // Rimuovi o commenta questa riga per non cancellare i record esistenti

        for($i = 0; $i < 10; $i++) {
            $newProject = new Project();
            $newProject->title = $faker->sentence(3);
            $newProject->description = $faker->paragraph();
            $newProject->image = 'https://via.placeholder.com/150';
            $newProject->link = $faker->url();
            $newProject->save();
        }
    }
}

