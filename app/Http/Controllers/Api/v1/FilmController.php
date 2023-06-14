<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\FilmStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\v1\FilmUpdateRequest;
use App\Http\Resources\v1\FilmCollection;
use App\Http\Resources\v1\FilmResource;
use App\Models\FilmCategoryModel;
use App\Models\FilmModel;
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
     * Store a newly created resource in storage.
     * @return JsonResource
     */
    public function store(FilmStoreRequest $request)
    {
        if (Gate::allows('create')) {
            if (Gate::allows('Administrator')) {
                $data = $request->validated();
                $idfilm = FilmModel::create($data);
                return new FilmResource($idfilm);
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
    public function update(FilmUpdateRequest $request, FilmModel $idfilm)
    {
        if (Gate::allows('update')) {
            if (Gate::allows('Administrator')) {
                $dati = $request->validated();
                $idfilm->fill($dati);
                $idfilm->save();
                return new FilmResource($idfilm);
            } else {
                abort(403, 'PE-0004');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FilmModel $idfilm)
    {
        if (Gate::allows('delete')) {
            if (Gate::allows('Administrator')) {
                $idfilm->deleteOrFail();
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
}
