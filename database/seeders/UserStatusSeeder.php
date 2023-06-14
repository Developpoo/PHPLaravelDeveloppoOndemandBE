<?php

namespace Database\Seeders;

use App\Models\UserStatusModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserStatusModel::create([
            "idUserStatus" => 1,
            "idUserClient" => 1,
            "nome" => "attivo"
        ]);

        UserStatusModel::create([
            "idUserStatus" => 2,
            "idUserClient" => 2,
            "nome" => "bannato"
        ]);
    }
}
