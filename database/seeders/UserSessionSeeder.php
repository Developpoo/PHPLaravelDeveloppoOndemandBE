<?php

namespace Database\Seeders;

use App\Models\UserSessionModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserSessionModel::create([
            "idUserSession" => 1,
            "idUserClient" => 1,
            "token" => hash("sha512", trim("userClient")),
            "sessionStart" => time()
        ]);
    }
}
