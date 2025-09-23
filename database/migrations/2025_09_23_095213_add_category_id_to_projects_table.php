<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Se presente, rimuoviamo la vecchia colonna testuale "category"
            if (Schema::hasColumn('projects', 'category')) {
                $table->dropColumn('category');
            }

            // Aggiungiamo la FK nullable su categories e impostiamo nullOnDelete
            if (!Schema::hasColumn('projects', 'category_id')) {
                $table->foreignId('category_id')
                    ->nullable()
                    ->constrained()
                    ->nullOnDelete();
            }

        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Ripristiniamo la colonna testuale semplice
            if (!Schema::hasColumn('projects', 'category')) {
                $table->string('category')->nullable();
            }

            // Rimuoviamo in sicurezza la FK e la colonna category_id
            if (Schema::hasColumn('projects', 'category_id')) {
                // Nome indice generato da Laravel: projects_category_id_foreign
                $table->dropConstrainedForeignId('category_id');
            }
        });
    }
};
