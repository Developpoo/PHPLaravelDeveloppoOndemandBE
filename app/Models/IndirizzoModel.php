<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IndirizzoModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "indirizzi";
    protected $primaryKey = "idIndirizzo";

    protected $fillable = [
        "idIndirizzo",
        "idUserClient",
        "idTipoIndirizzo",
        "idComune",
        "idNazione",
        "indirizzo",
        "cap",
        "preferito"
    ];

    /**
     * Funzione per ritorno di appartenza
     * 
     * così faccio un collegamento molti a uno dove chiediamo al model il tipo di indirizzo
     */

    public function tipoIndirizzo()
    {
        return $this->hasMany(TipoIndirizzoModel::class, 'idTipoIndirizzo', 'idTipoIndirizzo');
    }
}
