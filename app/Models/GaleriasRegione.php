<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriasRegione extends Model
{
    use HasFactory;

    protected $fillable=[
        "imagenes",
        "regions_id",
    ];

    public function regions(){
        return $this->belongsTo(Region::class);
    }
}
