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
        Schema::create('episodi', function (Blueprint $table) {
            $table->id('idEpisodio');
            $table->unsignedBigInteger('idSerieTv');
            $table->string('titolo', 255);
            $table->text('descrizione');
            $table->tinyInteger('numeroStagione');
            $table->tinyInteger('numeroEpisodio');
            $table->tinyInteger('durata');
            $table->smallInteger('anno');
            $table->integer('idImg')->nullable();
            $table->integer('idFilmato')->nullable();
            $table->integer('idTrailer')->nullable();
            

            $table->softDeletes(); 
            $table->timestamps();

            $table->foreign('idSerieTv')->references('idSerieTv')->on('serieTv');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodi');
    }
};
