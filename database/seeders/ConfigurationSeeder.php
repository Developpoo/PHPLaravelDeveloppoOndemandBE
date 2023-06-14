<?php

namespace Database\Seeders;

use App\Models\ConfigurationModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ConfigurationModel::create([
            "idConfiguration" => 1,
            "key" => "maxLoginMistake",
            "value" => 5
        ]);

        ConfigurationModel::create([
            "idConfiguration" => 2,
            "key" => "challengeTime",
            "value" => 30
        ]);

        ConfigurationModel::create([
            "idConfiguration" => 3,
            "key" => "sessionTime",
            "value" => 600000
        ]);

        ConfigurationModel::create([
            "idConfiguration" => 4,
            "key" => "howPasswordRemaining",
            "value" => 3
        ]);
    }
}
