<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->boolean('is_published')->default(false)->after('slug');
            $table->boolean('is_featured')->default(false)->after('is_published');
            $table->unsignedInteger('display_order')->default(0)->after('is_featured');
            $table->unsignedInteger('featured_order')->default(0)->after('display_order');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['is_published', 'is_featured', 'display_order', 'featured_order']);
        });
    }
};
