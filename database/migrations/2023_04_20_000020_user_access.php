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
        Schema::create('userAccess', function (Blueprint $table) {
            $table->id('idUserAccess');
            $table->unsignedBigInteger('idUserClient');
            $table->unsignedBigInteger('authenticated');
            $table->string('ip', 15)->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idUserClient')->references('idUserClient')->on('userClient');
            $table->index('authenticated');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userAccess');
    }
};
