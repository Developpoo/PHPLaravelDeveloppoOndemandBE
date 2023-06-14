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
            $table->unsignedTinyInteger("watch")->default(0);

            $table->softDeletes();
            $table->timestamps();

            $table->index('watch');
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



// Schema::create('categorie', function (Blueprint $table) {
//     $table->id('idCategoria');
//     $table->string("nome", 45);
//     $table->unsignedTinyInteger("visualizzato")->default(0);
//     $table->softDeletes();
//     $table->unsignedBigInteger('created_by');
//     $table->unsignedBigInteger('updated_by');
//     $table->timestamps();

//     $table->index('visualizzato');
// });
// Schema::table('categorie', function (Blueprint $table) {
//     $table->foreign('created_by')->references('idContatto')->on('contatti');
//     $table->foreign('updated_by')->references('idContatto')->on('contatti');
// });