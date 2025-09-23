<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Project;

class CleanAndAssignCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $allowed = [
            'HTML', 'CSS', 'Javascript', 'PHP', 'Laravel', 'React.js', 'Node.js', 'Automazioni',
        ];

        // Mappa nome => id delle categorie consentite
        $categories = Category::whereIn('name', $allowed)->get();
        if ($categories->isEmpty()) {
            $this->command?->warn('Nessuna categoria consentita trovata. Esegui prima CategorySeeder.');
            return;
        }

        $allowedIds = $categories->pluck('id')->all();

        // Per ogni progetto: rimuovi categorie non consentite, e se non ne rimangono, assegnane 1-3 consentite
        Project::with('categories')->chunk(100, function ($chunk) use ($allowedIds) {
            foreach ($chunk as $p) {
                // Detach non consentite
                $current = $p->categories->pluck('id')->all();
                $toDetach = array_diff($current, $allowedIds);
                if (!empty($toDetach)) {
                    $p->categories()->detach($toDetach);
                    $p->unsetRelation('categories');
                    $p->load('categories');
                }

                // Se non ha categorie, assegnane alcune consentite
                if ($p->categories->isEmpty() && !empty($allowedIds)) {
                    $count = rand(1, min(3, count($allowedIds)));
                    $pick = $allowedIds;
                    shuffle($pick);
                    $p->categories()->sync(array_slice($pick, 0, $count));
                }
            }
        });

        // Elimina categorie non consentite (i progetti legati sono già stati riassegnati)
        Category::query()->whereNotIn('name', $allowed)->delete();
    }
}
