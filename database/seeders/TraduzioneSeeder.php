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
    // txt.saluto.1
    // txt.saluto.2
    /*
      const traduzioni=   {
            'txt.saluto.1':'ciao',
              'txt.saluto.2':'buongiorno',
              'form.bott.invio':'Invio'
        }

let label=traduzioni.form_

        */
    TraduzioneModel::create(["idTraduzione" => 1, "idLingua" => 1, "chiave" => "txtSaluto1", "valore" => "Ciao"]);
    TraduzioneModel::create(["idTraduzione" => 2, "idLingua" => 1, "chiave" => "txtSaluto2", "valore" => "Buongiorno"]);
    TraduzioneModel::create(["idTraduzione" => 3, "idLingua" => 1, "chiave" => "txtSaluto3", "valore" => "Buon pomeriggio"]);
    TraduzioneModel::create(["idTraduzione" => 4, "idLingua" => 1, "chiave" => "txtSaluto4", "valore" => "Buona sera"]);
    TraduzioneModel::create(["idTraduzione" => 5, "idLingua" => 1, "chiave" => "txtSaluto5", "valore" => "Salve"]);
    TraduzioneModel::create(["idTraduzione" => 6, "idLingua" => 4, "chiave" => "txtSaluto1", "valore" => "Hello"]);
    TraduzioneModel::create(["idTraduzione" => 7, "idLingua" => 4, "chiave" => "txtSaluto2", "valore" => "Good morning"]);
    TraduzioneModel::create(["idTraduzione" => 8, "idLingua" => 4, "chiave" => "txtSaluto3", "valore" => "Good afternoon"]);
    TraduzioneModel::create(["idTraduzione" => 9, "idLingua" => 4, "chiave" => "txtSaluto4", "valore" => "Good evening"]);
    TraduzioneModel::create(["idTraduzione" => 10, "idLingua" => 2, "chiave" => "txtSaluto1", "valore" => "Hola"]);
    TraduzioneModel::create(["idTraduzione" => 11, "idLingua" => 2, "chiave" => "txtSaluto2", "valore" => "Buenos días"]);
    TraduzioneModel::create(["idTraduzione" => 12, "idLingua" => 2, "chiave" => "txtSaluto3", "valore" => "Buenas tardes"]);
    TraduzioneModel::create(["idTraduzione" => 13, "idLingua" => 2, "chiave" => "txtSaluto4", "valore" => "Buenas noches"]);
    TraduzioneModel::create(["idTraduzione" => 14, "idLingua" => 3, "chiave" => "txtSaluto1", "valore" => "Hallo"]);
    TraduzioneModel::create(["idTraduzione" => 15, "idLingua" => 3, "chiave" => "txtSaluto2", "valore" => "Guten Morgen"]);
    TraduzioneModel::create(["idTraduzione" => 16, "idLingua" => 3, "chiave" => "txtSaluto3", "valore" => "Guten Tag"]);
    TraduzioneModel::create(["idTraduzione" => 17, "idLingua" => 3, "chiave" => "txtSaluto4", "valore" => "Guten Abend"]);
    TraduzioneModel::create(["idTraduzione" => 18, "idLingua" => 5, "chiave" => "txtSaluto1", "valore" => "Bonjour"]);
    TraduzioneModel::create(["idTraduzione" => 19, "idLingua" => 5, "chiave" => "txtSaluto2", "valore" => "Bon après-midi"]);
    TraduzioneModel::create(["idTraduzione" => 20, "idLingua" => 5, "chiave" => "txtSaluto3", "valore" => "bonsoir"]);

    //ADDIO
    TraduzioneModel::create(["idTraduzione" => 21, "idLingua" => 1, "chiave" => "txtAddio1", "valore" => "Arrivederci"]);
    TraduzioneModel::create(["idTraduzione" => 22, "idLingua" => 1, "chiave" => "txtAddio2", "valore" => "A presto"]);
    TraduzioneModel::create(["idTraduzione" => 23, "idLingua" => 4, "chiave" => "txtAddio1", "valore" => "Goodbye"]);
    TraduzioneModel::create(["idTraduzione" => 24, "idLingua" => 4, "chiave" => "txtAddio2", "valore" => "See you soon"]);
    TraduzioneModel::create(["idTraduzione" => 25, "idLingua" => 2, "chiave" => "txtAddio1", "valore" => "Adiós"]);
    TraduzioneModel::create(["idTraduzione" => 26, "idLingua" => 2, "chiave" => "txtAddio2", "valore" => "Hasta pronto"]);
    TraduzioneModel::create(["idTraduzione" => 27, "idLingua" => 3, "chiave" => "txtAddio1", "valore" => "Auf Wiedersehen"]);
    TraduzioneModel::create(["idTraduzione" => 28, "idLingua" => 3, "chiave" => "txtAddio2", "valore" => "Bis bald"]);
    TraduzioneModel::create(["idTraduzione" => 29, "idLingua" => 5, "chiave" => "txtAddio1", "valore" => "Au revoir"]);
    TraduzioneModel::create(["idTraduzione" => 30, "idLingua" => 5, "chiave" => "txtAddio2", "valore" => "à bientôt"]);

    //USERCLIENT
    TraduzioneModel::create(["idTraduzione" => 31, "idLingua" => 1, "chiave" => "lbUserClient", "valore" => "Utente"]);

    //SIGN
    TraduzioneModel::create(["idTraduzione" => 32, "idLingua" => 1, "chiave" => "lbSign", "valore" => "Accedi"]);
    TraduzioneModel::create(["idTraduzione" => 33, "idLingua" => 1, "chiave" => "lbRecordUserClient", "valore" => "Registrati"]);

    //PASSWORD
    TraduzioneModel::create(["idTraduzione" => 34, "idLingua" => 1, "chiave" => "lbPassword", "valore" => "Password"]);
    TraduzioneModel::create(["idTraduzione" => 35, "idLingua" => 1, "chiave" => "lbConfermaPassowrd", "valore" => "Conferma Password"]);
  }
}
