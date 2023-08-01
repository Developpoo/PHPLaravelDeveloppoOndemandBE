<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComuneModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "comuni";
    protected $primaryKey = "idComune";

    protected $fillable = [
        "idComune",
        "comune",
        "regione",
        "provincia",
        "XXX",
        "targa",
        "KKK",
        "YYY",
        "MMM",
        "prefissoTelefonico",
        "OOO",
        "PPP"
    ];
}
