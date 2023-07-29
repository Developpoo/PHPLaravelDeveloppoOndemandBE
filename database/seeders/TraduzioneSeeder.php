<?php

namespace Database\Seeders;

use App\Models\TraduzioneModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TraduzioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //SALUTO
        TraduzioneModel::create(["idTraduzione" => 1, "idLingua" => 1, "chiave" => "saluto", "valore" => "Ciao"]);
        TraduzioneModel::create(["idTraduzione" => 2, "idLingua" => 1, "chiave" => "saluto", "valore" => "Buongiorno"]);
        TraduzioneModel::create(["idTraduzione" => 3, "idLingua" => 1, "chiave" => "saluto", "valore" => "Buon pomeriggio"]);
        TraduzioneModel::create(["idTraduzione" => 4, "idLingua" => 1, "chiave" => "saluto", "valore" => "Buona sera"]);
        TraduzioneModel::create(["idTraduzione" => 5, "idLingua" => 1, "chiave" => "saluto", "valore" => "Salve"]);
        TraduzioneModel::create(["idTraduzione" => 6, "idLingua" => 4, "chiave" => "saluto", "valore" => "Hello"]);
        TraduzioneModel::create(["idTraduzione" => 7, "idLingua" => 4, "chiave" => "saluto", "valore" => "Good morning"]);
        TraduzioneModel::create(["idTraduzione" => 8, "idLingua" => 4, "chiave" => "saluto", "valore" => "Good afternoon"]);
        TraduzioneModel::create(["idTraduzione" => 9, "idLingua" => 4, "chiave" => "saluto", "valore" => "Good evening"]);
        TraduzioneModel::create(["idTraduzione" => 10, "idLingua" => 2, "chiave" => "saluto", "valore" => "Hola"]);
        TraduzioneModel::create(["idTraduzione" => 11, "idLingua" => 2, "chiave" => "saluto", "valore" => "Buenos días"]);
        TraduzioneModel::create(["idTraduzione" => 12, "idLingua" => 2, "chiave" => "saluto", "valore" => "Buenas tardes"]);
        TraduzioneModel::create(["idTraduzione" => 13, "idLingua" => 2, "chiave" => "saluto", "valore" => "Buenas noches"]);
        TraduzioneModel::create(["idTraduzione" => 14, "idLingua" => 3, "chiave" => "saluto", "valore" => "Hallo"]);
        TraduzioneModel::create(["idTraduzione" => 15, "idLingua" => 3, "chiave" => "saluto", "valore" => "Guten Morgen"]);
        TraduzioneModel::create(["idTraduzione" => 16, "idLingua" => 3, "chiave" => "saluto", "valore" => "Guten Tag"]);
        TraduzioneModel::create(["idTraduzione" => 17, "idLingua" => 3, "chiave" => "saluto", "valore" => "Guten Abend"]);
        TraduzioneModel::create(["idTraduzione" => 18, "idLingua" => 5, "chiave" => "saluto", "valore" => "Bonjour"]);
        TraduzioneModel::create(["idTraduzione" => 19, "idLingua" => 5, "chiave" => "saluto", "valore" => "Bon après-midi"]);
        TraduzioneModel::create(["idTraduzione" => 20, "idLingua" => 5, "chiave" => "saluto", "valore" => "bonsoir"]);

        //ADDIO
        TraduzioneModel::create(["idTraduzione" => 21, "idLingua" => 1, "chiave" => "addio", "valore" => "Arrivederci"]);
        TraduzioneModel::create(["idTraduzione" => 22, "idLingua" => 1, "chiave" => "addio", "valore" => "A presto"]);
        TraduzioneModel::create(["idTraduzione" => 23, "idLingua" => 4, "chiave" => "addio", "valore" => "Goodbye"]);
        TraduzioneModel::create(["idTraduzione" => 24, "idLingua" => 4, "chiave" => "addio", "valore" => "See you soon"]);
        TraduzioneModel::create(["idTraduzione" => 25, "idLingua" => 2, "chiave" => "addio", "valore" => "Adiós"]);
        TraduzioneModel::create(["idTraduzione" => 26, "idLingua" => 2, "chiave" => "addio", "valore" => "Hasta pronto"]);
        TraduzioneModel::create(["idTraduzione" => 27, "idLingua" => 3, "chiave" => "addio", "valore" => "Auf Wiedersehen"]);
        TraduzioneModel::create(["idTraduzione" => 28, "idLingua" => 3, "chiave" => "addio", "valore" => "Bis bald"]);
        TraduzioneModel::create(["idTraduzione" => 29, "idLingua" => 5, "chiave" => "addio", "valore" => "Au revoir"]);
        TraduzioneModel::create(["idTraduzione" => 30, "idLingua" => 5, "chiave" => "addio", "valore" => "à bientôt"]);
    }
}
