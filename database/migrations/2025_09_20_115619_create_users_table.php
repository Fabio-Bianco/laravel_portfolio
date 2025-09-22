<?php
// Crea la tabella 'users' con un flag 'is_admin' per distinguere i ruoli.
// In questo progetto: guest è pubblico (no DB), gli unici autenticati sono admin (per backoffice).
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // Dati base dell'utente
            $table->string('name');
            $table->string('email')->unique();

            // Verifica email opzionale (utile se in futuro vuoi attivarla)
            $table->timestamp('email_verified_at')->nullable();

            // Password hashata (gestita da Laravel)
            $table->string('password');

            // 👇 Flag per permesso admin (backoffice). Guest non compare qui perché è pubblico.
            $table->boolean('is_admin')->default(false);

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
