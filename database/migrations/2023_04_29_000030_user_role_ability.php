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
        Schema::create('userRoleAbility', function (Blueprint $table) {
            $table->id('idUserRoleAbility');
            $table->unsignedBigInteger('idUserAbility');
            $table->unsignedBigInteger('idUserRole');

            $table->timestamps();

            $table->foreign('idUserAbility')->references('idUserAbility')->on('userAbility');
            $table->foreign('idUserRole')->references('idUserRole')->on('userRole');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userRoleAbility');
    }
};
