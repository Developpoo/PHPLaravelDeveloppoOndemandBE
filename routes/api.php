<?php

use App\Helpers\AppHelpers;
use App\Http\Controllers\Api\v1\CategoryController;
use App\Http\Controllers\Api\v1\ComuneItalianoController;
use App\Http\Controllers\Api\v1\ConfigurationController;
use App\Http\Controllers\Api\v1\CreditoController;
use App\Http\Controllers\Api\v1\FilmController;
use App\Http\Controllers\Api\v1\IndirizzoController;
use App\Http\Controllers\Api\v1\LinguaController;
use App\Http\Controllers\Api\v1\RecapitoController;
use App\Http\Controllers\Api\v1\NazioneController;
use App\Http\Controllers\Api\v1\SignController;
use App\Http\Controllers\Api\v1\UserClientController;
use App\Http\Controllers\Api\v1\UserRoleController;
use App\Http\Controllers\Api\v1\UserStatusController;
use App\Http\Controllers\Api\v1\TipoIndirizzoController;
use App\Http\Controllers\Api\v1\TipoRecapitoController;
use App\Http\Controllers\Api\v1\TraduzioneController;
use App\Http\Controllers\Api\v1\TraduzioneCustomController;
use App\Http\Controllers\Api\v1\UploadFileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


if (!defined('_VERS')) {
    define('_VERS', 'v1');
}

/*********************************************************************************** */
// FREE ROUTE PER IL CONTROLLO DEL CODICE E LA PRODUZIONE DEL TOKEN

Route::get(_VERS . '/verify-token', function () {
    $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3d3dy5kZXZlbG9wcG9vbmRlbWFuZC5jb20iLCJhdWQiOm51bGwsImlhdCI6MTY4NjEzNzg0NCwibmJmIjoxNjg2MTM3ODQ0LCJleHAiOjE2ODc0MzM4NDQsImRhdGEiOnsiaWRVc2VyQ2xpZW50IjoxLCJpZFVzZXJTdGF0dXMiOjEsImlkVXNlclJvbGUiOjEsImFiaWxpdHkiOlsxLDIsMyw0XSwibm9tZSI6IkZhbmdvIEZhbmdoaSJ9fQ.ah3lVNdRkfh1DQFJWNZddt4JXsfQaBD1iQ0XFrRfJR4";
    $result = \App\Http\Controllers\Api\v1\SignController::verifyToken($token);

    echo "Risultato: ";
    print_r($result);
});

Route::get(_VERS . '/test-authentication', function (Request $request) {
    // Esegui il middleware di autenticazione
    $middleware = new \App\Http\Middleware\Authentication();
    $response = $middleware->handle($request, function ($request) {
        return response('funziona!');
    });

    // Restituisci la risposta del middleware
    return $response;
});

Route::get(_VERS . '/testLogin', function () {
    $hashUser = "d3d05637c6f66919b002c215dbec2a40f703fe0e4109bc27be2a6ce50dea57a3c308cfa5124f704b5e8fe0059d29d4f0af7ebfbaf80906c6be554636bc6b1952";
    $pwd = "09b261daf5046d0eaac1648b77cb1fb571e8f4702a8b19a436f73f5aead8d754b3ab2fa12dc9bf31e91f0035188a82d5ba2be2fd15ceec67c34125a7d9d92015";
    $salt = "a2468577e7d248dd922d79fdbc0b026fb096d706dfd4eb73a781974235ba3fc86027e262695c2c2c0f90c9df354fbe4f10feb19f9bb616cb303a1e2d41820ce4";

    $hashSalePsw = AppHelpers::hiddenPassword($pwd, $salt);

    SignController::testLogin($hashUser, $hashSalePsw);
});

/*********************************************************************************** */
// FREE ROUTE ADMINISTRATORS - USERCLIENTS - VISITORS
// API FREE ##########################################àààà##############################

Route::get(_VERS . '/signClient/{userClient}/{hash?}', [SignController::class, 'show']);
Route::get(_VERS . '/searchUserClient/{user}', [SignController::class, 'searchUser']);
Route::post(_VERS . '/registrazione', [UserClientController::class, 'recordUserClient']);

