<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            // Aggiungiamo lo slug, lasciandolo nullable per compatibilità (SQLite non supporta facilmente alter not null)
            if (!Schema::hasColumn('categories', 'slug')) {
                $table->string('slug')->nullable()->unique();
            }
        });

        // Backfill: impostiamo slug univoci a partire dal name
        $categories = DB::table('categories')->select('id', 'name')->get();
        foreach ($categories as $cat) {
            $base = Str::slug((string) $cat->name);
            $base = $base !== '' ? $base : 'category';

            $slug = $base;
            $i = 2;
            while (
                DB::table('categories')
                    ->where('slug', $slug)
                    ->where('id', '!=', $cat->id)
                    ->exists()
            ) {
                $slug = $base.'-'.$i++;
            }

            DB::table('categories')->where('id', $cat->id)->update(['slug' => $slug]);
        }
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            if (Schema::hasColumn('categories', 'slug')) {
                $table->dropColumn('slug');
            }
        });
    }
};
