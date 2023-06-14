<?php

namespace Database\Seeders;

use App\Models\ComuneModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = storage_path("app/csv_db/comuniItaliani.csv");
        $file = fopen($csv, "r");

        $data = [];
        while (($row = fgetcsv($file, 200, ",")) !== false) {
            $data[] = [
                "idComune" => $row[0],
                "comune" => $row[1],
                "regione" => $row[2],
                "provincia" => $row[3],
                "targa" => $row[5],
                "prefissoTelefonico" => $row[9],
            ];
        }

        // Chunk the data array to avoid exceeding memory limits
        $chunks = array_chunk($data, 500);

        foreach ($chunks as $chunk) {
            ComuneModel::insert($chunk);
        }

        // Chiudi il file dopo aver terminato
        fclose($file);
    }
}
