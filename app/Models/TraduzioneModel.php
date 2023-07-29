<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TraduzioneModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "traduzioni";
    protected $primaryKey = "idTraduzione";

    protected $fillable = [
        "idTraduzione",
        "idLingua",
        "chiave",
        "valore"
    ];

    public function lingua()
    {
        return $this->belongsTo(LinguaModel::class, 'idLingua', 'idLingua');
    }
}
