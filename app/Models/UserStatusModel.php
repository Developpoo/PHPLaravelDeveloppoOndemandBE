<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserStatusModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = "idUserStatus";
    protected $table = "userStatus";

    protected $fillable = [
        // "idUserStatus",
        "nome"
    ];
}
