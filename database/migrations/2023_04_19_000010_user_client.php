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
        Schema::create('userClient', function (Blueprint $table) {
            $table->id('idUserClient');
            $table->unsignedBigInteger('idUserStatus');
            $table->integer('idLingua')->default(1);
            $table->string('nome', 45)->nullable();
            $table->string('cognome', 45);
            $table->unsignedTinyInteger('sesso')->nullable()->default(2);
            $table->string('codiceFiscale')->nullable();
            $table->unsignedBigInteger('idNazione')->nullable();
            $table->string('regione', 255)->nullable();
            $table->unsignedBigInteger('idComune')->nullable();
            $table->date('dataNascita')->nullable();
            $table->tinyInteger('accettaTermini')->default(0);
            $table->tinyInteger('archived')->default(0);
            $table->string('created_by', 255)->nullable();
            $table->string('update_by', 255)->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idUserStatus')->references('idUserStatus')->on('userStatus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userClient');
    }
};
