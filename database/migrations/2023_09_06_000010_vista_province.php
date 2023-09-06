<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
        CREATE VIEW vistaProvince
        AS
        SELECT 
	DISTINCT `comuniItaliani`.`siglaAutomobilistica` AS `siglaAutomobilistica`,
	if(`comuniItaliani`.`metropolitana` IS NULL OR `comuniItaliani`.`metropolitana`='',`comuniItaliani`.`provincia`,`comuniItaliani`.`metropolitana`) AS `provincia`
FROM `comuniItaliani`
ORDER BY 
	if(`comuniItaliani`.`metropolitana` IS NULL OR `comuniItaliani`.`metropolitana`='',`comuniItaliani`.`provincia`,`comuniItaliani`.`metropolitana`)
       ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS vistaProvince");
    }
};
