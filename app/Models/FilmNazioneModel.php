<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmNazioneModel extends Model
{
    use HasFactory;

    protected $table = 'filmNazioni';
    public $timestamps = true;
    protected $primaryKey = null;
    public $incrementing = false;

    public function film()
    {
        return $this->belongsToMany(FilmModel::class, 'idFilm');
    }

    public function nazione()
    {
        return $this->belongsToMany(NazioneModel::class, 'idNazione');
    }
}
