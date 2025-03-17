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
        Schema::create('emargements', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->enum('statut', ['présent', 'absent', 'justifié'])->default('présent');
            $table->foreignId('professeur_id')->constrained('users'); // relation avec l'utilisateur (professeur)
            $table->foreignId('cours_id')->constrained('cours'); // relation avec le cours
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emargements');
    }
};
