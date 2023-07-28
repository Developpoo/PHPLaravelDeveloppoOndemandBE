<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinguaModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "lingue";
    protected $primaryKey = "idLingua";

    protected $fillable = [
        "idLingua",
        "nome",
        "abbreviazione",
        "locale"

    ];
}
