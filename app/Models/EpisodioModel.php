<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SerieTvModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "episodi";
    protected $primaryKey = "idEpisodio";

    protected $fillable = [
        "idEpisodio",
        "idSerieTv",
        "titolo",
        "descrizione",
        "numeroStagione",
        "numeroEpisodio",
        "durata",
        "anno",
        "idImg",
        "idFilmato",
        "idTrailer"
    ];
}
