<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;
    protected $fillable=[
        "nombre",
        "capital",
        "idioma",
        "gentilicio",
        "forma_de_gobierno",
        "superficie",
        "fronteras",
        "linea_de_costa",
        "poblacion_pais",
        "bandera",
        "continente_id"
    ];

    public function continente(){
        return $this->belongsTo(Continente::class);
    }
}
