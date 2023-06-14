<?php

namespace Database\Seeders;

use App\Models\FilmNazioneModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmNazioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FilmNazioneModel::create(["idFilm" => 1, "idNazione" => 1]);
        FilmNazioneModel::create(["idFilm" => 2, "idNazione" => 1]);
        FilmNazioneModel::create(["idFilm" => 4, "idNazione" => 1]);
        FilmNazioneModel::create(["idFilm" => 4, "idNazione" => 68]);
        FilmNazioneModel::create(["idFilm" => 5, "idNazione" => 1]);
        FilmNazioneModel::create(["idFilm" => 5, "idNazione" => 234]);
        FilmNazioneModel::create(["idFilm" => 6, "idNazione" => 1]);
        FilmNazioneModel::create(["idFilm" => 6, "idNazione" => 234]);
    }
}
