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
        Schema::create('userPassword', function (Blueprint $table) {
            $table->id('idUserPassword');
            $table->unsignedBigInteger('idUserClient');
            $table->string('password', 255);
            $table->string('salt', 255)->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idUserClient')->references('idUserClient')->on('userClient');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userPassword');
    }
};
