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
        Schema::create('recapiti', function (Blueprint $table) {
            $table->id('idRecapito');
            $table->unsignedBigInteger('idUserClient');
            $table->unsignedBigInteger('idTipoRecapito');
            $table->string('recapito', 255)->nullable();
            $table->integer('preferito')->unsigned()->default(0);



            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idUserClient')->references('idUserClient')->on('userClient');
            $table->foreign('idTipoRecapito')->references('idTipoRecapito')->on('tipoRecapiti');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recapiti');
    }
};
