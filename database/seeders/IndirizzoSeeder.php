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
                "idIndirizzo" => 3,
                "idUserClient" => 1,
                "idTipoIndirizzo" => 1,
                "idComune" => 5271,
                "idNazione" => 1,
                "indirizzo" => hash("sha512", trim("Piazza Roma")),
                "civico" => "100",
                "cap" => 10064,
                "localita" =>  hash("sha512", trim("FangoWold")),
                "Preferito" => 0
            ]
        );

        IndirizzoModel::create(
            [
                "idIndirizzo" => 2,
                "idUserClient" => 2,
                "idTipoIndirizzo" => 4,
                "idComune" => 7291,
                "idNazione" => 1,
                "indirizzo" => hash("sha512", trim("Via Veneto")),
                "civico" => "2",
                "cap" => 90144,
                "localita" => hash("sha512", trim("Fangoland")),
                "Preferito" => 1
            ]
        );

        IndirizzoModel::create(
            [
                "idIndirizzo" => 1,
                "idUserClient" => 1,
                "idTipoIndirizzo" => 1,
                "idComune" => 7291,
                "idNazione" => 1,
                "indirizzo" => hash("sha512", trim("Via Uditore, 22")),
                "civico" => "8/b",
                "cap" => 90145,
                "localita" => hash("sha512", trim("Fangoland")),
                "Preferito" => 1
            ]
        );
    }
}
