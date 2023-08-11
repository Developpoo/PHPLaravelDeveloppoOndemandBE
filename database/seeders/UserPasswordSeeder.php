<?php

namespace Database\Seeders;

use App\Models\UserPasswordModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserPasswordModel::create([
            "idUserPassword" => 1,
            "idUserClient" => 1,
            "password" => hash("sha512", trim("800AAA")),
            "salt" => hash("sha512", trim("salt"))
        ]);

        UserPasswordModel::create([
            "idUserPassword" => 2,
            "idUserClient" => 2,
            "password" => hash("sha512", trim("800AAA")),
            "salt" => hash("sha512", trim("salt"))
        ]);
    }
}
