<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoIndirizzoModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "tipoIndirizzi";
    protected $primaryKey = "idTipoIndirizzo";
    protected $fillable = [
        "idTipoIndirizzo",
        "nome"
    ];

    /**
     * Elenco degli indirizzi
     * In sostanza io faccio una relazione tra diverse chiavi così da potere fare un collegamento uno a molti
     * 
     * @return 
     */

    public function elencoIndirizzi()
    {
        return $this->belongsToMany(IndirizzoModel::class, 'idTipoIndirizzo', 'idTipoIndirizzo'); // se non specifico ultmi 2 parametri li crea lui, ma errore causa snake cascade
    }
}
