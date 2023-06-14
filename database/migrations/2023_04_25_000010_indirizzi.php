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
        Schema::create('indirizzi', function (Blueprint $table) {
            $table->id("idIndirizzo");
            $table->unsignedBigInteger('idUserClient');
            $table->unsignedBigInteger('idTipoIndirizzo');
            $table->unsignedBigInteger('idNazione');
            $table->unsignedBigInteger('idComune');
            $table->string('cap', 15)->nullable();
            $table->string('indirizzo', 255);
            $table->string('civico', 15)->nullable();
            $table->string('localita', 255)->nullable();
            $table->integer('preferito')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idTipoIndirizzo')->references('idTipoIndirizzo')->on('tipoIndirizzi');
            $table->foreign('idNazione')->references('idNazione')->on('nazioni');
            $table->foreign("idUserClient")->references("idUserClient")->on("userClient");
            $table->foreign("idComune")->references("idComune")->on("comuni");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indirizzi');
    }
};
