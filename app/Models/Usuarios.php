<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $table = "user";

    protected $fillable = [
        "nombre",
        "contrasena"
    ];
    
    public $timestamps = false;
}
