<?php

namespace Database\Seeders;

use App\Models\FilmAttoreModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmAttoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FilmAttoreModel::create(["idFilm" => 1, "idAttore" => 1]);
        FilmAttoreModel::create(["idFilm" => 2, "idAttore" => 1]);
        FilmAttoreModel::create(["idFilm" => 4, "idAttore" => 1]);
        FilmAttoreModel::create(["idFilm" => 5, "idAttore" => 1]);
        FilmAttoreModel::create(["idFilm" => 6, "idAttore" => 1]);
        FilmAttoreModel::create(["idFilm" => 1, "idAttore" => 2]);
        FilmAttoreModel::create(["idFilm" => 2, "idAttore" => 2]);
        FilmAttoreModel::create(["idFilm" => 4, "idAttore" => 2]);
        FilmAttoreModel::create(["idFilm" => 5, "idAttore" => 2]);
        FilmAttoreModel::create(["idFilm" => 6, "idAttore" => 2]);
        FilmAttoreModel::create(["idFilm" => 1, "idAttore" => 3]);
        FilmAttoreModel::create(["idFilm" => 1, "idAttore" => 4]);
        FilmAttoreModel::create(["idFilm" => 1, "idAttore" => 5]);
        FilmAttoreModel::create(["idFilm" => 2, "idAttore" => 6]);
        FilmAttoreModel::create(["idFilm" => 2, "idAttore" => 7]);
        FilmAttoreModel::create(["idFilm" => 2, "idAttore" => 8]);
        FilmAttoreModel::create(["idFilm" => 2, "idAttore" => 9]);
        FilmAttoreModel::create(["idFilm" => 4, "idAttore" => 10]);
        FilmAttoreModel::create(["idFilm" => 4, "idAttore" => 11]);
        FilmAttoreModel::create(["idFilm" => 4, "idAttore" => 12]);
        FilmAttoreModel::create(["idFilm" => 5, "idAttore" => 13]);
        FilmAttoreModel::create(["idFilm" => 5, "idAttore" => 14]);
        FilmAttoreModel::create(["idFilm" => 5, "idAttore" => 15]);
        FilmAttoreModel::create(["idFilm" => 5, "idAttore" => 16]);
        FilmAttoreModel::create(["idFilm" => 6, "idAttore" => 17]);
        FilmAttoreModel::create(["idFilm" => 6, "idAttore" => 18]);
        FilmAttoreModel::create(["idFilm" => 6, "idAttore" => 19]);
    }
}
