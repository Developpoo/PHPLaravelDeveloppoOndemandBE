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
        Schema::create('film', function (Blueprint $table) {
            $table->id('idFilm');
            $table->string('titolo', 255);
            $table->text('descrizione');
            $table->tinyInteger('durata')->unsigned()->nullable();
            $table->string('regista', 255);
            $table->string('attori', 255);
            $table->string('icona', 255)->nullable();
            $table->unsignedSmallInteger('anno');
            $table->integer('watch')->nullable()->default(0);

            $table->softDeletes();
            $table->timestamps();

            $table->index('watch');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film');
    }
};
