<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable=[
        "nombre_region",
        "altitud",
        "superficie",
        "fundacion",
        "poblacion_region",
        "bandera",
        "pais_id",
    ];

    public function pais(){
        return $this->belongsTo(Pais::class);
    }
}
