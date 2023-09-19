<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "file";
    protected $primaryKey = "idFile";

    protected $fillable = [
        "idFile",
        "idTipoFile",
        "nome",
        "src",
        "alt",
        "title",
        "descrizione",
        "formato"
    ];
}
