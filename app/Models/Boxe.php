<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boxe extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nombre',
        'email',
        'direccion',
        'direccion_altura',
        'telefono',
        'crated_by'
    ];
    //Relacion uno a muchos
    public function boxes()
    {
        return $this->hasMany(Preinscripcion_fecha::class);
    }
}
