<?php

namespace Database\Seeders;

use App\Models\TipoRecapitoModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoRecapitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoRecapitoModel::create(["idTipoRecapito" => 1, "nome" => "Email"]);
        TipoRecapitoModel::create(["idTipoRecapito" => 2, "nome" => "Cellulare"]);
        TipoRecapitoModel::create(["idTipoRecapito" => 3, "nome" => "Telefono"]);
        TipoRecapitoModel::create(["idTipoRecapito" => 4, "nome" => "WhatsApp"]);
        TipoRecapitoModel::create(["idTipoRecapito" => 5, "nome" => "Telegram"]);
        TipoRecapitoModel::create(["idTipoRecapito" => 6, "nome" => "Facebook"]);
        TipoRecapitoModel::create(["idTipoRecapito" => 7, "nome" => "Instagram"]);
        TipoRecapitoModel::create(["idTipoRecapito" => 8, "nome" => "Linkedin"]);
        TipoRecapitoModel::create(["idTipoRecapito" => 9, "nome" => "Twitter"]);
    }
}
