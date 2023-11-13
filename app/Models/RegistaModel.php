<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistaModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "registi";
    protected $primaryKey = "idRegista";
    protected $fillable = [
        "idRegista",
        "idNazione",
        "nome",
        'src',
        'alt',
        'title'
    ];

    public function nazioni()
    {
        return $this->belongsTo(NazioneModel::class, 'idRegista', 'idRegista');
    }
}
