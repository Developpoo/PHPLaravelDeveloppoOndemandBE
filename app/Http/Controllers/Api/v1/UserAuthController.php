<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\UserAuthCollection;
use App\Models\UserAuthModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return JsonResource
     */
    public function index()
    {
        $userAuth = null;
        if (Gate::allows('read')) {
            if (Gate::allows('Administrator')) {
                $userClient = UserAuthModel::all();
            } else {
                $userClient = UserAuthModel::where('idUserAuth', auth()->user()->idUserAuth)->get();
            }
            return new UserAuthCollection($userClient);
        } else {
            abort(403, 'PE_0001');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
