<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NazioneModel extends Model
{
    use HasFactory;

    protected $table = "nazioni";

    protected $primaryKey = "idNazione";

    protected $fillable = [
        'idNazione',
        'nome',
        'continente',
        'src',
        'alt',
        'title',
        'iso3',
        'iso',
        'prefissoTelefonico',
        'watch'
    ];

    public function film()
    {
        return $this->belongsToMany(FilmModel::class, 'idFilm', 'idFilm')->orderBy("preferito", "DESC");
    }

    public function attori()
    {
        return $this->belongsToMany(AttoreModel::class, 'idAttore', 'idAttore')->orderBy("preferito", "DESC");
    }

    public function regista()
    {
        return $this->belongsToMany(RegistaModel::class, 'idRegista', 'idRegista')->orderBy("preferito", "DESC");
    }
}
