<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class UserAuthModel extends Model
{
   use HasFactory, SoftDeletes;

   protected $primaryKey = "idUserAuth";
   protected $table = "userAuth";

   protected $fillable = [
      'idUserAuth',
      'idUserClient',
      "user",
      "challenge",
      "secretJWT",
      "challengeStart",
      "mustChange"
   ];

   //PUBLIC

   /**
    * Control existUserClientValidForLogin
    * 
    * @param string $user
    * @return boolean
    */

   public static function existUserClientValidForLogin($user)
   {
      $tmp = DB::table('userClient')->join('userAuth', 'userClient.idUserClient', '=', 'userAuth.idUserClient')->where('userClient.idUserStatus', '=', 1)->where('userAuth.user', '=', $user)->select('userAuth.idUserClient')->get()->count();
      return ($tmp > 0) ? true : false;
   }

   /**
    * Control existUserClientValidForLogin
    * 
    * @param string $user
    * @return boolean
    */

   public static function existUserClient($user)
   {
      $tmp = DB::table('userAuth')->where('userAuth.user', '=', $user)->select('userAuth.idUserClient')->get()->count();
      return ($tmp > 0) ? true : false;
   }
}
