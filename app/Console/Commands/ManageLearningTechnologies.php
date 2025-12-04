<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Technology;

class ManageLearningTechnologies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'learning:manage {action} {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manage learning technologies (list|add|remove)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $action = $this->argument('action');
        $name = $this->argument('name');

        switch ($action) {
            case 'list':
                $this->listLearningTechnologies();
                break;
                
            case 'add':
                if (!$name) {
                    $this->error('Technology name is required for add action');
                    return 1;
                }
                $this->addLearningTechnology($name);
                break;
                
            case 'remove':
                if (!$name) {
                    $this->error('Technology name is required for remove action');
                    return 1;
                }
                $this->removeLearningTechnology($name);
                break;
                
            default:
                $this->error('Invalid action. Use: list, add, or remove');
                return 1;
        }

        return 0;
    }

    private function listLearningTechnologies()
    {
        $learning = Technology::where('is_learning', true)
            ->orderBy('name')
            ->get();

        if ($learning->isEmpty()) {
            $this->info('No learning technologies found.');
            return;
        }

        $this->info('Learning Technologies:');
        $this->table(
            ['ID', 'Name', 'Category', 'Slug'],
            $learning->map(fn($tech) => [
                $tech->id,
                $tech->name,
                $tech->category,
                $tech->slug
            ])
        );
    }

    private function addLearningTechnology(string $name)
    {
        $tech = Technology::where('name', $name)->first();

        if ($tech) {
            if ($tech->is_learning) {
                $this->warn("'{$name}' is already a learning technology.");
                return;
            }
            
            $tech->update(['is_learning' => true]);
            $this->info("'{$name}' marked as learning technology.");
        } else {
            $category = $this->choice(
                'Select category for new technology',
                ['frontend', 'backend', 'dev-tools'],
                'dev-tools'
            );

            Technology::create([
                'name' => $name,
                'category' => $category,
                'slug' => \Str::slug($name),
                'is_learning' => true,
            ]);
            
            $this->info("Created and marked '{$name}' as learning technology.");
        }
    }

    private function removeLearningTechnology(string $name)
    {
        $tech = Technology::where('name', $name)->first();

        if (!$tech) {
            $this->error("Technology '{$name}' not found.");
            return;
        }

        if (!$tech->is_learning) {
            $this->warn("'{$name}' is not a learning technology.");
            return;
        }

        $tech->update(['is_learning' => false]);
        $this->info("'{$name}' removed from learning technologies.");
    }
}
