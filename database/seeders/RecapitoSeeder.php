<?php

namespace Database\Seeders;

use App\Models\RecapitoModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecapitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RecapitoModel::create(
            [
                "idRecapito" => 1,
                "idUserClient" => 1,
                "idTipoRecapito" => 1,
                "recapito" => hash("sha512", trim("fangofanghi@fangoweb.it")),
                "preferito" => 1
            ]
        );

        RecapitoModel::create(
            [
                "idRecapito" => 2,
                "idUserClient" => 1,
                "idTipoRecapito" => 2,
                "recapito" => hash("sha512", trim("3389412916")),
                "preferito" => 0
            ]
        );

        RecapitoModel::create(
            [
                "idRecapito" => 3,
                "idUserClient" => 1,
                "idTipoRecapito" => 5,
                "recapito" => hash("sha512", trim("FangoFanghi")),
                "preferito" => 0
            ]
        );

        RecapitoModel::create(
            [
                "idRecapito" => 4,
                "idUserClient" => 2,
                "idTipoRecapito" => 1,
                "recapito" => hash("sha512", trim("fangafanghi@fangoweb.it")),
                "preferito" => 1
            ]
        );

        RecapitoModel::create(
            [
                "idRecapito" => 5,
                "idUserClient" => 2,
                "idTipoRecapito" => 2,
                "recapito" => hash("sha512", trim("3332456789")),
                "preferito" => 0
            ]
        );

        RecapitoModel::create(
            [
                "idRecapito" => 6,
                "idUserClient" => 2,
                "idTipoRecapito" => 5,
                "recapito" => hash("sha512", trim("FangaFanghi")),
                "preferito" => 0
            ]
        );
    }
}
