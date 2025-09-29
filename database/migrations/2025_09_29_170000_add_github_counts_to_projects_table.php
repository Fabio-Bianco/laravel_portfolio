<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedInteger('stargazers_count')->nullable()->after('image_url');
            $table->unsignedInteger('forks_count')->nullable()->after('stargazers_count');
            $table->unsignedInteger('watchers_count')->nullable()->after('forks_count');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['stargazers_count','forks_count','watchers_count']);
        });
    }
};
