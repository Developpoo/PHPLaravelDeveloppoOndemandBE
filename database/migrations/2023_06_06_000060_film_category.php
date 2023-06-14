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
        Schema::create('filmCategory', function (Blueprint $table) {
            // $table->id('id');
            $table->unsignedBigInteger('idFilm');
            $table->unsignedBigInteger('idCategory')->nullable();

            $table->timestamps();

            $table->foreign('idFilm')->references('idFilm')->on('film');
            $table->foreign('idCategory')->references('idCategory')->on('category');

            $table->primary(['idFilm', 'idCategory']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filmCategory');
    }
};
