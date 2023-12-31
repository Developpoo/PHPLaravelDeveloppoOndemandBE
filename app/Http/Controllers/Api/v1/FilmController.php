<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\FilmStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\v1\FilmUpdateRequest;
use App\Http\Resources\v1\FilmCollection;
use App\Http\Resources\v1\FilmResource;
use App\Http\Resources\v1\FilmViewCollection;
use App\Http\Resources\v1\RegistaCollection;
use App\Models\FileModel;
use App\Models\FilmCategoryModel;
use App\Models\FilmFileModel;
use App\Models\FilmModel;
use App\Models\RegistaModel;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResource
     */
    public function index()
    {

        if (Gate::allows("read")) {
            $titolo = (request("titolo") != null) ? request("titolo") : null;
            if ($titolo != null) {
                $film = FilmModel::all()->where('titolo', $titolo);
            } else {
                $film = FilmModel::all();
            }
            return new FilmCollection($film);
        } else {
            abort(403, 'PE_0001');
        }
    }

    // ----------------------------------------------------------------------------------------------------------
    // /**
    //  * Display a listing of the resource.
    //  * @return JsonResource
    //  */
    // public function index()
    // {
    //     $film = null;
    //     if (Gate::allows('leggere')) {
    //         if (Gate::allows('Amministratore')) {
    //             $film = Film::all();
    //         } else {
    //             $film = Film::all()->where('visualizzato', 1);
    //         }
    //         return new FilmCollection($film);
    //     } else {
    //         abort(403, 'PE_0001');
    //     }
    // }

    /**
     * Display a listing of the resource from continente.
     * 
     * @param char $idCategory
     * @return JsonResource
     */
    public function indexCategory($idCategory)
    {
        if (Gate::allows('read')) {
            // $filmCategory = FilmCategoryModel::all()->where('idCategory', $idCategory);
            // return  new FilmCollection($filmCategory);

            $filmCategory = FilmModel::join('filmCategory', 'film.idFilm', '=', 'filmCategory.idFilm')
                ->where('filmCategory.idCategory', $idCategory)
                ->get();

            return new FilmCollection($filmCategory);
        } else {
            abort(403, 'PE_0007');
        }
    }

    /**
     * Display a listing of the resource.
     * 
     * @param char $idCategory
     * @return JsonResource
     */
    public function indexViewCategory($idCategory)
    {
        if (Gate::allows('read')) {
            $filmFromView = DB::table('vistaFilmFileCategory')
                ->where('idCategory', $idCategory)
                ->get();

            return new FilmViewCollection($filmFromView);
        } else {
            abort(403, 'PE_0007 VistaFilmCategoryFile');
        }
    }

    /**
     * Display a listing of the resource.
     * 
     * @param char $idNazione
     * @return JsonResource
     */
    public function indexViewNazioni($idNazione)
    {
        if (Gate::allows('read')) {
            $filmFromView = DB::table('vistaFilmFileNazioni')
                ->where('idNazione', $idNazione)
                ->get();

            return new FilmViewCollection($filmFromView);
        } else {
            abort(403, 'PE_0007 VistaFilmNazioniFile');
        }
    }

    /**
     * Display a listing of the resource.
     * @return JsonResource
     */
    public function indexRegista()
    {

        if (Gate::allows("read")) {
            $nome = (request("nome") != null) ? request("nome") : null;
            if ($nome != null) {
                $regista = RegistaModel::all()->where('nome', $nome);
            } else {
                $regista = RegistaModel::all();
            }
            return new RegistaCollection($regista);
        } else {
            abort(403, 'PE_0001');
        }
    }

    /**
     * Display a listing of the resource.
     * 
     * @param char $idRegista
     * @return JsonResource
     */
    public function indexViewRegisti($idRegista)
    {
        if (Gate::allows('read')) {
            $filmFromView = DB::table('vistaFilmFileRegisti')
                ->where('idRegista', $idRegista)
                ->get();

            return new FilmViewCollection($filmFromView);
        } else {
            abort(403, 'PE_0007 VistaFilmRegistaFile');
        }
    }

    /**
     * Store a newly created resource in storage.
     * @return JsonResource
     */
    public function store(FilmStoreRequest $request)
    {
        if (Gate::allows('create')) {
            if (Gate::allows('Administrator')) {
                $data = $request->validated();
                $idFilm = FilmModel::create($data);
                return new FilmResource($idFilm);
            } else {
                abort(404, 'PE_0007');
            }
        } else {
            abort(403, 'PE_0006');
        }
    }

    /**
     * Display the specified resource.
     * 
     * @param string $film
     * @return AppHelpers\returnCustom
     */
    public function show(FilmModel $idFilm)
    {
        if (Gate::allows('read')) {
            $risorsa = new FilmResource($idFilm);
            return $risorsa;
        } else {
            abort(403, 'PE_0006');
        }
    }

    /**
     * Update the specified resource in storage.
     * 
     * @return JsonResource
     */
    public function update(FilmUpdateRequest $request, FilmModel $idFilm)
    {
        if (Gate::allows('update')) {
            if (Gate::allows('Administrator')) {
                $dati = $request->validated();
                $idFilm->fill($dati);
                $idFilm->save();
                return new FilmResource($idFilm);
            } else {
                abort(403, 'PE-0004');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FilmModel $idFilm)
    {
        if (Gate::allows('delete')) {
            if (Gate::allows('Administrator')) {
                $idFilm->deleteOrFail();
                return response()->noContent();
            }
        } else {
            abort(403, 'PE_0005');
        }
    }

    // PUBLIC

    public static function ultimi($numero)
    {
        //     $idFilm = DB::table("film")->sortByDesc("idFilm")->orderBy("idCategory")->take(10)->get();
        //     return $idFilm;
        // } ->where('watch', 1)

        $film = null;
        if (Gate::allows('read')) {

            $film = FilmModel::all()->sortByDesc("created_at")->take($numero);

            return new FilmCollection($film);
        } else {
            abort(403, 'PE_0001');
        }
    }

    /**
     * Restituisce tutti i film con i file associati.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexWithFiles()
    {
        // try {
        // Assicurati che l'utente sia autorizzato a leggere i film
        if (Gate::allows('read')) {
            // Recupera tutti i film con i file associati
            $films = FilmModel::with('files')->get();

            // Restituisci i dati come JSON
            return response()->json(['data' => $films], 200);
        } else {
            // Restituisci una risposta 403 (Vietato) se l'utente non è autorizzato
            return response()->json(['error' => 'Non sei autorizzato a leggere i film con i file associati.'], 403);
        }
        // } catch (\Exception $e) {
        //     // Gestisci eventuali errori
        //     return response()->json(['error' => 'Errore durante la ricerca dei film con i file associati.'], 500);
        // }
    }

    /**
     * Aggiunge un nuovo film con i file associati.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeFilmFile(FilmStoreRequest $request)
    {
        try {
            if (Gate::allows('create')) {
                if (Gate::allows('Administrator')) {
                    return DB::transaction(function () use ($request) {
                        $filmData = $request->validated();
                        $fileData = $request->input('files', []);

                        // Crea il nuovo film
                        $film = FilmModel::create($filmData);

                        // Associa i file al film utilizzando la tabella di relazione 'filmFile'
                        $idFilms = $request->input('idFilms', []);

                        foreach ($idFilms as $idFilm) {
                            // Verifica se il file esiste
                            $file = FileModel::find($idFilm);

                            if ($file) {
                                // Inserisci la relazione nella tabella 'filmFile'
                                FilmFileModel::create([
                                    'idFilm' => $film->idFilm,
                                    'idFile' => $file->idFile,
                                ]);
                            }
                        }

                        // Crea nuovi file nella tabella 'file' se sono stati forniti i dati
                        foreach ($fileData as $fileDatum) {
                            $file = FileModel::create($fileDatum);

                            // Associa il nuovo file al film nella tabella di relazione 'filmFile'
                            FilmFileModel::create([
                                'idFilm' => $film->idFilm,
                                'idFile' => $file->idFile,
                            ]);
                        }

                        // Dopo aver creato il film e associato i file, carica la relazione 'file' se è necessario
                        $film->load('files');


                        return new FilmResource($film);
                    });
                } else {
                    abort(404, 'PE_0007');
                }
            } else {
                abort(403, 'PE_0006');
            }
        } catch (\Exception $e) {
            // Gestisci eventuali errori
            return response()->json(['error' => 'Errore durante la creazione del film con i file associati.'], 500);
        }
    }

    // public function storeFilmFile(Request $request)
    // {
    //     $filmData = $request->input('filmData'); // Assumi che filmData contenga i dati del film
    //     $file1Data = $request->input('file1Data'); // Assumi che file1Data contenga i dati del primo file
    //     $file2Data = $request->input('file2Data'); // Assumi che file2Data contenga i dati del secondo file

    //     $result = DB::transaction(function () use ($filmData, $file1Data, $file2Data) {
    //         // Inserire il film nella tabella "film"
    //         $film = FilmModel::create($filmData);

    //         // Inserire il primo file nella tabella "file"
    //         $file1 = FileModel::create($file1Data);

    //         // Inserire il secondo file nella tabella "file"
    //         $file2 = FileModel::create($file2Data);

    //         // Creare una nuova associazione tra $film->idFilm e $file1->idFile nella tabella "filmFile"
    //         FilmFileModel::create([
    //             'idFilm' => $film->idFilm,
    //             'idFile' => $file1->idFile
    //         ]);

    //         // Creare una nuova associazione tra $film->idFilm e $file2->idFile nella tabella "filmFile"
    //         FilmFileModel::create([
    //             'idFilm' => $film->idFilm,
    //             'idFile' => $file2->idFile
    //         ]);

    //         return $film; // Puoi restituire il film creato o qualsiasi altra risorsa che desideri
    //     });

    //     return response()->json(['message' => 'Film e File creati e associati con successo']);
    // }




    /**
     * Restituisce un film specifico con i file associati.
     *
     * @param  int  $idFilm
     * @return \Illuminate\Http\JsonResponse
     */
    public function showFilmFile($idFilm)
    {
        try {
            // Recupera il film specifico con i file associati
            $film = FilmModel::with('files')->findOrFail($idFilm);

            // Restituisci i dati come JSON
            return response()->json(['data' => $film], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Gestisci il caso in cui il film non sia stato trovato
            return response()->json(['error' => 'Il film specificato non esiste.'], 404);
        } catch (\Exception $e) {
            // Gestisci eventuali altri errori
            return response()->json(['error' => 'Errore durante la ricerca del film con i file associati.'], 500);
        }
    }
}
