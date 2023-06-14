<?php

namespace Database\Seeders;

use App\Models\RegistaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RegistaModel::create(["idRegista" => 1, "idNazione" => 1, "nome" => "Enzo Barboni"]);
        RegistaModel::create(["idRegista" => 2, "idNazione" => 1, "nome" => "Marcello Fondato"]);
        RegistaModel::create(["idRegista" => 3, "idNazione" => 1, "nome" => "Sergio Corbucci"]);
    }
}
