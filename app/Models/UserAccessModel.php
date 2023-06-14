<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAccessModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = "idUserAccess";
    protected $table = "userAccess";

    protected $fillable = [
        "idUserAccess",
        "idUserClient",
        "authenticated",
        "ip"
    ];

    //PUBLIC

    /**
     * Update Access
     * 
     * @param string $idUserClient
     */
    public static function updateAccess($idUserClient)
    {
        UserAccessModel::deleteAttemps($idUserClient);
        return UserAccessModel::newRecord($idUserClient, 1);
    }

    /**
     * Update Tentativo Access per idUserClient
     * @param string $idUserClient
     */
    public static function updateAttempFailed($idUserClient)
    {
        return UserAccessModel::newRecord($idUserClient, 0);
    }

    /**
     * Count Tentativi per idUserClient
     * 
     * @param string $idUserClient
     * @return integer 
     */
    public static function countAttemps($idUserClient)
    {
        $tmp = UserAccessModel::where("idUserClient", $idUserClient)->where("authenticated", 0)->count();
        return $tmp;
    }

    // PROTECTED

    protected static function newRecord($idUserClient, $authenticated)
    {
        $tmp = UserAccessModel::create([
            "idUserClient" => $idUserClient,
            "authenticated" => $authenticated,
            "ip" => request()->ip() // se siamo in locale mettere un ip interno altrimenti se siamo in esterno un ip esterno
        ]);
        return $tmp;
    }

    /**
     * Conta quanti tentativi per l'idUserClient sono registrati
     *
     * @param string $idUserClient
     * @return integer
     */
    public static function deleteAttemps($idUserClient)
    {
        UserAccessModel::where("idUserClient", $idUserClient)->delete();
    }

    /**
     * Conta quanti tentativi per l'idContatto sono registrati
     *
     * @param string $idContatto
     * @param boolean $autenticato
     * @return App\Models\Accesso
     */
    protected static function newAccess($idUserClient)
    {
        // $tmp = UserAccessModel::create([
        //     "idUserClient" => $idUserClient,
        //     "autenticato" => $authenticated,
        //     "ip" => request()->ip()
        // ]);
        // return $tmp;

        UserAccessModel::deleteAttemps($idUserClient);
        return UserAccessModel::newRecord($idUserClient, 1);
    }
}
