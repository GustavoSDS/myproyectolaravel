<?php

namespace App\Http\Controllers;

use App\Models\Preinscripcion_fecha;
use App\Models\Preinscripcion_inscripcion;
use Illuminate\Support\Facades\DB;

class DatatableController extends Controller
{
    public function inscriptos($id)
    {
        $inscriptos = Preinscripcion_inscripcion::select('id', DB::raw( 'CONCAT(nombre , " ",  apellido) as inscripto'), 'dni', 'email', 'telefono', 'instagram')->where('preinscripcion_fecha_id', '=', $id)->get();
        return datatables()->of($inscriptos)->toJson();
    }
    public function fechas()
    {
        $datos = Preinscripcion_fecha::select('id', 'dia', 'mes', 'ano', 'nombre', 'activo')->get();
        return datatables()->of($datos)->toJson();
    }
}
