<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1) Tabella pivot
        if (!Schema::hasTable('category_project')) {
            Schema::create('category_project', function (Blueprint $table) {
                $table->foreignId('category_id')->constrained()->cascadeOnDelete();
                $table->foreignId('project_id')->constrained()->cascadeOnDelete();
                $table->primary(['category_id', 'project_id']);
            });
        }

        // 2) Backfill: se esiste projects.category_id, migriamo nella pivot
        if (Schema::hasColumn('projects', 'category_id')) {
            $rows = DB::table('projects')->select('id as project_id', 'category_id')->whereNotNull('category_id')->get();
            foreach ($rows as $r) {
                // Evita duplicati
                $exists = DB::table('category_project')
                    ->where('project_id', $r->project_id)
                    ->where('category_id', $r->category_id)
                    ->exists();
                if (!$exists) {
                    DB::table('category_project')->insert([
                        'project_id' => $r->project_id,
                        'category_id' => $r->category_id,
                    ]);
                }
            }
        }

        // 3) Rimuoviamo la colonna category_id dai projects se presente
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'category_id')) {
                // Rimuove vincolo e colonna se esistono
                try {
                    $table->dropConstrainedForeignId('category_id');
                } catch (\Throwable $e) {
                    // Fallback: prova dropForeign e dropColumn separati
                    try { $table->dropForeign('projects_category_id_foreign'); } catch (\Throwable $e2) {}
                    try { $table->dropColumn('category_id'); } catch (\Throwable $e3) {}
                }
            }
        });
    }

    public function down(): void
    {
        // 1) Riaggiungiamo category_id (nullable) su projects
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'category_id')) {
                $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            }
        });

        // 2) Backfill inverso: se un progetto ha più categorie, ne prendiamo una (la min id)
        $links = DB::table('category_project')->select('project_id', DB::raw('MIN(category_id) as category_id'))->groupBy('project_id')->get();
        foreach ($links as $l) {
            DB::table('projects')->where('id', $l->project_id)->update(['category_id' => $l->category_id]);
        }

        // 3) Drop della pivot
        Schema::dropIfExists('category_project');
    }
};
