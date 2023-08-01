<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
        CREATE VIEW traduzioniVistaCustom AS
        SELECT 
        `traduzioni`.`idLingua` AS `idLingua`,`traduzioni`.`chiave` AS `chiave`,
        if(`traduzioniCustom`.`valore` IS NULL,`traduzioni`.`valore`,`traduzioniCustom`.`valore`) AS `valore`
        FROM (`traduzioni`LEFT JOIN `traduzioniCustom` 
        ON(`traduzioni`.`idLingua` = `traduzioniCustom`.`idLingua` AND `traduzioni`.`chiave` = `traduzioniCustom`.`chiave`))
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('Traduzioni_vista_traduzioni_custom');
    }
};
