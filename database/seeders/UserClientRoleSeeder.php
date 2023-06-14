<?php

namespace Database\Seeders;

use App\Models\UserClientRoleModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserClientRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserClientRoleModel::create([
            "id" => 1,
            "idUserClient" => 1,
            "idUserRole" => 1

        ]);

        UserClientRoleModel::create([
            "id" => 2,
            "idUserClient" => 2,
            "idUserRole" => 2

        ]);
    }
}
