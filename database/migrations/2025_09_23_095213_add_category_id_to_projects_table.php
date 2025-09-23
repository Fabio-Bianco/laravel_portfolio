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
            // Aggiungiamo la colonna category_id e la chiave esterna

            //rimuoviamo la colonna category
            $table->dropColumn('category');

            //agiungiamo la colonna e la constrain
            $table->foreignId('category_id')->constrained();

        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
             $table->string('category');

             $table->dropForeign('projects_category_id_foreign');
             $table->dropColumn('category_id');
        });
    }
};
