<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class ConfigurationModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = "idConfiguration";
    protected $table = "configuration";

    protected $fillable = [
        "idConfiguration",
        "key",
        "value"
    ];

    /********************************************* */

    public static function readValue(string $key)
    {
        // $results = DB::table('configuration')->get();
        $results = DB::table('configuration')->where('key', $key)->first();

        return $results ? $results->value : null;
    }
}
