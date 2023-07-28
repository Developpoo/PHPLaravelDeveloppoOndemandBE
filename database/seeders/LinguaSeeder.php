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
        LinguaModel::create(["idLingua" => 1, "nome" => "Italiano", "abbreviazione" => "ITA", "locale" => " "]);
        LinguaModel::create(["idLingua" => 2, "nome" => "Español", "abbreviazione" => "ESP", "locale" => " "]);
        LinguaModel::create(["idLingua" => 3, "nome" => "Deutsch", "abbreviazione" => "DEU", "locale" => " "]);
        LinguaModel::create(["idLingua" => 4, "nome" => "English", "abbreviazione" => "ENG", "locale" => " "]);
        LinguaModel::create(["idLingua" => 5, "nome" => "Français", "abbreviazione" => "FRA", "locale" => " "]);
    }
}
