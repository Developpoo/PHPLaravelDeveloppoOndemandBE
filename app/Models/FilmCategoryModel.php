<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmCategoryModel extends Model
{
    use HasFactory;

    protected $table = 'filmCategory';
    public $timestamps = true;
    protected $primaryKey = null;
    public $incrementing = false;

    public function film()
    {
        return $this->belongsToMany(FilmModel::class, 'idCategory', 'idFilm');
    }

    public function category()
    {
        return $this->belongsToMany(CategoryModel::class, 'idCategory');
    }
}
