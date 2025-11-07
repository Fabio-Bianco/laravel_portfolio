php artisan tinker

// Cerca i progetti che potrebbero essere questi
$keywords = ['pizz', 'serpent', 'backoffice', 'back-office'];

foreach ($keywords as $keyword) {
    $projects = \App\Models\Project::where('title', 'LIKE', "%{$keyword}%")
        ->orWhere('description', 'LIKE', "%{$keyword}%")
        ->get();
    
    if ($projects->count()) {
        echo "\n=== Trovati per '{$keyword}' ===\n";
        foreach ($projects as $p) {
            echo "ID: {$p->id} | Title: {$p->title} | Type: " . ($p->type ? $p->type->name : 'NULL') . "\n";
        }
    }
}

// Cerca il tipo Backend
$backendType = \App\Models\Type::where('name', 'LIKE', '%backend%')->first();
if ($backendType) {
    echo "\n=== Tipo Backend trovato: ID {$backendType->id} ===\n";
}

// Mostra tutti i progetti per trovare manualmente
echo "\n=== TUTTI I PROGETTI ===\n";
\App\Models\Project::orderBy('title')->get(['id', 'title', 'type_id'])->each(function($p) {
    echo "ID: {$p->id} | {$p->title}\n";
});
