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
        Schema::create('userClientRole', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('idUserClient');
            $table->unsignedBigInteger('idUserRole');

            $table->timestamps();

            $table->foreign('idUserClient')->references('idUserClient')->on('userClient');
            $table->foreign('idUserRole')->references('idUserRole')->on('userRole');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userClientRole');
    }
};
