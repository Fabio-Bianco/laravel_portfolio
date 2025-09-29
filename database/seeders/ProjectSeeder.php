<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = Project::factory()->count(12)->create();
        $typeIds = Type::pluck('id')->all();
        $allTech = Technology::pluck('id')->all();
        foreach ($projects as $p) {
            if (!empty($typeIds)) {
                $p->update(['type_id' => fake()->randomElement($typeIds)]);
            }
            if ($allTech) {
                $tcount = rand(1, min(3, count($allTech)));
                shuffle($allTech);
                $p->technologies()->sync(array_slice($allTech, 0, $tcount));
            }
        }
    }
}
