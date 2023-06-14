<?php

namespace Database\Seeders;

use App\Models\NazioneModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NazioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = storage_path("app/csv_db/nazioni.csv"); //storage_path è una funzione di laravel che legge i csv
        $file = fopen($csv, "r"); // fopen apriamo in php il nostro file solo lettura
        //fgetcsv è una funzione fatta per tirare fuori i dati dai csv
        while (($data = fgetcsv($file, 200, ",")) !== false) {
            NazioneModel::create(
                [
                    "idNazione" => $data[0],
                    "nome" => $data[1],
                    "continente" => $data[2],
                    "iso3" => $data[3],
                    "iso" => $data[4],
                    "prefissoTelefonico" => $data[5],
                ]
            );
        }
    }
}
