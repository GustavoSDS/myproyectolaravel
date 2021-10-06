<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preinscripcion_inscripcion extends Model
{
    use HasFactory;

    public function scopeBuscar($query, $tipo, $buscar)
    {
        if ( ($tipo) && ($buscar) ){
            return $query->where($tipo, 'like', "%buscar%");
        }
    }

    //Relacion uno a muchos
    public function fechas()
    {
        return $this->belongsTo(Preinscripcion_fecha::class, 'preinscripcion_fecha_id', 'id');
    }

    public function fechasP(){
        return $this->hasMany(Preinscripcion_fecha::class);
    }
}
