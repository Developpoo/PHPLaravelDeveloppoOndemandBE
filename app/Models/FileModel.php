<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FilmModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "file";
    protected $primaryKey = "idFile";

    protected $fillable = [
        "idFile",
        "idRecord",
        "tabella",
        "nome",
        "size",
        "ext",
        "descrizione",
        "formato"
    ];
}
