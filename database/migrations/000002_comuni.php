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
        Schema::create('comuni', function (Blueprint $table) {
            $table->id("idComune");
            $table->string('comune', 255)->nullable();
            $table->string('regione', 255)->nullable();
            $table->string('provincia', 255)->nullable();
            // $table->string('XXX', 45)->nullable();
            $table->char('targa', 2)->nullable();
            // $table->string('KKK', 45)->nullable();
            // $table->string('YYY', 45)->nullable();
            // $table->string('MMM', 45)->nullable();
            $table->string('prefissoTelefonico', 45);
            // $table->string('OOO', 45)->nullable();
            // $table->string('PPP', 45)->nullable();


            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comuni');
    }
};
