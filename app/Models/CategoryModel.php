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
        "nome",
        "idFile",
        "icona",
        "watch"
    ];

    /****************************** */

    public function film()
    {
        return $this->belongsToMany(FilmModel::class, 'idCategory', 'idCategory');
    }

    public function serieTv()
    {
        return $this->belongsToMany(SerieTvModel::class, 'idCategory', 'idCategory');
    }
}
