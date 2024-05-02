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
        Schema::create('cryptos_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crypto_id');
            $table->string('tags');
            $table->timestamps();

            $table->foreign('crypto_id')->references('id')->on('cryptos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cryptos_tags');
    }
};
