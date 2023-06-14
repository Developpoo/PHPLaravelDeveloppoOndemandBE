<?php

namespace Database\Seeders;

use App\Models\FilmRegistaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmRegistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FilmRegistaModel::create(["idFilm" => 1, "idRegista" => 1]);
        FilmRegistaModel::create(["idFilm" => 2, "idRegista" => 1]);
        FilmRegistaModel::create(["idFilm" => 5, "idRegista" => 1]);
        FilmRegistaModel::create(["idFilm" => 4, "idRegista" => 2]);
        FilmRegistaModel::create(["idFilm" => 6, "idRegista" => 3]);
    }
}
