<?php

use App\Helpers\AppHelpers;
use App\Http\Controllers\Api\v1\CategoryController;
use App\Http\Controllers\Api\v1\ComuneItalianoController;
use App\Http\Controllers\Api\v1\ConfigurationController;
use App\Http\Controllers\Api\v1\CreditoController;
use App\Http\Controllers\Api\v1\EmailController;
use App\Http\Controllers\Api\v1\FileController;
use App\Http\Controllers\Api\v1\FilmController;
use App\Http\Controllers\Api\v1\IndirizzoController;
use App\Http\Controllers\Api\v1\LinguaController;
use App\Http\Controllers\Api\v1\RecapitoController;
use App\Http\Controllers\Api\v1\NazioneController;
use App\Http\Controllers\Api\v1\SignController;
use App\Http\Controllers\Api\v1\TipoFileController;
use App\Http\Controllers\Api\v1\UserClientController;
use App\Http\Controllers\Api\v1\UserRoleController;
use App\Http\Controllers\Api\v1\UserStatusController;
use App\Http\Controllers\Api\v1\TipoIndirizzoController;
use App\Http\Controllers\Api\v1\TipoRecapitoController;
use App\Http\Controllers\Api\v1\TraduzioneController;
use App\Http\Controllers\Api\v1\TraduzioneCustomController;
use App\Http\Controllers\Api\v1\UploadFileController;
use App\Http\Controllers\Api\v1\UserAuthController;
use App\Http\Controllers\Api\v1\UserPasswordController;
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

// Route::get(_VERS . '/verify-token', function () {
//     $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3d3dy5kZXZlbG9wcG9vbmRlbWFuZC5jb20iLCJhdWQiOm51bGwsImlhdCI6MTY4NjEzNzg0NCwibmJmIjoxNjg2MTM3ODQ0LCJleHAiOjE2ODc0MzM4NDQsImRhdGEiOnsiaWRVc2VyQ2xpZW50IjoxLCJpZFVzZXJTdGF0dXMiOjEsImlkVXNlclJvbGUiOjEsImFiaWxpdHkiOlsxLDIsMyw0XSwibm9tZSI6IkZhbmdvIEZhbmdoaSJ9fQ.ah3lVNdRkfh1DQFJWNZddt4JXsfQaBD1iQ0XFrRfJR4";
//     $result = \App\Http\Controllers\Api\v1\SignController::verifyToken($token);

//     echo "Risultato: ";
//     print_r($result);
// });

// Route::get(_VERS . '/test-authentication', function (Request $request) {
//     // Esegui il middleware di autenticazione
//     $middleware = new \App\Http\Middleware\Authentication();
//     $response = $middleware->handle($request, function ($request) {
//         return response('funziona!');
//     });

//     // Restituisci la risposta del middleware
//     return $response;
// });

// Route::get(_VERS . '/testLogin', function () {
//     $hashUser = "49cca1b5126b0ca1a60374152e335679c139ea79165c3578c51d71e1fdc4f95dac7b36a576b67ac6f5edeacb26acc666f4c17db1f8f04e85fd07dcc951790470";
//     $pwd = "411fe146b5f5418be1b978b41aa37322f6c89bce93d4ae6e66a11df5f66936b1efbdbad5d04f5eda43e602a86c2f60ed38b67ed364d5066af32d117827fcffa8";
//     $salt = "2cce0c1495eedf94d2cf2385f5d2293e9c6a80798601ef91fb4f359ed2ac1e57a4651a0a77d48c7e5bf68b96ee522c6110754c3f14dd75eb253dc91874546618";

//     $hashSalePsw = AppHelpers::hiddenPassword($pwd, $salt);

//     SignController::testLogin($hashUser, $hashSalePsw);
// });

/*********************************************************************************** */
// FREE ROUTE ADMINISTRATORS - USERCLIENTS - VISITORS - MANAGERS
// API FREE ##########################################àààà##############################