// USER ROLE
Route::get(_VERS . '/userRole', [UserRoleController::class, 'index']);
Route::get(_VERS . '/userRole/{idUserRole}', [UserRoleController::class, 'show']);

//USER STATUS
Route::get(_VERS . '/userStatus', [UserStatusController::class, 'index']);
Route::get(_VERS . '/userStatus/{idUserStatus}', [UserStatusController::class, 'show']);

// Configuration
Route::get(_VERS . '/configuration', [ConfigurationController::class, 'index']);
Route::get(_VERS . '/configuration/{configuration}', [ConfigurationController::class, 'show']);

// COMUNI
Route::get(_VERS . '/comuniItaliani', [ComuneItalianoController::class, 'index']);
Route::get(_VERS . '/comuniItaliani/{comune}', [comuneItalianoController::class, 'show']);
Route::get(_VERS . '/comuniItaliani/provincia/{provincia}', [comuneItalianoController::class, 'indexProvincia']);
Route::get(_VERS . '/comuniItaliani/regione/{regione}', [comuneItalianoController::class, 'indexRegione']);

//NAZIONI
Route::get(_VERS . '/nazioni', [NazioneController::class, 'index']);
Route::get(_VERS . '/nazioni/{nazione}', [NazioneController::class, 'show']);
Route::get(_VERS . '/nazioni/continente/{continente}', [NazioneController::class, 'indexContinente']);

//TIPOINDIRIZZO
Route::get(_VERS . '/tipoIndirizzi', [TipoIndirizzoController::class, 'index']);
Route::get(_VERS . '/tipoIndirizzi/{tipoIndirizzo}', [TipoIndirizzoController::class, 'show']);

//TIPORECAPITO
Route::get(_VERS . '/tipoRecapiti', [TipoRecapitoController::class, 'index']);
Route::get(_VERS . '/tipoRecapiti/{idTipoRecapito}', [TipoRecapitoController::class, 'show']);

//LINGUE
Route::get(_VERS . '/lingue', [LinguaController::class, 'index']);
Route::get(_VERS . '/lingue/{idLingua}', [LinguaController::class, 'show']);

//TRADUZIONI
Route::get(_VERS . '/traduzioni', [TraduzioneController::class, 'index']);
Route::get(_VERS . '/traduzioni/{idTraduzione}', [TraduzioneController::class, 'show']);
Route::get(_VERS . '/lingue/{idLingua}/traduzioni', [TraduzioneController::class, 'showTraduzioni']);

//TRADUZIONI CUSTOM
Route::get(_VERS . '/traduzioniCustom', [TraduzioneCustomController::class, 'index']);
Route::get(_VERS . '/traduzioniCustom/{idTraduzioneCustom}', [TraduzioneCustomController::class, 'show']);

//UPLOAD
Route::get(_VERS . '/upload', [UploadFileController::class, 'index']);

/*********************************************************************************************** */
// AUTHENTICATION ROUTE USERCLIENTS & ADMISTRATORS

