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
        Schema::create('traduzioni', function (Blueprint $table) {
            $table->id('idTraduzione');
            $table->unsignedBigInteger('idLingua');
            $table->string('chiave', 45);
            $table->string('valore', 45);

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idLingua')->references('idLingua')->on('lingue');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traduzioni');
    }
};
