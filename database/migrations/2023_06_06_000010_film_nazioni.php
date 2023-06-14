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
        Schema::create('filmNazioni', function (Blueprint $table) {
            // $table->id('id');
            $table->unsignedBigInteger('idFilm');
            $table->unsignedBigInteger('idNazione')->nullable();


            $table->timestamps();

            $table->foreign('idFilm')->references('idFilm')->on('film');
            $table->foreign('idNazione')->references('idNazione')->on('nazioni');

            $table->primary(['idFilm', 'idNazione']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filmNazioni');
    }
};
