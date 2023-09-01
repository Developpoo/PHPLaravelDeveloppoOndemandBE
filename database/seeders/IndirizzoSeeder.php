<?php

namespace Database\Seeders;

use App\Models\IndirizzoModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndirizzoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IndirizzoModel::create(
            [
                "idIndirizzo" => 1,
                "idUserClient" => 1,
                "idTipoIndirizzo" => 1,
                "idComune" => 7291,
                "idNazione" => 1,
                "indirizzo" => hash("sha512", trim("Via Uditore, 22")),
                "cap" => 90145,
                "localita" => null,
                "Preferito" => 1
            ]
        );
    }
}
