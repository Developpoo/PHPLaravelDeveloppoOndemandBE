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
        CategoryModel::create(["idCategory" => 1, "nome" => "Azione", "idFile" => 1, "icona" => null, "watch" => 0]);
        CategoryModel::create(["idCategory" => 2, "nome" => "Avventura", "idFile" => 1, "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 3,  "nome" => "Commedia", "idFile" => 1, "icona" => null, "watch" => 0]);
        CategoryModel::create(["idCategory" => 4,  "nome" => "Drammatico", "idFile" => 1, "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 5,  "nome" => "Horror", "idFile" => 1, "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 6,  "nome" => "Fantascienza", "idFile" => 1, "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 7,  "nome" => "Fantasy", "idFile" => 1, "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 8,  "nome" => "Romantico", "idFile" => 1, "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 9,  "nome" => "Documentario", "idFile" => 1, "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 10,  "nome" => "Animazione", "idFile" => 1, "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 11,  "nome" => "Biografico", "idFile" => 1, "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 12,  "nome" => "Crime", "idFile" => 1, "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 13,  "nome" => "Thriller", "idFile" => 1, "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 14,  "nome" => "Guerra", "idFile" => 1, "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 15,  "nome" => "Musica", "idFile" => 1, "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 16,  "nome" => "Sport", "idFile" => 1, "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 17,  "nome" => "Western", "idFile" => 1, "icona" => null, "watch" => 0]);
        CategoryModel::create(["idCategory" => 18,  "nome" => "Storico", "idFile" => 1, "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 19,  "nome" => "Supereroi", "idFile" => 1, "icona" => null, "watch" => 1]);
        CategoryModel::create(["idCategory" => 20,  "nome" => "Familiare", "idFile" => 1, "icona" => null, "watch" => 1]);



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
