<?php

namespace Database\Seeders;

use App\Models\CategoryModel;
use App\Models\LinguaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryModel::create(["idCategory" => 1, "nome" => "Azione", "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff", "icona" => null, "watch" => 0]);
        CategoryModel::create(["idCategory" => 2, "nome" => "Avventura", "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff", "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 3,  "nome" => "Commedia", "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff", "icona" => null, "watch" => 0]);
        CategoryModel::create(["idCategory" => 4,  "nome" => "Drammatico", "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff", "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 5,  "nome" => "Horror", "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff", "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 6,  "nome" => "Fantascienza", "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff", "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 7,  "nome" => "Fantasy", "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff", "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 8,  "nome" => "Romantico", "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff", "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 9,  "nome" => "Documentario", "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff", "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 10,  "nome" => "Animazione", "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff", "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 11,  "nome" => "Biografico", "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff", "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 12,  "nome" => "Crime", "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff", "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 13,  "nome" => "Thriller", "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff", "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 14,  "nome" => "Guerra", "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff", "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 15,  "nome" => "Musica", "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff", "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 16,  "nome" => "Sport", "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff", "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 17,  "nome" => "Western", "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff", "icona" => null, "watch" => 0]);
        CategoryModel::create(["idCategory" => 18,  "nome" => "Storico", "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff", "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 19,  "nome" => "Supereroi", "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff", "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 20,  "nome" => "Familiare", "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff", "icona" => null, "watch" => 1]);

        // // Recupera la lingua desiderata dalla tabella "lingue" usando il suo nome
        // $lingua = 'Italiano'; // Modifica il nome della lingua in base a quella che desideri utilizzare

        // // Ottieni l'ID della lingua dalla tabella "lingue"
        // $language = LinguaModel::where('nome', $lingua)->value('idLingua');

        // if (!$language) {
        //     // Se la lingua non esiste nella tabella "lingue", usa una lingua di default
        //     $language = LinguaModel::where('nome', 'Italiano')->value('idLingua');
        // }

        // // Recupera i nomi delle categorie dalla vista "vistaTraduzioni" in base alla lingua impostata
        // $vista = DB::table('vistaTraduzioni')
        //     ->where('idLingua', $lingua)
        //     ->where('chiave', 'LIKE', 'category.name.%') // Assumi che nella vista ci sia una colonna "chiave" che contiene il nome univoco della categoria con il prefisso "category.name."
        //     ->get();

        // // Inserisci le categorie nel database
        // foreach ($vista as $category) {
        //     $categoryId = (int)str_replace('category.name.', '', $category->chiave);
        //     CategoryModel::create([
        //         'idCategory' => $categoryId,
        //         'nome' => $category->valore,
        //         'watch' => 0,
        //     ]);
        // }
    }
}
