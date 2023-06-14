<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreditoModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "crediti";
    protected $primaryKey = "idCredito";

    protected $fillable = [
        "idCredito",
        "idUserClient",
        "credito"
    ];



    // ----------------------------------------------------------------------------------------------------------
    /**
     * Ritorna il contatto associato
     *
     * @return \App\Models\UserClientModel
     */
    public function userClient()
    {
        return $this->hasOne(UserClientModel::class, 'idUserClient');
    }
}
