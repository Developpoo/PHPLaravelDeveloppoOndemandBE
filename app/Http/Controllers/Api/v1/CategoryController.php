<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\CategoryStoreRequest;
use App\Http\Resources\v1\CategoryCollection;
use App\Http\Resources\v1\CategoryResource;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\v1\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResource
     */
    public function index()
    {
        $category = null;
        if (Gate::allows('read')) {
            if (Gate::allows('Administrator')) {
                $category = CategoryModel::all();
            } else {
                $category = CategoryModel::all()->where('watch', 0);
            }
            return new CategoryCollection($category);
        } else {
            abort(403, 'PE_0001');
        }
    }

    /**
     * Store a newly created resource in storage.
     * @return JsonResource
     */
    public function store(CategoryStoreRequest $request)
    {
        if (Gate::allows('create')) {
            if (Gate::allows('Administrator')) {
                $data = $request->validated();
                $idCategory = CategoryModel::create($data);
                return new CategoryResource($idCategory);
            } else {
                abort(403, 'PE_0006');
            }
        } else {
            abort(403, 'PE_0008');
        }
    }

    /**
     * Display the specified resource.
     * 
     * @param string $userClient
     * @param string $hash
     * @return AppHelpers\returnCustom
     */
    public function show(CategoryModel $idCategory)
    {
        if (Gate::allows('read')) {
            if (Gate::allows('Administrator') || $idCategory->watch) {
                $risorsa = new CategoryResource($idCategory);
            } else {
                abort(404, 'PE_0003');
            }
        } else {
            abort(403, 'PE_00002');
        }
        return $risorsa;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, CategoryModel $idCategory)
    {
        if (Gate::allows('update')) {
            $data = $request->validated();
            $idCategory->fill($data);
            $idCategory->save();
            return new CategoryResource($idCategory);
        } else {
            abort(403, 'PE-0004');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryModel $idCategory)
    {
        if (Gate::allows('delete')) {
            $idCategory->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, 'PE_0005');
        }
    }
}