Route::middleware(['authentication', 'UserRoleMiddleware:Administrator,UserClient'])->group(function () {

    // USER CLIENT
    Route::get(_VERS . '/userClient/{idUserClient}', [UserClientController::class, 'show']);
    Route::put(_VERS . '/userClient/{idUserClient}', [UserClientController::class, 'update']);
    Route::post(_VERS . '/userClient', [UserClientController::class, 'store']);
    Route::delete(_VERS . '/userClient/{idUserClient}', [UserClientController::class, 'destroy']);

    // Indirizzi
    Route::get(_VERS . '/indirizzi/{idIndirizzo}', [IndirizzoController::class, 'show']);
    Route::put(_VERS . '/indirizzi/{idIndirizzo}', [IndirizzoController::class, 'update']);
    Route::post(_VERS . '/indirizzi', [IndirizzoController::class, 'store']);
    Route::delete(_VERS . '/indirizzi/{idIndirizzo}', [IndirizzoController::class, 'destroy']);

    // Recapiti
    Route::get(_VERS . '/recapiti/{idRecapito}', [RecapitoController::class, 'show']);
    Route::put(_VERS . '/recapiti/{idRecapito}', [RecapitoController::class, 'update']);
    Route::post(_VERS . '/recapiti', [RecapitoController::class, 'store']);
    Route::delete(_VERS . '/recapiti/{idRecapito}', [RecapitoController::class, 'destroy']);

    // CREDITO
    Route::get(_VERS . '/crediti/{idCredito}', [CreditoController::class, 'show']);
    Route::post(_VERS . '/crediti/{idCredito}/{value}', [UserClientController::class, 'updateCredito']);

    //CATEGORY
    Route::get(_VERS . '/category', [CategoryController::class, 'index']);
    Route::get(_VERS . '/category/{idCategory}', [CategoryController::class, 'show']);

    // FILM
    Route::get(_VERS . '/film', [FilmController::class, 'index']);
    Route::get(_VERS . '/film/ultimi/{numero}', [FilmController::class, 'ultimi']);
    Route::get(_VERS . '/film/category/{idCategory}', [FilmController::class, 'indexCategory']);
    Route::get(_VERS . '/film/{idFilm}', [FilmController::class, 'show']);
});

/*********************************************************************************************** */
// AUTHENTICATION ROUTE ADMINISTRATORS

Route::middleware(['authentication', 'UserRoleMiddleware:Administrator'])->group(function () {

    // USER CLIENT
    Route::get(_VERS . '/userClient', [UserClientController::class, 'index']);



    // Indirizzi
    Route::get(_VERS . '/indirizzi', [IndirizzoController::class, 'index']);

    // TipoIndirizzi
    Route::put(_VERS . '/tipoIndirizzi/{tipoIndirizzo}', [TipoIndirizzoController::class, 'update']);
    Route::post(_VERS . '/tipoIndirizzi', [TipoIndirizzoController::class, 'store']);
    Route::delete(_VERS . '/tipoIndirizzi/{tipoIndirizzo}', [TipoIndirizzoController::class, 'destroy']);

    // Recapiti
    Route::get(_VERS . '/recapito', [RecapitoController::class, 'index']);

    // TipoRecapiti
    Route::put(_VERS . '/tipoRecapiti/{idTipoRecapito}', [TipoRecapitoController::class, 'update']);
    Route::post(_VERS . '/tipoRecapiti', [TipoRecapitoController::class, 'store']);
    Route::delete(_VERS . '/tipoRecapiti/{idTipoRecapito}', [TipoRecapitoController::class, 'destroy']);

    // USER STATUS
    Route::put(_VERS . '/userStatus/{idUserStatus}', [UserStatusController::class, 'update']);
    Route::post(_VERS . '/userStatus', [UserStatusController::class, 'store']);
    Route::delete(_VERS . '/userStatus/{idUserStatus}', [UserStatusController::class, 'destroy']);

    // USER ROLE
    Route::put(_VERS . '/userRole/{idUserRole}', [UserRoleController::class, 'update']);
    Route::post(_VERS . '/userRole', [UserRoleController::class, 'store']);
    Route::delete(_VERS . '/userRole/{idUserRole}', [UserRoleController::class, 'destroy']);

    // CREDITO
    Route::get(_VERS . '/crediti', [CreditoController::class, 'index']);
    Route::post(_VERS . '/crediti', [CreditoController::class, 'store']);
    Route::put(_VERS . '/crediti/{idCredito}', [CreditoController::class, 'update']);
    Route::delete(_VERS . '/crediti/{idCredito}', [CreditoController::class, 'destroy']);

    // CATEGORIE
    Route::post(_VERS . '/category', [CategoryController::class, 'store']);
    Route::put(_VERS . '/category/{idCategory}', [CategoryController::class, 'update']);
    Route::delete(_VERS . '/category/{idCategory}', [CategoryController::class, 'destroy']);

    // FILM
    Route::post(_VERS . '/film', [FilmController::class, 'store']);
    Route::put(_VERS . '/film/{idfilm}', [FilmController::class, 'update']);
    Route::delete(_VERS . '/film/{idfilm}', [FilmController::class, 'destroy']);
});
