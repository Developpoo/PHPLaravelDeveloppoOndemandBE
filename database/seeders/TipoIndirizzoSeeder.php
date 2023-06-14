<?php

namespace Database\Seeders;

use App\Models\TipoIndirizzoModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoIndirizzoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoIndirizzoModel::create(["idTipoIndirizzo" => 1, "nome" => "Domicilio"]);
        TipoIndirizzoModel::create(["idTipoIndirizzo" => 2, "nome" => "Residenza Vacanza"]);
        TipoIndirizzoModel::create(["idTipoIndirizzo" => 3, "nome" => "Indirizzo Spedizioni"]);
        TipoIndirizzoModel::create(["idTipoIndirizzo" => 4, "nome" => "Ufficio"]);
        TipoIndirizzoModel::create(["idTipoIndirizzo" => 5, "nome" => "Sede Legale"]);
        TipoIndirizzoModel::create(["idTipoIndirizzo" => 6, "nome" => "Sede Operativa"]);
    }
}
