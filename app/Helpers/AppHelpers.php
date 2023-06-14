<?php

namespace App\Helpers;

use App\Helpers\Aes;
use App\Helpers\AesCtr;
use App\Models\UserClientModel;
use App\Models\UserClientRoleModel;
use App\Models\UserRoleModel;
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Arr;
use illuminate\Support\Facades\DB;

class AppHelpers
{
    //PUBLIC

    /**
     * toglie il required alla rules di update
     * 
     * @param array $rules
     * @return array
     */
    public static function updateRulesHelper($rules)
    {
        // Questa versione commentata va bene dalla 8.x di Laravel in poi
        // $newRules = array();
        // foreach ($rules as $key => $value) {
        //     $newRules[$key] = str_replace("required|", "", $value);
        // }
        // return $newRules;

        //Questa versione va bene dalla 9.x di Laravel in poi
        $newRules = Arr::map(
            $rules,
            function ($value, $key) {
                return str_replace("required|", "", $value);
            }
        );
        return $newRules;
    }

    /**
     * Unisci Password e salt e fai hash
     * 
     * @param string $text da cifrare
     * @param string $keyCrypted usata per cifrare
     * @return string
     */
    public static function crypt($text, $keyCrypted)
    {
        $textCrypted = AesCtr::encrypt($text, $keyCrypted, 256);
        return base64_encode($textCrypted);
    }

    /**
     * Extract i nomi dei campi della tabella sul DB
     * 
     * @param array $table
     * @return array
     */
    public static function columnTableDB($table)
    {
        $SQL = "SELECT COLUMN_NAME FROM information_schema.columns WHERE table_schema='" . DB::connection()->getDatabaseName() . "'AND table_name='" . $table . "';";
        $tmp = DB::select($SQL);
        return $tmp;
    }

    /**
     * Extract le password tutte dai campi della tabella sul DB
     * 
     * @param string $password
     * @param string $salt
     * @param string $challenge
     * 
     * @return array
     */
    public static function createPasswordCrypted($password, $salt, $challenge)
    {
        $hashPasswordSalt = AppHelpers::hiddenPassword($password, $salt);
        $hashEnd = AppHelpers::crypt($hashPasswordSalt, $challenge);
        return $hashEnd;
    }

    /**
     * Crea il Token per la Sessione
     * 
     * @param string $sercretJWT come chiave di criptazione
     * @param integer $idUserClient
     * @param string $secretJWT
     * @param integer $useData unixtime ability use Token
     * @param integer $expire unixtime scadenza token
     * 
     * @return string
     */
    public static function createTokenSession($idUserClient, $secretJWT, $useData = null, $expire = null)
    {
        $maxTime = 15 * 24 * 60 * 60; // Token expire in 15 days ma
        $recordUserClient = UserClientModel::where("idUserClient", $idUserClient)->first();
        $time = time();
        $nbf = ($useData == null) ? $time : $useData;
        $exp = ($expire == null) ? $nbf + $maxTime : $expire;
        $role = $recordUserClient->role[0];
        $idRole = $role->idUserRole;
        $ability = $role->ability->toArray();
        $ability = array_map(function ($arr) {
            return $arr["idUserAbility"];
        }, $ability);
        $arr = array(
            "iss" => 'https://www.developpoondemand.com',
            "aud" => null,
            "iat" => $time,
            "nbf" => $nbf,
            "exp" => $exp,
            "data" => array(
                "idUserClient" => $idUserClient,
                "idUserStatus" => $recordUserClient->idUserStatus,
                "idUserRole" => $idRole,
                "ability" => $ability,
                "nome" => trim($recordUserClient->nome . " " . $recordUserClient->cognome) //passiamo il nome e cognome perchè ci viene utile per dare un messaggio di benvenuto
            )
        );
        $token = JWT::encode($arr, $secretJWT, "HS256");
        return $token;
    }

    /**
     * Unisci password e salt e fai hash
     * 
     * @param string $text decrypt
     * @param string $keyDecrypted use for decrypting
     * 
     * @return string
     */
    public static function decrypt($textCrypted, $keyDecrypted)
    {
        $textCrypted = base64_decode($textCrypted);
        return AesCTR::decrypt($textCrypted, $keyDecrypted, 256);
    }

    /**
     * Control Administrator
     * 
     * @param string $idGroup
     * @return boolean
     */

    public static function isAdmin($idRole)
    {
        return ($idRole == 1) ? true : false;
    }

    /**
     * Unisci password e salt e fai hash
     * 
     * @param string $password
     * @param string $salt
     * @return string
     */
    public static function hiddenPassword($password, $salt)
    {
        return hash("sha512", $salt . $password);
    }

    /**
     * Control if exist userClient Old
     * 
     * @param boolean $success TRUE if the request is good
     * @param integer $codec Status CODE request
     * @param array $data Data Request
     * @param string $message
     * @param array $errors
     * @return array
     * 
     */
    public static function answerCustom($data, $message = null, $error = null)
    {
        $response = array();
        $response["data"] = $data;
        if ($message != null) $response["message"] = $message;
        if ($error != null) $response["error"] = $error;
        return $response;
    }

    /**
     * 
     * Valid Token
     * 
     * @param string $token
     * @param string $message
     * @param array $errors
     * @return object
     */
    public static function validToken($token, $secretJWT, $session)
    {
        $rit = null;
        $payload = JWT::decode($token, new Key($secretJWT,  'HS256'));
        //echo ("VALIDA 1<br>");
        if ($payload->iat <= $session->sessionStart) {
            if ($payload->data->idUserClient == $session->idUserClient) {
                $rit = $payload;
                //echo ("VALIDA 2<br>");
            }
        }
        return $rit;
    }
}
