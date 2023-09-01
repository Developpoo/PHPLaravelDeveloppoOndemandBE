<?php

namespace Database\Seeders;

use App\Models\UserAuthModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserAuthModel::create([
            "idUserAuth" => 1,
            "idUserClient" => 1,
            "user" => hash("sha512", trim("xalessiodannax@gmail.com")),
            "challenge" => hash("sha512", trim("Sfida")),
            "secretJWT" => hash("sha512", trim("Secret")),
            "challengeStart" => time(),
            "mustChange" => 3
        ]);
    }
}
