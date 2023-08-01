<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TraduzioneCustomModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "traduzioniCustom";
    protected $primaryKey = "idTraduzioneCustom";

    protected $fillable = [
        "idTraduzioneCustom",
        "idLingua",
        "chiave",
        "valore"
    ];

    public function lingua()
    {
        return $this->belongsTo(LinguaModel::class, 'idLingua', 'idLingua');
    }
}
