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
    TraduzioneModel::create(["idTraduzione" => 1, "idLingua" => 1, "chiave" => "txtSaluto1", "valore" => "Ciao"]);
    TraduzioneModel::create(["idTraduzione" => 2, "idLingua" => 1, "chiave" => "txtSaluto2", "valore" => "Buongiorno"]);
    TraduzioneModel::create(["idTraduzione" => 3, "idLingua" => 1, "chiave" => "txtSaluto3", "valore" => "Buon pomeriggio"]);
    TraduzioneModel::create(["idTraduzione" => 4, "idLingua" => 1, "chiave" => "txtSaluto4", "valore" => "Buona sera"]);
    TraduzioneModel::create(["idTraduzione" => 5, "idLingua" => 4, "chiave" => "txtSaluto1", "valore" => "Hello"]);
    TraduzioneModel::create(["idTraduzione" => 6, "idLingua" => 4, "chiave" => "txtSaluto2", "valore" => "Good morning"]);
    TraduzioneModel::create(["idTraduzione" => 7, "idLingua" => 4, "chiave" => "txtSaluto3", "valore" => "Good afternoon"]);
    TraduzioneModel::create(["idTraduzione" => 8, "idLingua" => 4, "chiave" => "txtSaluto4", "valore" => "Good evening"]);
    TraduzioneModel::create(["idTraduzione" => 9, "idLingua" => 2, "chiave" => "txtSaluto1", "valore" => "Hola"]);
    TraduzioneModel::create(["idTraduzione" => 10, "idLingua" => 2, "chiave" => "txtSaluto2", "valore" => "Buenos días"]);
    TraduzioneModel::create(["idTraduzione" => 11, "idLingua" => 2, "chiave" => "txtSaluto3", "valore" => "Buenas tardes"]);
    TraduzioneModel::create(["idTraduzione" => 12, "idLingua" => 2, "chiave" => "txtSaluto4", "valore" => "Buenas noches"]);
    TraduzioneModel::create(["idTraduzione" => 13, "idLingua" => 3, "chiave" => "txtSaluto1", "valore" => "Hallo"]);
    TraduzioneModel::create(["idTraduzione" => 14, "idLingua" => 3, "chiave" => "txtSaluto2", "valore" => "Guten Morgen"]);
    TraduzioneModel::create(["idTraduzione" => 15, "idLingua" => 3, "chiave" => "txtSaluto3", "valore" => "Guten Tag"]);
    TraduzioneModel::create(["idTraduzione" => 16, "idLingua" => 3, "chiave" => "txtSaluto4", "valore" => "Guten Abend"]);
    TraduzioneModel::create(["idTraduzione" => 17, "idLingua" => 5, "chiave" => "txtSaluto1", "valore" => "Bonjour"]);
    TraduzioneModel::create(["idTraduzione" => 18, "idLingua" => 5, "chiave" => "txtSaluto2", "valore" => "Bon après-midi"]);
    TraduzioneModel::create(["idTraduzione" => 19, "idLingua" => 5, "chiave" => "txtSaluto3", "valore" => "bonsoir"]);

    //ADDIO
    TraduzioneModel::create(["idTraduzione" => 20, "idLingua" => 1, "chiave" => "txtAddio1", "valore" => "Arrivederci"]);
    TraduzioneModel::create(["idTraduzione" => 21, "idLingua" => 1, "chiave" => "txtAddio2", "valore" => "A presto"]);
    TraduzioneModel::create(["idTraduzione" => 22, "idLingua" => 4, "chiave" => "txtAddio1", "valore" => "Goodbye"]);
    TraduzioneModel::create(["idTraduzione" => 23, "idLingua" => 4, "chiave" => "txtAddio2", "valore" => "See you soon"]);
    TraduzioneModel::create(["idTraduzione" => 24, "idLingua" => 2, "chiave" => "txtAddio1", "valore" => "Adiós"]);
    TraduzioneModel::create(["idTraduzione" => 25, "idLingua" => 2, "chiave" => "txtAddio2", "valore" => "Hasta pronto"]);
    TraduzioneModel::create(["idTraduzione" => 26, "idLingua" => 3, "chiave" => "txtAddio1", "valore" => "Auf Wiedersehen"]);
    TraduzioneModel::create(["idTraduzione" => 27, "idLingua" => 3, "chiave" => "txtAddio2", "valore" => "Bis bald"]);
    TraduzioneModel::create(["idTraduzione" => 28, "idLingua" => 5, "chiave" => "txtAddio1", "valore" => "Au revoir"]);
    TraduzioneModel::create(["idTraduzione" => 29, "idLingua" => 5, "chiave" => "txtAddio2", "valore" => "à bientôt"]);

    //USERCLIENT
    TraduzioneModel::create(["idTraduzione" => 30, "idLingua" => 1, "chiave" => "lbUserClient", "valore" => "Utente"]);

    //SIGN
    TraduzioneModel::create(["idTraduzione" => 31, "idLingua" => 1, "chiave" => "lbSign", "valore" => "Accedi"]);
    TraduzioneModel::create(["idTraduzione" => 32, "idLingua" => 1, "chiave" => "lbRecordUserClient", "valore" => "Registrati"]);

    //PASSWORD
    TraduzioneModel::create(["idTraduzione" => 33, "idLingua" => 1, "chiave" => "lbPassword", "valore" => "Password"]);
    TraduzioneModel::create(["idTraduzione" => 34, "idLingua" => 1, "chiave" => "lbConfermaPassowrd", "valore" => "Conferma Password"]);

    //CATEGORY
    //ITALIANO
    TraduzioneModel::create(["idTraduzione" => 35, "idLingua" => 1, "chiave" => "categoryName1", "valore" => "Azione"]);
    TraduzioneModel::create(["idTraduzione" => 36, "idLingua" => 1, "chiave" => "categoryName2", "valore" => "Avventura"]);
    TraduzioneModel::create(["idTraduzione" => 37, "idLingua" => 1, "chiave" => "categoryName3", "valore" => "Commedia"]);
    TraduzioneModel::create(["idTraduzione" => 38, "idLingua" => 1, "chiave" => "categoryName4", "valore" => "Drammatico"]);
    TraduzioneModel::create(["idTraduzione" => 39, "idLingua" => 1, "chiave" => "categoryName5", "valore" => "Horror"]);
    TraduzioneModel::create(["idTraduzione" => 40, "idLingua" => 1, "chiave" => "categoryName6", "valore" => "Fantascienza"]);
    TraduzioneModel::create(["idTraduzione" => 41, "idLingua" => 1, "chiave" => "categoryName7", "valore" => "Fantasy"]);
    TraduzioneModel::create(["idTraduzione" => 42, "idLingua" => 1, "chiave" => "categoryName8", "valore" => "Romantico"]);
    TraduzioneModel::create(["idTraduzione" => 43, "idLingua" => 1, "chiave" => "categoryName9", "valore" => "Documentario"]);
    TraduzioneModel::create(["idTraduzione" => 44, "idLingua" => 1, "chiave" => "categoryName10", "valore" => "Animazione"]);
    TraduzioneModel::create(["idTraduzione" => 45, "idLingua" => 1, "chiave" => "categoryName11", "valore" => "Biografico"]);
    TraduzioneModel::create(["idTraduzione" => 46, "idLingua" => 1, "chiave" => "categoryName12", "valore" => "Crime"]);
    TraduzioneModel::create(["idTraduzione" => 47, "idLingua" => 1, "chiave" => "categoryName13", "valore" => "Thriller"]);
    TraduzioneModel::create(["idTraduzione" => 48, "idLingua" => 1, "chiave" => "categoryName14", "valore" => "Guerra"]);
    TraduzioneModel::create(["idTraduzione" => 49, "idLingua" => 1, "chiave" => "categoryName15", "valore" => "Sport"]);
    TraduzioneModel::create(["idTraduzione" => 50, "idLingua" => 1, "chiave" => "categoryName16", "valore" => "Western"]);
    TraduzioneModel::create(["idTraduzione" => 51, "idLingua" => 1, "chiave" => "categoryName17", "valore" => "Storico"]);
    TraduzioneModel::create(["idTraduzione" => 52, "idLingua" => 1, "chiave" => "categoryName18", "valore" => "Supereroi"]);
    TraduzioneModel::create(["idTraduzione" => 53, "idLingua" => 1, "chiave" => "categoryName19", "valore" => "Familiare"]);
    //CATEGORY
    //SPAGNOLO
    TraduzioneModel::create(["idTraduzione" => 54, "idLingua" => 2, "chiave" => "categoryName1", "valore" => "Acción"]);
    TraduzioneModel::create(["idTraduzione" => 55, "idLingua" => 2, "chiave" => "categoryName2", "valore" => "Aventura"]);
    TraduzioneModel::create(["idTraduzione" => 56, "idLingua" => 2, "chiave" => "categoryName3", "valore" => "Comedia"]);
    TraduzioneModel::create(["idTraduzione" => 57, "idLingua" => 2, "chiave" => "categoryName4", "valore" => "Drama"]);
    TraduzioneModel::create(["idTraduzione" => 58, "idLingua" => 2, "chiave" => "categoryName5", "valore" => "Terror"]);
    TraduzioneModel::create(["idTraduzione" => 59, "idLingua" => 2, "chiave" => "categoryName6", "valore" => "Ciencia ficción"]);
    TraduzioneModel::create(["idTraduzione" => 60, "idLingua" => 2, "chiave" => "categoryName7", "valore" => "Fantasía"]);
    TraduzioneModel::create(["idTraduzione" => 61, "idLingua" => 2, "chiave" => "categoryName8", "valore" => "Romance"]);
    TraduzioneModel::create(["idTraduzione" => 62, "idLingua" => 2, "chiave" => "categoryName9", "valore" => "Documental"]);
    TraduzioneModel::create(["idTraduzione" => 63, "idLingua" => 2, "chiave" => "categoryName10", "valore" => "Animación"]);
    TraduzioneModel::create(["idTraduzione" => 64, "idLingua" => 2, "chiave" => "categoryName11", "valore" => "Biográfico"]);
    TraduzioneModel::create(["idTraduzione" => 65, "idLingua" => 2, "chiave" => "categoryName12", "valore" => "Crimen"]);
    TraduzioneModel::create(["idTraduzione" => 66, "idLingua" => 2, "chiave" => "categoryName13", "valore" => "Suspense"]);
    TraduzioneModel::create(["idTraduzione" => 67, "idLingua" => 2, "chiave" => "categoryName14", "valore" => "Guerra"]);
    TraduzioneModel::create(["idTraduzione" => 68, "idLingua" => 2, "chiave" => "categoryName15", "valore" => "Deportes"]);
    TraduzioneModel::create(["idTraduzione" => 69, "idLingua" => 2, "chiave" => "categoryName16", "valore" => "Western"]);
    TraduzioneModel::create(["idTraduzione" => 70, "idLingua" => 2, "chiave" => "categoryName17", "valore" => "Histórico"]);
    TraduzioneModel::create(["idTraduzione" => 71, "idLingua" => 2, "chiave" => "categoryName18", "valore" => "Superhéroes"]);
    TraduzioneModel::create(["idTraduzione" => 72, "idLingua" => 2, "chiave" => "categoryName19", "valore" => "Familiar"]);
    //CATEGORY
    //TEDESCO
    TraduzioneModel::create(["idTraduzione" => 73, "idLingua" => 3, "chiave" => "categoryName1", "valore" => "Action"]);
    TraduzioneModel::create(["idTraduzione" => 74, "idLingua" => 3, "chiave" => "categoryName2", "valore" => "Abenteuer"]);
    TraduzioneModel::create(["idTraduzione" => 75, "idLingua" => 3, "chiave" => "categoryName3", "valore" => "Komödie"]);
    TraduzioneModel::create(["idTraduzione" => 76, "idLingua" => 3, "chiave" => "categoryName4", "valore" => "Drama"]);
    TraduzioneModel::create(["idTraduzione" => 77, "idLingua" => 3, "chiave" => "categoryName5", "valore" => "Horror"]);
    TraduzioneModel::create(["idTraduzione" => 78, "idLingua" => 3, "chiave" => "categoryName6", "valore" => "Science-Fiction"]);
    TraduzioneModel::create(["idTraduzione" => 79, "idLingua" => 3, "chiave" => "categoryName7", "valore" => "Fantasy"]);
    TraduzioneModel::create(["idTraduzione" => 80, "idLingua" => 3, "chiave" => "categoryName8", "valore" => "Romantik"]);
    TraduzioneModel::create(["idTraduzione" => 81, "idLingua" => 3, "chiave" => "categoryName9", "valore" => "Dokumentarfilm"]);
    TraduzioneModel::create(["idTraduzione" => 82, "idLingua" => 3, "chiave" => "categoryName10", "valore" => "Animation"]);
    TraduzioneModel::create(["idTraduzione" => 83, "idLingua" => 3, "chiave" => "categoryName11", "valore" => "Biografie"]);
    TraduzioneModel::create(["idTraduzione" => 84, "idLingua" => 3, "chiave" => "categoryName12", "valore" => "Krimi"]);
    TraduzioneModel::create(["idTraduzione" => 85, "idLingua" => 3, "chiave" => "categoryName13", "valore" => "Thriller"]);
    TraduzioneModel::create(["idTraduzione" => 86, "idLingua" => 3, "chiave" => "categoryName14", "valore" => "Krieg"]);
    TraduzioneModel::create(["idTraduzione" => 87, "idLingua" => 3, "chiave" => "categoryName15", "valore" => "Sport"]);
    TraduzioneModel::create(["idTraduzione" => 88, "idLingua" => 3, "chiave" => "categoryName16", "valore" => "Western"]);
    TraduzioneModel::create(["idTraduzione" => 89, "idLingua" => 3, "chiave" => "categoryName17", "valore" => "Historisch"]);
    TraduzioneModel::create(["idTraduzione" => 90, "idLingua" => 3, "chiave" => "categoryName18", "valore" => "Superhelden"]);
    TraduzioneModel::create(["idTraduzione" => 91, "idLingua" => 3, "chiave" => "categoryName19", "valore" => "Vertrautes"]);
    //CATEGORY
    //INGLESE
    TraduzioneModel::create(["idTraduzione" => 92, "idLingua" => 4, "chiave" => "categoryName1", "valore" => "Action"]);
    TraduzioneModel::create(["idTraduzione" => 93, "idLingua" => 4, "chiave" => "categoryName2", "valore" => "Adventure"]);
    TraduzioneModel::create(["idTraduzione" => 94, "idLingua" => 4, "chiave" => "categoryName3", "valore" => "Comedy"]);
    TraduzioneModel::create(["idTraduzione" => 95, "idLingua" => 4, "chiave" => "categoryName4", "valore" => "Drama"]);
    TraduzioneModel::create(["idTraduzione" => 96, "idLingua" => 4, "chiave" => "categoryName5", "valore" => "Horror"]);
    TraduzioneModel::create(["idTraduzione" => 97, "idLingua" => 4, "chiave" => "categoryName6", "valore" => "Sci-Fi"]);
    TraduzioneModel::create(["idTraduzione" => 98, "idLingua" => 4, "chiave" => "categoryName7", "valore" => "Fantasy"]);
    TraduzioneModel::create(["idTraduzione" => 99, "idLingua" => 4, "chiave" => "categoryName8", "valore" => "Romance"]);
    TraduzioneModel::create(["idTraduzione" => 100, "idLingua" => 4, "chiave" => "categoryName9", "valore" => "Documentary"]);
    TraduzioneModel::create(["idTraduzione" => 101, "idLingua" => 4, "chiave" => "categoryName10", "valore" => "Animation"]);
    TraduzioneModel::create(["idTraduzione" => 102, "idLingua" => 4, "chiave" => "categoryName11", "valore" => "Biographic"]);
    TraduzioneModel::create(["idTraduzione" => 103, "idLingua" => 4, "chiave" => "categoryName12", "valore" => "Crime"]);
    TraduzioneModel::create(["idTraduzione" => 104, "idLingua" => 4, "chiave" => "categoryName13", "valore" => "Thriller"]);
    TraduzioneModel::create(["idTraduzione" => 105, "idLingua" => 4, "chiave" => "categoryName14", "valore" => "War"]);
    TraduzioneModel::create(["idTraduzione" => 106, "idLingua" => 4, "chiave" => "categoryName15", "valore" => "Sports"]);
    TraduzioneModel::create(["idTraduzione" => 107, "idLingua" => 4, "chiave" => "categoryName16", "valore" => "Western"]);
    TraduzioneModel::create(["idTraduzione" => 108, "idLingua" => 4, "chiave" => "categoryName17", "valore" => "Historical"]);
    TraduzioneModel::create(["idTraduzione" => 109, "idLingua" => 4, "chiave" => "categoryName18", "valore" => "Superheroes"]);
    TraduzioneModel::create(["idTraduzione" => 110, "idLingua" => 4, "chiave" => "categoryName19", "valore" => "Familiar"]);
    //CATEGORY
    //FRANCESE
    TraduzioneModel::create(["idTraduzione" => 111, "idLingua" => 5, "chiave" => "categoryName1", "valore" => "Action"]);
    TraduzioneModel::create(["idTraduzione" => 112, "idLingua" => 5, "chiave" => "categoryName2", "valore" => "Aventure"]);
    TraduzioneModel::create(["idTraduzione" => 113, "idLingua" => 5, "chiave" => "categoryName3", "valore" => "Comédie"]);
    TraduzioneModel::create(["idTraduzione" => 114, "idLingua" => 5, "chiave" => "categoryName4", "valore" => "Drame"]);
    TraduzioneModel::create(["idTraduzione" => 115, "idLingua" => 5, "chiave" => "categoryName5", "valore" => "Horreur"]);
    TraduzioneModel::create(["idTraduzione" => 116, "idLingua" => 5, "chiave" => "categoryName6", "valore" => "Sci-Fi"]);
    TraduzioneModel::create(["idTraduzione" => 117, "idLingua" => 5, "chiave" => "categoryName7", "valore" => "Fantasy"]);
    TraduzioneModel::create(["idTraduzione" => 118, "idLingua" => 5, "chiave" => "categoryName8", "valore" => "Romance"]);
    TraduzioneModel::create(["idTraduzione" => 119, "idLingua" => 5, "chiave" => "categoryName9", "valore" => "Documentaire"]);
    TraduzioneModel::create(["idTraduzione" => 120, "idLingua" => 5, "chiave" => "categoryName10", "valore" => "Animatio"]);
    TraduzioneModel::create(["idTraduzione" => 121, "idLingua" => 5, "chiave" => "categoryName11", "valore" => "Biographie"]);
    TraduzioneModel::create(["idTraduzione" => 122, "idLingua" => 5, "chiave" => "categoryName12", "valore" => "Criminalité"]);
    TraduzioneModel::create(["idTraduzione" => 123, "idLingua" => 5, "chiave" => "categoryName13", "valore" => "Thriller"]);
    TraduzioneModel::create(["idTraduzione" => 124, "idLingua" => 5, "chiave" => "categoryName14", "valore" => "Guerre"]);
    TraduzioneModel::create(["idTraduzione" => 125, "idLingua" => 5, "chiave" => "categoryName15", "valore" => "Sports"]);
    TraduzioneModel::create(["idTraduzione" => 126, "idLingua" => 5, "chiave" => "categoryName16", "valore" => "Western"]);
    TraduzioneModel::create(["idTraduzione" => 127, "idLingua" => 5, "chiave" => "categoryName17", "valore" => "Ouest"]);
    TraduzioneModel::create(["idTraduzione" => 128, "idLingua" => 5, "chiave" => "categoryName18", "valore" => "Super-héros"]);
    TraduzioneModel::create(["idTraduzione" => 129, "idLingua" => 5, "chiave" => "categoryName19", "valore" => "Famille"]);
  }
}
