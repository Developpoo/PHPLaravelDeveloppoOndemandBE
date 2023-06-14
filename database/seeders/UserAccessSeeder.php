<?php

namespace Database\Seeders;

use App\Models\UserAccessModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserAccessModel::create([
            "idUserAccess" => 1,
            "idUserClient" => 1,
            "authenticated" => 1,
            "ip" => "127.0.0.1"
        ]);
    }
}
