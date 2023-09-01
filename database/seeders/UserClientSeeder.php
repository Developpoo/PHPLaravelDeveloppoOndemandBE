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
            "idLingua" => 1,
            "nome" => "Alessio",
            "cognome" => "D'Anna",
            "sesso" => 0,
            "codiceFiscale" =>  hash("sha512", trim("DNNLSS77D12G273N")),
            "idNazione" => 1,
            "regione" =>  hash("sha512", trim("Fanga")),
            "idComune" => 7291,
            "dataNascita" => "1977-04-12",
            "accettaTermini" => 1,
            "archived" => 0,
            "created_by" => null,
            "update_by" => null
        ]);
    }
}
