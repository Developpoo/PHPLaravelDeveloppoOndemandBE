<?php

namespace Database\Seeders;

use App\Models\UserAbilityModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserAbilityModel::create(["idUserAbility" => 1, "nome" => "Leggere", "power" => "read"]);
        UserAbilityModel::create(["idUserAbility" => 2, "nome" => "Creare", "power" => "create"]);
        UserAbilityModel::create(["idUserAbility" => 3, "nome" => "Aggiornare", "power" => "update"]);
        UserAbilityModel::create(["idUserAbility" => 4, "nome" => "Eliminare", "power" => "delete"]);
    }
}
