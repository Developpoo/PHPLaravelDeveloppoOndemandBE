<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as ClasseGate;
use App\Models\UserRoleModel;

class UserClientModel extends ClasseGate
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = "idUserClient";
    protected $table = "userClient";

    protected $with = ['recapiti', 'indirizzi', 'crediti'];

    protected $fillable = [
        'idUserClient',
        'idUserStatus',
        'nome',
        'cognome',
        'sesso',
        'codiceFiscale',
        'partitaIva',
        'cittadinanza',
        'idNazioneNascita',
        'cittaNascita',
        'nazioneNascita',
        'provinciaNascita',
        'dataNascita',
        'archived',
        'created_by',
        'updated_by'
    ];

    //PUBLIC

    /**
     * Aggiungi i ruoli per il contatto sulla tabella userClient_userRole
     * 
     * @param integer $idUserClient
     * @param string|array $idUserRole
     * @return Collection
     */

    public static function updateUserRole($idUserClient, $idRole)
    {
        $userClient = UserClientModel::where("idUserClient", $idUserClient)->firstOrFail();
        if (is_string($idRole)) {
            $tmp = explode(',', $idRole);
        } else {
            $tmp = $idRole;
        }
        $userClient->role()->attach($tmp);
        return $userClient->role;
    }

    //-----------------------------------
    public function crediti()
    {
        return $this->hasOne(CreditoModel::class, 'idUserClient', 'idUserClient');
    }

    //-----------------------------------
    /**
     * Delete Role per userClient on table userClient_userRole
     * 
     * @param integer $idUserClient
     * @param string|array $idUserRole
     * @return Collection
     */

    public static function deleteUserRole($idUserClient, $idRole)
    {
        $userClient = UserClientModel::where("idUserClient", $idUserClient)->firstOrFail();
        if (is_string($idRole)) {
            $tmp = explode(',', $idRole);
        } else {
            $tmp = $idRole;
        }
        $userClient->role()->detach($tmp);
        return $userClient->role;
    }

    /*******************************************************************/

    public function indirizzi()
    {
        return $this->hasMany(IndirizzoModel::class, 'idUserClient', 'idUserClient')->orderBy("preferito", "DESC");
    }

    public function recapiti()
    {
        return $this->hasMany(RecapitoModel::class, 'idUserClient', 'idUserClient')->orderBy("preferito", "DESC");
    }

    /*****************************************************/

    /**
     * Sincronizza i ruoli per UserClient sulla tabella userClint_userRole
     * @param integer $idUserClient
     */
    public function role()
    {
        return $this->belongsToMany(UserRoleModel::class, 'userClientRole', 'idUserClient', 'idUserRole');
    }

    /**************************************************************************** */
    /**
     * Sincronizza i ruoli per il contatto sulla tabella userClient_userRole
     * 
     * @param integer $idUserClient
     * @param string|array $idUserRole
     * @return Collection
     */
    public static function sincronizzaUserRole($idUserClient, $idRole)
    {
        $userClient = UserClientModel::where("idUserClient", $idUserClient)->firstOrFail();
        if (is_string($idRole)) {
            $tmp = explode(',', $idRole);
        } else {
            $tmp = $idRole;
        }
        $userClient->role()->sync($tmp);
        return $userClient->role;
    }
}
