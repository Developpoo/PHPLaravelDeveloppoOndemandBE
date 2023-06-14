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
            "user" => hash("sha512", trim("fangofanghi@fangoweb.it")),
            "challenge" => hash("sha512", trim("Sfida")),
            "secretJWT" => hash("sha512", trim("Secret")),
            "challengeStart" => time(),
            "mustChange" => 3
        ]);

        UserAuthModel::create([
            "idUserAuth" => 2,
            "idUserClient" => 2,
            "user" => hash("sha512", trim("fangafanghi@fangoweb.it")),
            "challenge" => hash("sha512", trim("Sfida")),
            "secretJWT" => hash("sha512", trim("Secret")),
            "challengeStart" => time(),
            "mustChange" => 3
        ]);
    }
}
