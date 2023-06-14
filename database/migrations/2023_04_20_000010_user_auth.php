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
        Schema::create('userAuth', function (Blueprint $table) {
            $table->id('idUserAuth');
            $table->unsignedBigInteger('idUserClient');
            $table->string('user', 255);
            $table->string('challenge', 255);
            $table->string('secretJWT', 255);
            $table->integer('challengeStart')->unsigned();
            $table->unsignedTinyInteger('mustChange')->default(0);

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
        Schema::dropIfExists('userAuth');
    }
};
