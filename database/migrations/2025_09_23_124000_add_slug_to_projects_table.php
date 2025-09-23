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
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'slug')) {
                $table->string('slug')->nullable()->unique();
            }
        });

        // Backfill slug dai titoli
        $projects = DB::table('projects')->select('id', 'title')->get();
        foreach ($projects as $p) {
            $base = Str::slug((string) $p->title);
            $base = $base !== '' ? $base : 'project';

            $slug = $base;
            $i = 2;
            while (
                DB::table('projects')
                    ->where('slug', $slug)
                    ->where('id', '!=', $p->id)
                    ->exists()
            ) {
                $slug = $base.'-'.$i++;
            }

            DB::table('projects')->where('id', $p->id)->update(['slug' => $slug]);
        }
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'slug')) {
                $table->dropColumn('slug');
            }
        });
    }
};
