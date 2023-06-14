<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAbilityModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = "idUserAbility";
    protected $table = "userAbility";

    protected $fillable = [
        'idUserClient',
        'nome',
        'power'
    ];
}
