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
        Schema::create('file', function (Blueprint $table) {
            $table->id('idFile');
            $table->Integer('idTipoFile');
            $table->string('nome', 45)->nullable();
            $table->string('src', 255);
            $table->string('alt', 45)->nullable();
            $table->string('title', 45)->nullable();
            $table->tinyText('descrizione')->nullable();
            $table->string('formato', 45)->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file');
    }
};
