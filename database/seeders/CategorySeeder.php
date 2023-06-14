<?php

namespace Database\Seeders;

use App\Models\CategoryModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryModel::create(["idCategory" => 1, "nome" => "Azione"]);
        CategoryModel::create(["idCategory" => 2, "nome" => "Avventura"]);
        CategoryModel::create(["idCategory" => 3,  "nome" => "Commedia"]);
        CategoryModel::create(["idCategory" => 4,  "nome" => "Drammatico"]);
        CategoryModel::create(["idCategory" => 5,  "nome" => "Horror"]);
        CategoryModel::create(["idCategory" => 6,  "nome" => "Fantascienza"]);
        CategoryModel::create(["idCategory" => 7,  "nome" => "Fantasy"]);
        CategoryModel::create(["idCategory" => 8,  "nome" => "Romantico"]);
        CategoryModel::create(["idCategory" => 9,  "nome" => "Documentario"]);
        CategoryModel::create(["idCategory" => 10,  "nome" => "Animazione"]);
        CategoryModel::create(["idCategory" => 11,  "nome" => "Biografico"]);
        CategoryModel::create(["idCategory" => 12,  "nome" => "Crime"]);
        CategoryModel::create(["idCategory" => 13,  "nome" => "Thriller"]);
        CategoryModel::create(["idCategory" => 14,  "nome" => "Guerra"]);
        CategoryModel::create(["idCategory" => 15,  "nome" => "Musica"]);
        CategoryModel::create(["idCategory" => 16,  "nome" => "Sport"]);
        CategoryModel::create(["idCategory" => 17,  "nome" => "Western"]);
        CategoryModel::create(["idCategory" => 18,  "nome" => "Storico"]);
        CategoryModel::create(["idCategory" => 19,  "nome" => "Supereroi"]);
        CategoryModel::create(["idCategory" => 20,  "nome" => "Familiare"]);


    }
}
