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
        Schema::create('userSession', function (Blueprint $table) {
            $table->id('idUserSession');
            $table->unsignedBigInteger('idUserClient');
            $table->text('token');
            $table->integer('sessionStart');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userSession');
    }
};
