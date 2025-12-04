<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class ManageBio extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bio:manage {action? : Action to perform (show|edit|clear)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manage the admin bio content shown on the portfolio homepage';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $action = $this->argument('action') ?? $this->choice(
            'What would you like to do?',
            ['show', 'edit', 'clear'],
            'show'
        );

        $adminUser = User::where('email', 'admin@portfolio.it')->first();
        
        if (!$adminUser) {
            $this->error('Admin user not found. Please create admin user first.');
            return 1;
        }

        switch ($action) {
            case 'show':
                $this->showBio($adminUser);
                break;
            case 'edit':
                $this->editBio($adminUser);
                break;
            case 'clear':
                $this->clearBio($adminUser);
                break;
            default:
                $this->error('Invalid action. Use: show, edit, or clear');
                return 1;
        }

        return 0;
    }

    private function showBio(User $user)
    {
        $this->info('Current Bio Content:');
        
        if (empty($user->bio)) {
            $this->warn('No bio content set. The homepage will show default fallback content.');
            return;
        }

        $paragraphs = explode('|', $user->bio);
        
        foreach ($paragraphs as $index => $paragraph) {
            $this->line('');
            $this->line('<fg=cyan>Paragraph ' . ($index + 1) . ':</fg=cyan>');
            $this->line($paragraph);
        }
        
        $this->line('');
        $this->info('Bio has ' . count($paragraphs) . ' paragraph(s)');
    }

    private function editBio(User $user)
    {
        $this->info('Edit Bio Content');
        $this->line('Separate paragraphs with | (pipe) character');
        $this->line('Use HTML tags like <strong>text</strong> for formatting');
        $this->line('');
        
        if (!empty($user->bio)) {
            $this->line('Current bio:');
            $this->line('<fg=yellow>' . $user->bio . '</fg=yellow>');
            $this->line('');
        }
        
        $newBio = $this->ask('Enter new bio content (use | to separate paragraphs)');
        
        if (empty($newBio)) {
            $this->warn('Bio cannot be empty. Use bio:clear to remove bio instead.');
            return;
        }
        
        $user->bio = $newBio;
        $user->save();
        
        $this->success('Bio updated successfully!');
        $this->line('');
        $this->showBio($user);
    }

    private function clearBio(User $user)
    {
        if (empty($user->bio)) {
            $this->info('Bio is already empty.');
            return;
        }
        
        if ($this->confirm('Are you sure you want to clear the bio? This will show default content on homepage.')) {
            $user->bio = null;
            $user->save();
            
            $this->success('Bio cleared successfully! Homepage will now show default fallback content.');
        } else {
            $this->info('Bio clear cancelled.');
        }
    }
}
