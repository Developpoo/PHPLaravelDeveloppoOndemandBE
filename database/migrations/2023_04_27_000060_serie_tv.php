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
        Schema::create('serieTv', function (Blueprint $table) {
            $table->id('idSerieTv');
            $table->unsignedBigInteger('idCategory');
            $table->string('titolo', 255);
            $table->text('descrizione');
            $table->tinyInteger('totaleStagioni');
            $table->tinyInteger('numeroEpisodio');
            $table->string('regista', 45);
            $table->string('attori', 45);
            $table->smallInteger('anno');
            $table->integer('idImg')->nullable();
            $table->integer('idFilmato')->nullable();
            $table->integer('idTrailer')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            

            $table->softDeletes(); 
            $table->timestamps();

            $table->foreign('idCategory')->references('idCategory')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serieTv');
    }
};
