<?php

namespace Database\Seeders;

use App\Models\UserClientModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserClientModel::create([
            "idUserClient" => 1,
            "idUserStatus" => 1,
            "nome" => "Fango",
            "cognome" => "Fanghi",
            "sesso" => 0,
            "codiceFiscale" =>  hash("sha512", trim("FNGFNG77D12G273N")),
            "partitaIva" => null,
            "idNazioneNascita" => 1,
            "cittadinanza" =>  hash("sha512", trim("Fanga")),
            "nazioneNascita" => hash("sha512", trim("Fango Land")),
            "provinciaNascita" => hash("sha512", trim("Fango Town")),
            "cittaNascita" => hash("sha512", trim("Palermo")),
            "dataNascita" => "1977-04-12",
            "accettaTermini" => 1,
            "archived" => 0,
            "created_by" =>  hash("sha512", trim("FangoFanghi")),
            "update_by" => hash("sha512", trim("FangoFanghi"))
        ]);

        UserClientModel::create([
            "idUserClient" => 2,
            "idUserStatus" => 2,
            "nome" => "Fanga",
            "cognome" => "Fanghi",
            "sesso" => 1,
            "codiceFiscale" =>  hash("sha512", trim("FNGFNG85I23G273H")),
            "partitaIva" => null,
            "idNazioneNascita" => 1,
            "cittadinanza" =>  hash("sha512", trim("Fanga")),
            "nazioneNascita" => hash("sha512", trim("Fango Land")),
            "provinciaNascita" => hash("sha512", trim("Fango Town")),
            "cittaNascita" => hash("sha512", trim("Palermo")),
            "dataNascita" => "1985-09-23",
            "accettaTermini" => 1,
            "archived" => 0,
            "created_by" =>  hash("sha512", trim("FangoFanghi")),
            "update_by" => hash("sha512", trim("FangoFanghi"))
        ]);

        UserClientModel::create([
            "idUserClient" => 3,
            "idUserStatus" => 1,
            "nome" => "Angelo",
            "cognome" => "Zammataro",
            "sesso" => 1,
            "codiceFiscale" =>  null,
            "partitaIva" => null,
            "idNazioneNascita" => 1,
            "cittadinanza" =>  null,
            "nazioneNascita" => null,
            "provinciaNascita" => null,
            "cittaNascita" => null,
            "dataNascita" => null,
            "accettaTermini" => 1,
            "archived" => 0,
            "created_by" =>  hash("sha512", trim("FangoFanghi")),
            "update_by" => hash("sha512", trim("FangoFanghi"))
        ]);
    }
}
