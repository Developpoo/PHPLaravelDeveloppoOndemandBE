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
        Schema::create('category', function (Blueprint $table) {
            $table->id('idCategory');
            $table->string('nome', 45);
            $table->unsignedBigInteger('idFile')->nullable();
            $table->string('icona', 45)->nullable();
            $table->unsignedTinyInteger("watch")->default(0);

            $table->softDeletes();
            $table->timestamps();

            $table->index('watch');

            $table->foreign('idFile')->references('idFile')->on('file');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
