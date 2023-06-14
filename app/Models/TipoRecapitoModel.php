<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoRecapitoModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "tipoRecapiti";
    protected $primaryKey = "idTipoRecapito";

    protected $fillable = [
        "idTipoRecapito",
        "nome"
    ];

    public function elencoRecapiti()
    {
        return $this->belongsToMany(RecapitoModel::class, 'idTipoRecapito', 'idTipoRecapito');
    }
}
