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
        CategoryModel::create(["idCategory" => 1, "nome" => "Azione", "watch" => 0]);
        CategoryModel::create(["idCategory" => 2, "nome" => "Avventura", "watch" => 1]);
        CategoryModel::create(["idCategory" => 3,  "nome" => "Commedia", "watch" => 0]);
        CategoryModel::create(["idCategory" => 4,  "nome" => "Drammatico", "watch" => 1]);
        CategoryModel::create(["idCategory" => 5,  "nome" => "Horror", "watch" => 1]);
        CategoryModel::create(["idCategory" => 6,  "nome" => "Fantascienza", "watch" => 1]);
        CategoryModel::create(["idCategory" => 7,  "nome" => "Fantasy", "watch" => 1]);
        CategoryModel::create(["idCategory" => 8,  "nome" => "Romantico", "watch" => 1]);
        CategoryModel::create(["idCategory" => 9,  "nome" => "Documentario", "watch" => 1]);
        CategoryModel::create(["idCategory" => 10,  "nome" => "Animazione", "watch" => 1]);
        CategoryModel::create(["idCategory" => 11,  "nome" => "Biografico", "watch" => 1]);
        CategoryModel::create(["idCategory" => 12,  "nome" => "Crime", "watch" => 1]);
        CategoryModel::create(["idCategory" => 13,  "nome" => "Thriller", "watch" => 1]);
        CategoryModel::create(["idCategory" => 14,  "nome" => "Guerra", "watch" => 1]);
        CategoryModel::create(["idCategory" => 15,  "nome" => "Musica", "watch" => 1]);
        CategoryModel::create(["idCategory" => 16,  "nome" => "Sport", "watch" => 1]);
        CategoryModel::create(["idCategory" => 17,  "nome" => "Western", "watch" => 0]);
        CategoryModel::create(["idCategory" => 18,  "nome" => "Storico", "watch" => 1]);
        CategoryModel::create(["idCategory" => 19,  "nome" => "Supereroi", "watch" => 1]);
        CategoryModel::create(["idCategory" => 20,  "nome" => "Familiare", "watch" => 1]);

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
