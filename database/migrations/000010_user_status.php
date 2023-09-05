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
        Schema::create('userStatus', function (Blueprint $table) {
            $table->id('idUserStatus');
            $table->string('nome', 45);

            $table->softDeletes();
            $table->timestamps();

            // Questa chiave esterna va messa in userClient
            // $table->foreign('idUserClient')->references('idUserClient')->on('userClient');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userStatus');
    }
};



// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class StatoContatto extends Migration
// {
//     /**
//      * Run the migrations.
//      *
//      * @return void
//      */
//     public function up()
//     {
//         Schema::create('contattiStati', function (Blueprint $table) {
//             $table->id('idContattoStato');
//             $table->string('nome', 45);
//             $table->softDeletes();
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down()
//     {
//         Schema::dropIfExists("contattiStati");
//     }
// }