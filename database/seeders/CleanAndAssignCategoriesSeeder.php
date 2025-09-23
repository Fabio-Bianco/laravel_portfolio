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
            'HTML', 'CSS', 'Javascript', 'PHP', 'Laravel', 'React.js', 'Node.js', 'Automazioni n8n',
        ];

        // Mappa nome => id delle categorie consentite
        $categories = Category::whereIn('name', $allowed)->get();
        if ($categories->isEmpty()) {
            $this->command?->warn('Nessuna categoria consentita trovata. Esegui prima CategorySeeder.');
            return;
        }

        $ids = $categories->pluck('id')->all();

        // Assegna una categoria valida a tutti i progetti senza categoria o con categoria non valida
        Project::query()
            ->whereNull('category_id')
            ->orWhereNotIn('category_id', $ids)
            ->each(function (Project $p) use ($ids) {
                $p->category_id = $ids[array_rand($ids)];
                $p->save();
            });

        // Elimina categorie non consentite (i progetti legati sono già stati riassegnati)
        Category::query()
            ->whereNotIn('name', $allowed)
            ->delete();
    }
}
