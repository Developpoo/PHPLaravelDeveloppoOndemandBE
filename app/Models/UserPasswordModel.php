<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPasswordModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = "idUserPassword";
    protected $table = "userPassword";

    protected $fillable = [
        "idUserPassword",
        "idUserClient",
        "password",
        "salt"
    ];

    // PUBLIC

    /**
     * Ritonro il record della password attualmente usata
     * 
     * @param integer $idUserClient
     * @return \App|models\Password
     */
    public static function passwordNew($idUserClient)
    {
        $record = UserPasswordModel::where("idUserClient", $idUserClient)->orderby("idUserPassword", "desc")->firstOrFail();
        return $record;
    }
}
