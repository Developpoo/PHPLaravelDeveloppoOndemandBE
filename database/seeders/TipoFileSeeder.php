<?php

namespace Database\Seeders;

use App\Models\TipoFileModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoFileModel::create([
            "idTipoFile" => 1,
            "nome" => "img"
        ]);

        TipoFileModel::create([
            "idTipoFile" => 2,
            "nome" => "video"
        ]);
    }
}
