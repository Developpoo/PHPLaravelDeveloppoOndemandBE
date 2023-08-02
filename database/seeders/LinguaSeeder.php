<?php

namespace Database\Seeders;

use App\Models\LinguaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinguaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LinguaModel::create(["idLingua" => 1, "nome" => "Italiano", "abbreviazione" => "ITA", "locale" => "it_IT"]);
        LinguaModel::create(["idLingua" => 2, "nome" => "Español", "abbreviazione" => "ESP", "locale" => "es_ES"]);
        LinguaModel::create(["idLingua" => 3, "nome" => "Deutsch", "abbreviazione" => "DEU", "locale" => "de_DE"]);
        LinguaModel::create(["idLingua" => 4, "nome" => "English", "abbreviazione" => "ENG", "locale" => "en_GB"]);
        LinguaModel::create(["idLingua" => 5, "nome" => "Français", "abbreviazione" => "FRA", "locale" => " fr_FR"]);
    }
}
