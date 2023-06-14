<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Api\v1\SignController;
use App\Models\UserClientModel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authentication
{
    /**
     * Handle an incoming request.
     * 
     * @param 1Illuminate\Http\Request $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http|RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response
    {
        //     // return $next($request);

        //     $token = $_SERVER['HTTP_AUTHORIZATION'];
        //     $token = trim(str_replace("Beared", "", $token));
        //     // Codice che necessità di modifiche per Apache
        //     // if (isset($_SERVER['PHP_AUTH_PW'])) {
        //     //     $token = $_SERVER['PHP_AUTH_PW'];
        //     // print_r($token);
        //     // $token = $request->bearerToken();
        //     $payload = SignController::verifyToken($token);
        //     echo ("CIAO " . $payload);
        //     exit();
        //     if ($payload != null) {
        //         $userClient = UserClientModel::where("idUserCLient", $payload->data->idUserClient)->firstOrFail();
        //         if ($userClient->idUserStatus == 1) {
        //             //print:r($userClient->role->pluck('nome')->toArray());
        //             Auth::login($userClient); // Da questo momento in poi sarà associato a idUserClient un login positivo
        //             $request->userRole = $userClient->role->pluck('nome')->toArray();
        //             return $next($request);
        //         } else {
        //             abort(403, "TK_002");
        //         }
        //     } else {
        //         abort(403, "TK_001");
        //     }
        //     //     } else {
        //     //         abort(403, "TK_019");
        //     //     }
        // }

        if ($request->hasHeader('Authorization')) {
            $header = $request->header('Authorization');
            $token = trim(str_replace('Bearer', '', $header));

            $payload = SignController::verifyToken($token);
            if ($payload != null) {
                $userClient = UserClientModel::where('idUserClient', $payload->data->idUserClient)->firstOrFail();
                if ($userClient->idUserStatus == 1) {
                    Auth::login($userClient);
                    $request->userRole = $userClient->role->pluck('nome')->toArray();
                    return $next($request);
                } else {
                    abort(403, 'TK_002');
                }
            } else {
                abort(403, 'TK_001');
            }
        } else {
            abort(403, 'TK_019');
        }
    }
}
