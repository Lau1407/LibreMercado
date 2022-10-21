<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Usuarios extends Model
{
    use HasApiTokens,HasFactory;

    protected $table = "user";

    protected $fillable = [
        "nombre",
        "contrasena"
    ];
    
    public $timestamps = false;
}
