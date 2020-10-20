<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriasPai extends Model
{
    use HasFactory;
    protected $fillable=[
        "imagenes",
        "pais_id",
    ];

    public function pais(){
        return $this->belongsTo(Pais::class);
    }
}