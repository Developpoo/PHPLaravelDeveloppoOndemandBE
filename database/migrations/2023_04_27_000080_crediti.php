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
        Schema::create('crediti', function (Blueprint $table) {
            $table->id('idCredito');
            $table->unsignedBigInteger('idUserClient');
            $table->integer('credito')->nullable(); // Questo lo vorrei ashare    
            $table->integer('watch')->nullable()->default(0);

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idUserClient')->references('idUserClient')->on('userClient');

            $table->index('watch');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crediti');
    }
};
