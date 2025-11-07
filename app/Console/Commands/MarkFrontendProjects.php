<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Project;
use App\Models\Type;

class MarkFrontendProjects extends Command
{
    protected $signature = 'projects:mark-frontend';
    protected $description = 'Marca i progetti frontend specificati';

    public function handle()
    {
        // Prima cerchiamo i progetti con pattern
        $this->info("Cerco progetti con 'proj142' o 'team5'...");
        $found = Project::where(function($q) {
            $q->where('title', 'LIKE', '%proj142%')
              ->orWhere('title', 'LIKE', '%team5%');
        })->get();
        
        $this->table(['ID', 'Title', 'Type'], $found->map(fn($p) => [
            $p->id,
            $p->title,
            $p->type ? $p->type->name : 'NULL'
        ]));
        
        if ($found->isEmpty()) {
            $this->warn('Nessun progetto trovato con questi pattern.');
            return 1;
        }
        
        $this->newLine();
        
        $frontendType = Type::where('name', 'LIKE', '%frontend%')->first();
        
        if (!$frontendType) {
            $this->error('Tipo Frontend non trovato!');
            return 1;
        }

        // Cerca i progetti frontend specifici
        $projects = [
            'proj142-team5-frontend',
        ];

        $this->info("Tipo Frontend ID: {$frontendType->id} - {$frontendType->name}");
        $this->newLine();

        foreach ($projects as $title) {
            $project = Project::where('title', $title)->first();
            
            if ($project) {
                $oldType = $project->type ? $project->type->name : 'NULL';
                $project->update(['type_id' => $frontendType->id]);
                $this->info("✓ {$title}");
                $this->line("  ID: {$project->id} | {$oldType} -> {$frontendType->name}");
            } else {
                $this->warn("✗ {$title} - Non trovato");
            }
        }

        $this->newLine();
        $frontendCount = Project::where('type_id', $frontendType->id)->count();
        $this->info("Totale progetti Frontend: {$frontendCount}");

        return 0;
    }
}
