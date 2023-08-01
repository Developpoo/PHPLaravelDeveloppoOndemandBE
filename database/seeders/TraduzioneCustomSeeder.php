<?php

namespace Database\Seeders;

use App\Models\TraduzioneCustomModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TraduzioneCustomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //USERCLIENT
        TraduzioneCustomModel::create(["idTraduzioneCustom" => 1, "idLingua" => 1, "chiave" => "lbUserClient", "valore" => "Utente"]);

        //SIGN
        TraduzioneCustomModel::create(["idTraduzioneCustom" => 2, "idLingua" => 1, "chiave" => "lbSign", "valore" => "Entra"]);
        TraduzioneCustomModel::create(["idTraduzioneCustom" => 3, "idLingua" => 1, "chiave" => "lbRecordUserClient", "valore" => "Salva"]);

        //PASSWORD
        TraduzioneCustomModel::create(["idTraduzioneCustom" => 4, "idLingua" => 1, "chiave" => "lbPassword", "valore" => "Password"]);
        TraduzioneCustomModel::create(["idTraduzioneCustom" => 5, "idLingua" => 1, "chiave" => "lbConfermaPassowrd", "valore" => "Conferma Password"]);
    }
}
