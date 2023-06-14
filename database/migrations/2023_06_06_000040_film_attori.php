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
        Schema::create('filmAttori', function (Blueprint $table) {
            // $table->id('id');
            $table->unsignedBigInteger('idFilm');
            $table->unsignedBigInteger('idAttore')->nullable();

            $table->timestamps();

            $table->foreign('idFilm')->references('idFilm')->on('film');
            $table->foreign('idAttore')->references('idAttore')->on('attori');

            $table->primary(['idFilm', 'idAttore']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filmAttori');
    }
};
