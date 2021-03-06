<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continente extends Model
{
    use HasFactory;

    protected $fillable=[
        "nombre_continente",
        "tamaño",
        "poblacion"
    ];
}
