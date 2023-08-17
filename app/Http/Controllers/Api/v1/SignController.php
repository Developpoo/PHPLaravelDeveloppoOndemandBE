<?php

namespace App\Http\Controllers\Api\v1;


use App\Helpers\AppHelpers;
use App\Http\Controllers\Controller;
use App\Models\ConfigurationModel;
use App\Models\UserAccessModel;
use App\Models\UserAuthModel;
use App\Models\UserClientModel;
use App\Models\UserPasswordModel;
use App\Models\UserSessionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\Config\Configuration;
use Stringable;

class SignController extends Controller
{

    // PUBLIC

    /**
     * Cerco l'hash dello user nel DB
     * 
     * @return boolean
     */
    public function searchUser($idUserClient)
    {
        $tmp = (UserAuthModel::existUserClient($idUserClient)) ? true : false;
        return AppHelpers::answerCustom($tmp);
    }

    /**
     * Display the specified resource.
     * 
     * @param string $userClient
     * @param string $hash
     * @return AppHelpers\returnCustom
     */
    public function show($userClient, $hash = null)
    {
        if ($hash == null) {
            return SignController::controlUserClient($userClient);
        } else {
            return SignController::controlPassword($userClient, $hash);
        }
    }

    // PUBLIC

    /**
     * Create Token for develop
     * 
     * @return AppHelpers\answerCustom
     * 
     */
    public static function testToken()
    {
        $userClient = hash("sha512", trim("Admin@UserClient"));
        $password = hash("sha512", trim("Password123!"));
        $salt = hash("sha512", trim("Salt"));
        $challenge = hash("sha512", trim("Challenge"));
        $secretJWT = hash("sha512", trim("Secret"));
        $auth = UserAuthModel::where('user', $userClient)->firstOrFail();
        if ($auth != null) {
            $auth->challengeStart = time();
            // $auth->challenge = $challenge;
            $auth->secretJWT = $secretJWT;
            $auth->save();

            $recordPassword = UserPasswordModel::passwordNew($auth->idUserClient);
            if ($recordPassword != null) {
                $recordPassword->salt = $salt;
                $recordPassword->password = $password;
                $recordPassword->save();
                // $cipher = AppHelpers::hiddenPassword($password. $salt, $challenge);
                $cipher = AppHelpers::hiddenPassword($password, $salt);
                $token = AppHelpers::createTokenSession($auth->idUserClient, $secretJWT);
                $data = array("token" => $token, "xLogin" => $cipher);
                $session = UserSessionModel::where("idUserClient", $auth->idUserClient)->firstOrFail();
                $session->token->$token;
                $session->sessionStart = time();
                $session->save();
                return AppHelpers::answerCustom($data);
            }
        }
    }

    /**
     * Create Token for develop
     * 
     * @param string $userClient
     * @return AppHelpers\answerCustom
     */
    public static function testLogin($hashUserClient, $hashPassword)
    {
        return SignController::controlPassword($hashUserClient, $hashPassword);
    }

    /**
     * Verify Token always
     * 
     * @param string $token
     * @return object
     */

    public static function verifyToken($token)
    {
        $rit = null;
        $session = UserSessionModel::dataSession($token);
        // echo ("punto 5" . $session);
        if ($session != null) {
            $sessionStart = $session->sessionStart;
            $sessionTime = ConfigurationModel::readValue("sessionTime");
            // $ConfigurationModel = new ConfigurationModel();
            // $sessionTime = $ConfigurationModel->readValue("sessionTime");
            $sessionEnd = $sessionStart + $sessionTime;
            // echo ("Punto1<br>");
            if (time() < $sessionEnd) {
                // echo ("Punto2<br>");
                $auth = UserAuthModel::where('idUserClient', $session->idUserClient)->first();
                if ($auth != null) {
                    // echo ("Punto3<br>");
                    $secretJWT = $auth->secretJWT;
                    $payload = AppHelpers::validToken($token, $secretJWT, $session);
                    if ($payload != null) {
                        // echo ("Punto4<br>");
                        $rit = $payload;
                        return $rit;
                    } else {
                        abort(403, 'TK_006');
                    }
                } else {
                    abort(403, 'TK_005');
                }
            } else {
                abort(403, 'TK_004');
            }
        } else {
            abort(403, 'TK_003');
        }
    }

    // PROTECTED 

    /**
     * Controllo Validità userClient
     * 
     * @param string $userClient
     * @return AppHelpers\answerCustom
     */

    protected static function controlUserClient($userClient)
    {
        $salt = hash("sha512", trim(Str::random(200)));
        // $salt = hash("sha512", trim("Ciao"));
        if (UserAuthModel::existUserClientValidForLogin($userClient)) {
            //exist
            $auth = UserAuthModel::where("user", $userClient)->first();
            $auth->secretJWT = hash("sha512", trim(Str::random(200)));
            $auth->challengeStart = time();
            $auth->save();
            $recordPassword = UserPasswordModel::passwordNew($auth->idUserClient);
            $recordPassword->salt = $salt;
            $recordPassword->save();
        } else {
            // not exist
        }
        $data = array("salt" => $salt); // creiamo un array associativo
        return AppHelpers::answerCustom($data);
    }

    /**
     * Login
     * 
     * @param string $userClient
     * @param string $hash
     * @return AppHelpers\unswerCustom
     */

    protected static function controlPassword($userClient, $hashSalePsw)
    {
        if (UserAuthModel::existUserClientValidForLogin($userClient)) {
            //exist
            $auth = UserAuthModel::where('user', $userClient)->first();
            $secretJWT = $auth->secretJWT;
            $challengeStart = $auth->challengeStart;
            $challengeTime = ConfigurationModel::readValue("challengeTime");
            $maxAttemps = ConfigurationModel::readValue("maxLoginMistake");
            $challengeEnd = $challengeStart + $challengeTime;
            if (time() < $challengeEnd) {
                $attemps = UserAccessModel::countAttemps($auth->idUserClient);
                if ($attemps < $maxAttemps - 1) {
                    $recordPassword = UserPasswordModel::passwordNew($auth->idUserClient);
                    $password = $recordPassword->password;
                    $salt = $recordPassword->salt;
                    $passwordHiddenDB = AppHelpers::hiddenPassword($password, $salt);
                    // $passwordClient = AppHelpers::decryptedPassword($hashSalePsw, $secretJWT);
                    if ($hashSalePsw == $passwordHiddenDB) {
                        $token = AppHelpers::createTokenSession($auth->idUserClient, $secretJWT);
                        // echo "TOKEN: " . $token . "<br>";
                        UserAccessModel::deleteAttemps($auth->idUserClient);
                        $access = UserAccessModel::newAccess($auth->idUserClient);

                        UserSessionModel::deleteSession($auth->idUserClient);
                        UserSessionModel::updateSession($auth->idUserClient, $token);

                        $data = array("token" => $token);
                        return AppHelpers::answerCustom($data);
                    } else {
                        UserAccessModel::updateAttempFailed($auth->idUserClient);
                        abort(403, "Error L004 <br>" . $hashSalePsw . " <br>" . $passwordHiddenDB);
                    }
                } else {
                    abort(403, "Error L003");
                }
            } else {
                UserAccessModel::updateAttempFailed($auth->idUserClient);
                abort(403, "Error L002");
            }
        } else {
            abort(403, "Error L001");
        }
    }
}
