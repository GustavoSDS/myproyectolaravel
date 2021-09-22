<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preinscripcion_inscripcion extends Model
{
    use HasFactory;

    //Relacion uno a muchos
    public function fechas()
    {
        return $this->belongsTo(Preinscripcion_fecha::class);
    }

    public function fechasP(){
        return $this->hasMany(Preinscripcion_fecha::class);
    }
}
