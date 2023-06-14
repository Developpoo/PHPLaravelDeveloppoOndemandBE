<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserClientRoleModel extends Model
{
    use HasFactory;

    protected $primaryKey = "idUserClientRole";
    protected $table = "userClientRole";

    protected $fillable = [
        "id",
        "idUserClient",
        "idUserRole"
    ];

    public function userClient()
    {
        return $this->hasOne(UserClientModel::class, 'idUserClient', 'idUserClient');
    }

    public function userRole()
    {
        return $this->hasOne(UserRoleModel::class, 'idUserRole', 'idUserRole');
    }
}
