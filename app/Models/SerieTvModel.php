<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SerieTvModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "serieTv";
    protected $primaryKey = "idSerieTv";

    protected $fillable = [
        "idSerieTv",
        "idCategory",
        "idNazione",
        "titolo",
        "descrizione",
        "totaleStagioni",
        "numeroEpisodio",
        "regista",
        "attori",
        "anno",
        "idImg",
        "idFilmato",
        "idTrailer",
        'created_by',
        'updated_by'
    ];

    public function category()
    {
        return $this->hasMany(CategoryModel::class, 'idCategory', 'idCategory')->orderBy("preferito", "DESC");
    }
    public function nazioni()
    {
        return $this->hasMany(NazioneModel::class, 'idNazione', 'idNazione')->orderBy("preferito", "DESC");
    }
}
