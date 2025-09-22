<?php
// Tabella 'projects' per il portfolio (titolo, descrizione, immagine, link).
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('title');               // Titolo obbligatorio
            $table->text('description')->nullable(); // Descrizione testuale
            $table->string('image_url')->nullable(); // URL immagine (placeholder se mancante)
            $table->string('link')->nullable();      // Link esterno (GitHub, demo, ecc.)

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
