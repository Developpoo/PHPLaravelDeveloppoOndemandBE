<?php

namespace Database\Seeders;

use App\Models\CreditoModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CreditoModel::create(["idCredito" => 1,  "idUserClient" => 1, "credito" => 100000, "watch" => 1]);
    }
}
