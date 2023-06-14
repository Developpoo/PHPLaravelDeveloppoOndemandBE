<?php

namespace Database\Seeders;

use App\Models\UserRoleModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserRoleModel::create([
            "idUserRole" => 1,
            "nome" => "Administrator"
        ]);

        UserRoleModel::create([
            "idUserRole" => 2,
            "nome" => "User"
        ]);
        
        UserRoleModel::create([
            "idUserRole" => 3,
            "nome" => "Visitor"
        ]);
    }
}
