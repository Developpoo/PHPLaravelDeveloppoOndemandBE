<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmAttoreModel extends Model
{
    use HasFactory;

    protected $table = 'filmAttori';
    public $timestamps = true;
    protected $primaryKey = null;
    public $incrementing = false;

    public function film()
    {
        return $this->belongsToMany(FilmModel::class, 'idFilm');
    }

    public function attori()
    {
        return $this->belongsToMany(RegistaModel::class, 'idAttore');
    }
}
