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
                "recapito" => hash("sha512", trim("alessiomex@yahoo.com")),
                "preferito" => 1
            ]
        );
    }
}
