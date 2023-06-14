<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('filmRegisti', function (Blueprint $table) {
            // $table->id('id');
            $table->unsignedBigInteger('idFilm');
            $table->unsignedBigInteger('idRegista')->nullable();

            $table->timestamps();

            $table->foreign('idFilm')->references('idFilm')->on('film');
            $table->foreign('idRegista')->references('idRegista')->on('registi');

            $table->primary(['idFilm', 'idRegista']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filmRegisti');
    }
};
