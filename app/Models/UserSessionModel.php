<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Facades\DB;

class UserSessionModel extends Model
{
    use HasFactory;

    protected $primaryKey = "idUserSession";
    protected $table = "userSession";

    protected $fillable = [
        "idUserClient",
        "token",
        "sessionStart"
    ];

    //PUBLIC

    /**
     * Update Session for UserClient ed oldToken
     * 
     * @param integer $idUserClient
     * @param string $token
     */

    public static function updateSession($idUserClient, $token)
    {
        $where = ["idUserClient" => $idUserClient, "token" => $token];
        $arr = ["sessionStart" => time()];
        DB::table("userSession")->updateOrInsert($where, $arr);
    }

    /**
     * Delete Session for old userClient
     * @param string $idUserClient
     */
    public static function deleteSession($idUserClient)
    {
        DB::table("userSession")->where("idUserClient", $idUserClient)->delete();
    }

    /**
     * Data Session
     * 
     * @param string $token
     * @return App\Models\userSession
     */
    public static function dataSession($token)
    {
        if (UserSessionModel::existSession($token)) {
            // return DB::table("userSession")->where("token", $token)->first();
            return UserSessionModel::where("token", $token)->get()->first();
        } else {
            return null;
        }
    }

    /**
     * Control if exist a session with token
     * 
     * @param string $token
     * @return boolean
     */
    public static function existSession($token)
    {
        // return DB::table("userSession")->where("token", $token)->exists();
        return UserSessionModel::where("token", $token)->exists();
    }
}
