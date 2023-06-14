<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserIndirizzoModel extends Model
{
    use HasFactory, SoftDeletes;

    // use ModelTrait;

    protected $table = "userIndirizzi";
    protected $primaryKey = "idUserIndirizzo";

    protected $fillable = [
        "idUserIndirizzo",
        "idTipoIndirizzo",
        "idNazione",
        "idComune",
        "indirizzo",
        "civico",
        "cap",
        "localita",
        // "lat",
        // "lng",
        "altro_1",
        "altro_2",
        "preferito",
        "archived",
        "created_by",
        "updated_by"
    ];

       // ----------------------------------------------------------------------------------------------------------
    /**
     * Ritorna il contatto associato
     *
     * @return \App\Models\UserClient
     */
    public function userClient()
    {
        return $this->belongsTo(UserClientModel::class, 'idUserClient');
    }
}
