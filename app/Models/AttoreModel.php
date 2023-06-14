<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttoreModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "attori";
    protected $primaryKey = "idAttore";
    protected $fillable = [
        "idAttore",
        "idNazione",
        "nome"
    ];

    public function nazioni()
    {
        return $this->hasMany(NazioneModel::class, 'idAttore', 'idAttore')->orderBy("preferito", "DESC");;
    }
}
