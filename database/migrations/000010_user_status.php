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
        Schema::create('userStatus', function (Blueprint $table) {
            $table->id('idUserStatus');
            $table->string('nome', 45);

            $table->softDeletes();
            $table->timestamps();

            // Questa chiave esterna va messa in userClient
            // $table->foreign('idUserClient')->references('idUserClient')->on('userClient');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userStatus');
    }
};
