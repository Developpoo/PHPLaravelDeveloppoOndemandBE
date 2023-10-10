<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\UserPasswordCollection;
use App\Models\UserPasswordModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserPasswordController extends Controller
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
                $userPassword = UserPasswordModel::all();
            } else {
                $userPassword = UserPasswordModel::where('idUserPassword', auth()->user()->idUserPassword)->get();
            }
            return new UserPasswordCollection($userPassword);
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
