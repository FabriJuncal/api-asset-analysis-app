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
        Schema::create('investment_platforms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Nombre de la plataforma
            $table->string('type')->nullable(); // Tipo de plataforma (acciones, criptomonedas, otros)
            $table->text('description')->nullable(); // Algúna descripción de la plataforma
            $table->string('website')->nullable(); // URL del Sitio web de la plataforma
            $table->string('twitter')->nullable(); // URL del Twitter de la plataforma
            $table->string('logo')->nullable(); // URL del logo de la plataforma
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investment_platforms');
    }
};