Route::get(_VERS . '/signClient/{userClient}/{hash?}', [SignController::class, 'show']);
// API per la verifica sull'esistente di un user
Route::get(_VERS . '/searchUserClient/{user}', [SignController::class, 'searchUser']);
// REGISTRAZIONE UTENTE
Route::post(_VERS . '/registrazione', [UserClientController::class, 'recordUserClient']);
// CONTATTI DA WEB
Route::post(_VERS . '/invia-email', [EmailController::class, 'inviaEmail']);

// USER ROLE
Route::get(_VERS . '/userRole', [UserRoleController::class, 'index']);
Route::get(_VERS . '/userRole/{idUserRole}', [UserRoleController::class, 'show']);

//USER STATUS
Route::get(_VERS . '/userStatus', [UserStatusController::class, 'index']);
Route::get(_VERS . '/userStatus/{idUserStatus}', [UserStatusController::class, 'show']);

// CONFIGURATION
Route::get(_VERS . '/configuration', [ConfigurationController::class, 'index']);
Route::get(_VERS . '/configuration/{configuration}', [ConfigurationController::class, 'show']);

// COMUNI
Route::get(_VERS . '/comuniItaliani', [ComuneItalianoController::class, 'index']);
Route::get(_VERS . '/comuniItaliani/{comune}', [comuneItalianoController::class, 'show']);
Route::get(_VERS . '/comuniItaliani/provincia/{provincia}', [comuneItalianoController::class, 'indexProvincia']);
Route::get(_VERS . '/comuniItaliani/regione/{regione}', [comuneItalianoController::class, 'indexRegione']);

// NAZIONI
Route::get(_VERS . '/nazioni', [NazioneController::class, 'index']);
Route::get(_VERS . '/nazioni/{nazione}', [NazioneController::class, 'show']);
Route::get(_VERS . '/nazioni/continente/{continente}', [NazioneController::class, 'indexContinente']);

// TIPO INDIRIZZO
Route::get(_VERS . '/tipoIndirizzi', [TipoIndirizzoController::class, 'index']);
Route::get(_VERS . '/tipoIndirizzi/{tipoIndirizzo}', [TipoIndirizzoController::class, 'show']);

// TIPO RECAPITO
Route::get(_VERS . '/tipoRecapiti', [TipoRecapitoController::class, 'index']);
Route::get(_VERS . '/tipoRecapiti/{idTipoRecapito}', [TipoRecapitoController::class, 'show']);

// LINGUE
Route::get(_VERS . '/lingue', [LinguaController::class, 'index']);
Route::get(_VERS . '/lingue/{idLingua}', [LinguaController::class, 'show']);

// TRADUZIONI
Route::get(_VERS . '/traduzioni', [TraduzioneController::class, 'index']);
Route::get(_VERS . '/traduzioni/{idTraduzione}', [TraduzioneController::class, 'show']);
Route::get(_VERS . '/lingue/{idLingua}/traduzioni', [TraduzioneController::class, 'showTraduzioni']);

// TRADUZIONI CUSTOM
Route::get(_VERS . '/traduzioniCustom', [TraduzioneCustomController::class, 'index']);
Route::get(_VERS . '/traduzioniCustom/{idTraduzioneCustom}', [TraduzioneCustomController::class, 'show']);

// UPLOAD
Route::get(_VERS . '/upload', [UploadFileController::class, 'index']);

// TIPOFILE
Route::get(_VERS . '/tipoFile', [TipoFileController::class, 'index']);
Route::get(_VERS . '/tipoFile/{idTipoFile}', [TipoFileController::class, 'show']);

// INDIRIZZI
Route::post(_VERS . '/indirizzi', [IndirizzoController::class, 'store']);

// RECAPITI
Route::post(_VERS . '/recapiti', [RecapitoController::class, 'store']);


/*********************************************************************************************** */
// AUTHENTICATION ROUTE USERCLIENTS - ADMISTRATORS - MANAGERS

