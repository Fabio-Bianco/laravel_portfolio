<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Drop pivot first to avoid FK issues
        Schema::dropIfExists('category_project');
        Schema::dropIfExists('category_slug_redirects');
        Schema::dropIfExists('categories');
    }

    public function down(): void
    {
        // Intentionally left blank: legacy tables are not recreated
    }
};
