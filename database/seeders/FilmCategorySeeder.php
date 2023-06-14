<?php

namespace Database\Seeders;

use App\Models\FilmCategoryModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FilmCategoryModel::create(["idFilm" => 1, "idCategory" => 3]);
        FilmCategoryModel::create(["idFilm" => 1, "idCategory" => 17]);
        FilmCategoryModel::create(["idFilm" => 2, "idCategory" => 3]);
        FilmCategoryModel::create(["idFilm" => 2, "idCategory" => 17]);
        FilmCategoryModel::create(["idFilm" => 4, "idCategory" => 3]);
        FilmCategoryModel::create(["idFilm" => 4, "idCategory" => 1]);
        FilmCategoryModel::create(["idFilm" => 5, "idCategory" => 3]);
        FilmCategoryModel::create(["idFilm" => 5, "idCategory" => 1]);
        FilmCategoryModel::create(["idFilm" => 6, "idCategory" => 3]);
        FilmCategoryModel::create(["idFilm" => 6, "idCategory" => 1]);
    }
}
