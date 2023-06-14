<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRoleModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = "idUserRole";
    protected $table = "userRole";

    protected $fillable = [
        'idUserRole',
        'idUserClient',
        'nome'
    ];

    // PUBLIC
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function ability()
    {
        return $this->belongsToMany(UserAbilityModel::class, 'userRoleAbility', 'idUserRole', 'idUserAbility');
    }

    /**
     * Aggiungi le ability per il role sulla tabella userRole_userAbility
     *
     * @param integer $idUserRole
     * @param string|array $idUserAbility
     * @return Collection
     */
    public static function updateRoleAbility($idUserRole, $idUserAbility)
    {
        $role = UserRoleModel::where("idUserRole", $idUserRole)->firstOrFail();
        if (is_string($idUserAbility)) {
            $tmp = explode(',', $idUserAbility);
        } else {
            $tmp = $idUserAbility;
        }
        $role->ability()->attach($tmp);
        return $role->ability;
    }
    /****************************************************************************** */

    // ----------------------------------------------------------------------------------------------------------
    /**
     * Elimina le abilita per il ruolo sulla tabella contattiRuoli_contattiAbilita
     *
     * @param integer $idCRuolo
     * @param string|array $idAbilita
     * @return Collection
     */
    public static function eliminaRuoloAbilita($idUserRole, $idUserAbility)
    {
        $role = UserRoleModel::where("idUserRole", $idUserRole)->firstOrFail();
        if (is_string($idUserAbility)) {
            $tmp = explode(',', $idUserAbility);
        } else {
            $tmp = $idUserAbility;
        }
        $role->ability()->detach($tmp);
        return $role->ability;
    }
    // ----------------------------------------------------------------------------------------------------------
    /**
     * Sincronizza le abilita per il ruolo sulla tabella contattiRuoli_contattiAbilita
     *
     * @param integer $idCRuolo
     * @param string|array $idAbilita
     * @return Collection
     */
    public static function sincronizzaRuoloAbilita($idUserRole, $idUserAbility)
    {
        $ruolo = UserRoleModel::where("idUserRole", $idUserRole)->firstOrFail();
        if (is_string($idUserAbility)) {
            $tmp = explode(',', $idUserAbility);
        } else {
            $tmp = $idUserAbility;
        }
        $ruolo->ability()->sync($tmp);
        return $ruolo->ability;
    }
    // ----------------------------------------------------------------------------------------------------------

}
