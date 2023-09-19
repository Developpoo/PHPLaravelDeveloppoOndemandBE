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
        Schema::create('filmFile', function (Blueprint $table) {
            $table->unsignedBigInteger('idFilm');
            $table->unsignedBigInteger('idFile')->nullable();

            $table->timestamps();

            $table->foreign('idFilm')->references('idFilm')->on('film');
            $table->foreign('idFile')->references('idFile')->on('file');

            $table->primary(['idFilm', 'idFile']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filmFile');
    }
};
