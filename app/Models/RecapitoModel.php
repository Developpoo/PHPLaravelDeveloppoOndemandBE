<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecapitoModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "recapiti";
    protected $primaryKey = "idRecapito";

    protected $fillable = [
        "idRecapito",
        "idUserClient",
        "idTipoRecapito",
        "recapito",
        "preferito"
    ];

    /**
     * Funzione per ritorno di appartenza
     * 
     * così faccio un collegamento molti a uno dove chiediamo al model il tipo di indirizzo
     */

    public function tipoRecapito()
    {
        return $this->belongsToMany(TipoRecapitoModel::class, 'idTipoRecapito', 'idTipoRecapito');
    }
}