Route::middleware(['authentication', 'UserRoleMiddleware:Administrator,User,Manager'])->group(function () {

    // MODIFICA E CANCELLAZIONE UTENTE
    Route::put(_VERS . '/api/user-client/{idUserClient}', [UserClientController::class, 'updateUserClient']);
    Route::delete(_VERS . '/api/user-client/{idUserClient}', [UserClientController::class, 'deleteUserClient']);



    // USER CLIENT
    Route::get(_VERS . '/userClient/{idUserClient}', [UserClientController::class, 'show']);
    Route::put(_VERS . '/userClient/{idUserClient}', [UserClientController::class, 'update']);
    Route::post(_VERS . '/userClient', [UserClientController::class, 'store']);
    Route::delete(_VERS . '/userClient/{idUserClient}', [UserClientController::class, 'destroy']);

    // Indirizzi
    Route::get(_VERS . '/indirizzi/{idIndirizzo}', [IndirizzoController::class, 'show']);
    Route::put(_VERS . '/indirizzi/{idIndirizzo}', [IndirizzoController::class, 'update']);
    Route::delete(_VERS . '/indirizzi/{idIndirizzo}', [IndirizzoController::class, 'destroy']);

    // Recapiti
    Route::get(_VERS . '/recapiti/{idRecapito}', [RecapitoController::class, 'show']);
    Route::put(_VERS . '/recapiti/{idRecapito}', [RecapitoController::class, 'update']);
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
    Route::get(_VERS . '/filmFile', [FilmController::class, 'indexWithFiles']);
    Route::get(_VERS . '/filmFile/{idFilm}', [FilmController::class, 'showFilmFile']);
    // Route::get(_VERS . '/filmFile/category/{idCategory}', [FilmController::class, 'storeFilmFileCategory']);

    // FILE
    Route::get(_VERS . '/file', [FileController::class, 'index']);
});

/*********************************************************************************************** */
// AUTHENTICATION ROUTE ADMINISTRATORS - MANAGERS

Route::middleware(['authentication', 'UserRoleMiddleware:Administrator,Manager'])->group(function () {

    // CATEGORIE
    Route::post(_VERS . '/category', [CategoryController::class, 'store']);
    Route::put(_VERS . '/category/{idCategory}', [CategoryController::class, 'update']);

    // FILM
    Route::post(_VERS . '/film', [FilmController::class, 'store']);
    Route::post(_VERS . '/filmFile', [FilmController::class, 'storeFilmFile']);
    Route::put(_VERS . '/film/{idFilm}', [FilmController::class, 'update']);

    // TIPO FILE
    Route::put(_VERS . '/tipoFile/{idTipoFile}', [TipoFileController::class, 'update']);
    Route::post(_VERS . '/tipoFile', [TipoFileController::class, 'store']);

    // FILE
    Route::post(_VERS . '/file', [FilmController::class, 'store']);
    Route::put(_VERS . '/file/{idFile}', [FilmController::class, 'update']);
});

/*********************************************************************************************** */
// AUTHENTICATION ROUTE ADMINISTRATORS

Route::middleware(['authentication', 'UserRoleMiddleware:Administrator'])->group(function () {

    // USER CLIENT
    Route::get(_VERS . '/userClient', [UserClientController::class, 'index']);

    // USER AUTH
    Route::get(_VERS . '/userAuth', [UserAuthController::class, 'index']);

    // USER PASSWORD
    Route::get(_VERS . '/userPassword', [UserPasswordController::class, 'index']);

    // Indirizzi
    Route::get(_VERS . '/indirizzi', [IndirizzoController::class, 'index']);

    // Recapiti
    Route::get(_VERS . '/recapito', [RecapitoController::class, 'index']);

    // TipoIndirizzi
    Route::put(_VERS . '/tipoIndirizzi/{tipoIndirizzo}', [TipoIndirizzoController::class, 'update']);
    Route::post(_VERS . '/tipoIndirizzi', [TipoIndirizzoController::class, 'store']);
    Route::delete(_VERS . '/tipoIndirizzi/{tipoIndirizzo}', [TipoIndirizzoController::class, 'destroy']);

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
    Route::delete(_VERS . '/category/{idCategory}', [CategoryController::class, 'destroy']);

    // FILM
    Route::delete(_VERS . '/film/{idFilm}', [FilmController::class, 'destroy']);

    // TIPO FILE
    Route::delete(_VERS . '/tipoFile/{idTipoFile}', [TipoFileController::class, 'destroy']);

    // FILE
    Route::delete(_VERS . '/file/{idFile}', [FilmController::class, 'destroy']);
});
