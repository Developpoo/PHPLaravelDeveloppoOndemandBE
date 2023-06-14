<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoleAbilityModel extends Model
{
    use HasFactory;

    protected $primaryKey = "idUserRole";
    protected $table = "userRoleAbility";

    protected $fillable = [
        'idUserRoleAbility',
        'idUserAbility',
        'idUserRole'
    ];

    public function userAbility()
    {
        return $this->hasMany(UserAbilityModel::class, 'idUserAbility', 'idUserAbility');
    }

    public function userRole()
    {
        return $this->hasMany(UserRoleModel::class, 'idUserRole', 'idUserRole');
    }
}
