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
        Schema::create('cryptos_pairs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crypto_id_1');
            $table->unsignedBigInteger('crypto_id_2');
            $table->unsignedBigInteger('investment_platform_id');
            $table->timestamps();

            $table->foreign('crypto_id_1')->references('id')->on('cryptos')->onDelete('cascade');
            $table->foreign('crypto_id_2')->references('id')->on('cryptos')->onDelete('cascade');
            $table->foreign('investment_platform_id')->references('id')->on('investment_platforms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cryptos_pairs');
    }
};
