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
        Schema::create('nazioni', function (Blueprint $table) {
            $table->id('idNazione');
            $table->string('nome', 45);
            $table->char('continente', 2);
            $table->char('iso', 3);
            $table->char('iso3', 3);
            $table->string('prefissoTelefonico', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nazioni');
    }
};
