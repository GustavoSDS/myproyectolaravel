<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preinscripcion_fecha extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    //Relacion uno a muchos
    public function inscripto(){
        return $this->hasMany(Preinscripcion_inscripcion::class);
    }

    public function inscriptos()
    {
        return $this->belongsTo(Preinscripcion_inscripcion::class);
    }


}
