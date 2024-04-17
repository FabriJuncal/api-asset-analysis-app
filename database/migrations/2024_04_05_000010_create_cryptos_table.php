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
        Schema::create('cryptos', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique()->nullable(false);
            $table->string('symbol', 10)->unique()->nullable(false);
            $table->string('slug')->unique()->nullable(false);
            $table->text('description')->nullable();
            $table->string('website', 255)->nullable();
            $table->string('technical_doc')->nullable();
            $table->string('source_code')->nullable();
            $table->string('logo')->nullable(false);
            $table->timestamps();

            $table->index('name');
            $table->index('symbol');
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cryptos');
    }
};
