<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ConfigurationCollection;
use App\Http\Resources\v1\ConfigurationResource;
use App\Models\ConfigurationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResource
     */
    public function index()
    {
        //     if (Gate::allows('read')) {
        //         if (Gate::allows('Administrator')) {
        $configuration = ConfigurationModel::all();
        return new ConfigurationCollection($configuration);
        //     } else {
        //         abort(403, 'PE_0001');
        //     }
        // }
    }

    /**
     * Display the specified resource.
     * 
     * @param string $film
     * @return AppHelpers\returnCustom
     */
    public function show(ConfigurationModel $configuration)
    {
        // if (Gate::allows('read')) {
        //     if (Gate::allows('Administrator')) {
        $risorsa = new ConfigurationResource($configuration);
        return $risorsa;
        //     } else {
        //         abort(403, 'PE_0001');
        //     }
        // }
    }
}
