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
        Schema::create('registi', function (Blueprint $table) {
            $table->id('idRegista');
            $table->unsignedBigInteger('idNazione')->nullable();
            $table->string('nome', 45);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idNazione')->references('idNazione')->on('nazioni');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registi');
    }
};
