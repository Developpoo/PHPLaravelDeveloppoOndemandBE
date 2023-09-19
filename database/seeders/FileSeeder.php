<?php

namespace Database\Seeders;

use App\Models\FileModel;
use App\Models\TipoFileModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FileModel::create([
            "idFile" => 1,
            "idTipoFile" => 1,
            "nome" => "Placeholder",
            "src" => "https://via.placeholder.com/1920x600/aa0000/ffffff",
            "alt" => "Placeholder",
            "title" => "Placeholder",
            "descrizione" => "Placeholder di prova",
            "formato" => null
        ]);

        FileModel::create([
            "idFile" => 2,
            "idTipoFile" => 2,
            "nome" => "loChiamavanoTrinita",
            "src" => "https://www.youtube.com/watch?v=pWmVZXSB7Tw&list=PLcTl52QlQxGBTG5ylsuXbTuLKvEL9UlRm&index=10",
            "alt" => "loChiamavanoTrinita",
            "title" => "Lo Chiamavano Trinità",
            "descrizione" => null,
            "formato" => null
        ]);

        FileModel::create([
            "idFile" => 3,
            "idTipoFile" => 2,
            "nome" => "continuavanoAChiamarloTrinita",
            "src" => "https://www.youtube.com/watch?v=v4-zP-Il8Gs&list=PLcTl52QlQxGBTG5ylsuXbTuLKvEL9UlRm&index=11",
            "alt" => "continuavanoAChiamarloTrinita",
            "title" => "Continuavano a chiamarlo Trinità",
            "descrizione" => null,
            "formato" => null
        ]);

        FileModel::create([
            "idFile" => 4,
            "idTipoFile" => 2,
            "nome" => "altrimentiCiArrabbiamo",
            "src" => "https://www.youtube.com/watch?v=ibh5QD00Ivk&list=PLcTl52QlQxGCMJHj2UjwmI_mZOTMWaPtg",
            "alt" => "altrimentiCiArrabbiamo",
            "title" => "...ALTRIMENTI CI ARRABBIAMO!",
            "descrizione" => null,
            "formato" => null
        ]);

        FileModel::create([
            "idFile" => 5,
            "idTipoFile" => 2,
            "nome" => "natiConLaCamicia",
            "src" => "https://www.youtube.com/watch?v=JNDdA0XY8C0",
            "alt" => "natiConLaCamicia",
            "title" => "Nati con la camicia",
            "descrizione" => null,
            "formato" => null
        ]);

        FileModel::create([
            "idFile" => 6,
            "idTipoFile" => 2,
            "nome" => "PariEDispari",
            "src" => "https://www.youtube.com/watch?v=hxc-BDwIep4&list=PLcTl52QlQxGBTG5ylsuXbTuLKvEL9UlRm&index=15",
            "alt" => "PariEDispari",
            "title" => "PARI E DISPARI",
            "descrizione" => null,
            "formato" => null
        ]);
    }
}
