<?php

namespace Database\Seeders;

use App\Models\UserRoleAbilityModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleAbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserRoleAbilityModel::create(["idUserRoleAbility" => 1, "idUserAbility" => 1, "idUserRole" => 1]);
        UserRoleAbilityModel::create(["idUserRoleAbility" => 2, "idUserAbility" => 2, "idUserRole" => 1]);
        UserRoleAbilityModel::create(["idUserRoleAbility" => 3, "idUserAbility" => 3, "idUserRole" => 1]);
        UserRoleAbilityModel::create(["idUserRoleAbility" => 4, "idUserAbility" => 4, "idUserRole" => 1]);
        UserRoleAbilityModel::create(["idUserRoleAbility" => 5, "idUserAbility" => 1, "idUserRole" => 2]);
        UserRoleAbilityModel::create(["idUserRoleAbility" => 6, "idUserAbility" => 3, "idUserRole" => 2]);
        UserRoleAbilityModel::create(["idUserRoleAbility" => 7, "idUserAbility" => 1, "idUserRole" => 4]);
        UserRoleAbilityModel::create(["idUserRoleAbility" => 8, "idUserAbility" => 2, "idUserRole" => 4]);
        UserRoleAbilityModel::create(["idUserRoleAbility" => 9, "idUserAbility" => 3, "idUserRole" => 4]);
    }
}
