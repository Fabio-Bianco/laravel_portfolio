<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Category;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = Project::factory()->count(12)->create();
        $all = Category::pluck('id')->all();
        foreach ($projects as $p) {
            if ($all) {
                $count = rand(1, min(3, count($all)));
                shuffle($all);
                $p->categories()->sync(array_slice($all, 0, $count));
            }
        }
    }
}
