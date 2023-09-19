<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FilmModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "film";
    protected $primaryKey = "idFilm";

    protected $fillable = [
        "idFilm",
        "titolo",
        "descrizione",
        "durata",
        "regista",
        "attori",
        "anno",
        "icona",
        "watch",
        'created_by',
        'updated_by'
    ];

    public function category()
    {
        return $this->belongsToMany(CategoryModel::class, 'idCategory', 'idCategory')->orderBy("preferito", "DESC");
    }
    public function nazioni()
    {
        return $this->belongsToMany(NazioneModel::class, 'idNazione', 'idNazione')->orderBy("preferito", "DESC");
    }
    public function attori()
    {
        return $this->belongsToMany(AttoreModel::class, 'idAttore', 'idAttore')->orderBy("preferito", "DESC");
    }
    public function registi()
    {
        return $this->belongsToMany(RegistaModel::class, 'idRegista', 'idRegista')->orderBy("preferito", "DESC");
    }
}
