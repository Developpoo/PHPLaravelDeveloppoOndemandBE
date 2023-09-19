<?php

namespace Database\Seeders;

use App\Models\FilmFileModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FilmFileModel::create(["idFilm" => 1, "idFile" => 1]);
        FilmFileModel::create(["idFilm" => 1, "idFile" => 2]);
        FilmFileModel::create(["idFilm" => 2, "idFile" => 1]);
        FilmFileModel::create(["idFilm" => 2, "idFile" => 3]);
        FilmFileModel::create(["idFilm" => 3, "idFile" => 1]);
        FilmFileModel::create(["idFilm" => 4, "idFile" => 1]);
        FilmFileModel::create(["idFilm" => 4, "idFile" => 4]);
        FilmFileModel::create(["idFilm" => 5, "idFile" => 1]);
        FilmFileModel::create(["idFilm" => 5, "idFile" => 5]);
        FilmFileModel::create(["idFilm" => 6, "idFile" => 1]);
        FilmFileModel::create(["idFilm" => 6, "idFile" => 6]);
    }
}
