<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmRegistaModel extends Model
{
    use HasFactory;

    protected $table = 'filmRegisti';
    public $timestamps = true;
    protected $primaryKey = null;
    public $incrementing = false;

    public function film()
    {
        return $this->belongsToMany(FilmModel::class, 'idFilm');
    }

    public function registi()
    {
        return $this->belongsTo(RegistaModel::class, 'idRegista');
    }
}
