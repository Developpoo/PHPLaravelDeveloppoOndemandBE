<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "category";
    protected $primaryKey = "idCategory";

    protected $fillable = [
        "idCategory",
        "nome"
    ];

    /****************************** */

    public function film()
    {
        return $this->hasMany(FilmModel::class, 'idCategory', 'idCategory');
    }

    public function serieTv()
    {
        return $this->hasMany(SerieTvModel::class, 'idCategory', 'idCategory');
    }
}
