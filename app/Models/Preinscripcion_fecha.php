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
    protected $fillable = [
        'dia',
        'mes',
        'ano',
        'nombre',
        'box_id',
    ];

    //Relacion uno a muchos inversa
    public function inscriptos(){
        return $this->belongsTo(Preinscripcion_inscripcion::class);
    }
}
