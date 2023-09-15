<?php

namespace Database\Seeders;

use App\Models\FilmModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FilmModel::create([
            "idFilm" => 1,
            "titolo" => "Lo chiamavano Trinità",
            "descrizione" => "È un film western? Un film comico? Un western comico? Non esattamente: è un film di Bud Spencer e Terence Hill, che fa genere a sé, anche se all'epoca non si poteva sapere.",
            "durata" => 117,
            "regista" => "Enzo Barboni",
            "attori" => "Terence Hill, Bud Spencer, Farley Granger, Remo Capitani, Steffen Zacharias.",
            "anno" => 1970,
            "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff",
            "filmato" => "https://www.youtube.com/watch?v=pWmVZXSB7Tw&list=PLcTl52QlQxGBTG5ylsuXbTuLKvEL9UlRm&index=10",
            "icona" => null,
            "watch" => 1,
        ]);

        FilmModel::create([
            "idFilm" => 2,
            "titolo" => "Continuavano a chiamarlo Trinità",
            "descrizione" => "Nuova avventura di Trinità e Bambino, i due fratellastri maestri nei pugni, nell'uso della Colt e nell'imbroglio dei desperados.",
            "durata" => 128,
            "regista" => "Enzo Barboni",
            "attori" => "Bud Spencer, Terence Hill, Yanti Somer, Enzo Fiermonte, Adriano Micantoni, Furio Meniconi.",
            "anno" => 1971,
            "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff",
            "filmato" => "https://www.youtube.com/watch?v=v4-zP-Il8Gs&list=PLcTl52QlQxGBTG5ylsuXbTuLKvEL9UlRm&index=11",
            "icona" => null,
            "watch" => 1,
        ]);

        FilmModel::create([
            "idFilm" => 3,
            "titolo" => "La dolce vita",
            "descrizione" => "Viaggio all'interno della dolce vita romana degli anni Sessanta. Il film ha ottenuto 4 candidature e vinto un premio ai Premi Oscar, Il film è stato premiato al Festival di Cannes, ha vinto 3 Nastri d'Argento, ha vinto un premio ai David di Donatello.",
            "durata" => 173,
            "regista" => "Federico Fellini",
            "attori" => "Marcello Mastroianni, Anita Ekberg, Anouk Aime, Yvonne Furneaux, Alain Cuny, Annibale Ninchi.",
            "anno" => 1960,
            "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff",
            "filmato" => "https://www.youtube.com/watch?v=v4-zP-Il8Gs",
            "icona" => null,
            "watch" => 0,
        ]);

        FilmModel::create([
            "idFilm" => 4,
            "titolo" => "...ALTRIMENTI CI ARRABBIAMO!",
            "descrizione" => "Una sfida all'ultimo boccone e una gang. Due rivali uniscono le forze per combatterli.",
            "durata" => 100,
            "regista" => "Marcello Fondato",
            "attori" => "Bud Spencer, Terence Hill, John Sharp, Patty Shepard, Deogratias Huerta.",
            "anno" => 1974,
            "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff",
            "filmato" => "https://www.youtube.com/watch?v=ibh5QD00Ivk&list=PLcTl52QlQxGCMJHj2UjwmI_mZOTMWaPtg",
            "icona" => null,
            "watch" => 1,
        ]);

        FilmModel::create([
            "idFilm" => 5,
            "titolo" => "Nati con la camicia",
            "descrizione" => "Doug e Rosco, un ex detenuto e un ventriloquo giramondo, vengono scambiati per agenti della Cia, e viene loro affidata una pericolosa missione.",
            "durata" => 100,
            "regista" => "Enzo Barboni",
            "attori" => "Bud Spencer, Terence Hill, Buffy Dee, Riccardo Pizzuti, David Huddleston, Faith Minton.",
            "anno" => 1983,
            "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff",
            "filmato" => "https://www.youtube.com/watch?v=JNDdA0XY8C0",
            "icona" => null,
            "watch" => 1,
        ]);

        FilmModel::create([
            "idFilm" => 6,
            "titolo" => "PARI E DISPARI",
            "descrizione" => "La Marina americana affida a Johnny l'incarico di indagare su una banda di allibratori che agisce in Florida.",
            "durata" => 114,
            "regista" => "Sergio Corbucci",
            "attori" => "Luciano Catenacci, Bud Spencer, Terence Hill, Enzo Maggio (II), Claudio Ruffini.",
            "anno" => 1978,
            "img" => "https://via.placeholder.com/1920x600/aa0000/ffffff",
            "filmato" => "https://www.youtube.com/watch?v=hxc-BDwIep4&list=PLcTl52QlQxGBTG5ylsuXbTuLKvEL9UlRm&index=15",
            "icona" => null,
            "watch" => 1,
        ]);
    }
}
