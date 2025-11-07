<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Project;
use App\Models\Type;

class MarkBackendProjects extends Command
{
    protected $signature = 'projects:mark-backend';
    protected $description = 'Marca i progetti backend specificati';

    public function handle()
    {
        $backendType = Type::where('name', 'LIKE', '%backend%')->first();
        
        if (!$backendType) {
            $this->error('Tipo Backend non trovato!');
            return 1;
        }

        $projects = [
            'proj142-team5-backend',
            'php-strong-password-generator',
            'pizzeria-backend'
        ];

        $this->info("Tipo Backend ID: {$backendType->id} - {$backendType->name}");
        $this->newLine();

        foreach ($projects as $title) {
            $project = Project::where('title', $title)->first();
            
            if ($project) {
                $oldType = $project->type ? $project->type->name : 'NULL';
                $project->update(['type_id' => $backendType->id]);
                $this->info("✓ {$title}");
                $this->line("  ID: {$project->id} | {$oldType} -> {$backendType->name}");
            } else {
                $this->warn("✗ {$title} - Non trovato");
            }
        }

        $this->newLine();
        $backendCount = Project::where('type_id', $backendType->id)->count();
        $this->info("Totale progetti Backend: {$backendCount}");

        return 0;
    }
}
