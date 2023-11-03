<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FilmCategoryModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'filmCategory';
    public $timestamps = true;
    protected $primaryKey = null;
    public $incrementing = false;

    public function film()
    {
        return $this->belongsTo(FilmModel::class, 'idFilm', 'idFilm');
    }

    public function category()
    {
        return $this->belongsToMany(CategoryModel::class, 'idCategory', 'idCategory');
    }
}
