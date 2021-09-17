<?php

namespace App\Http\Controllers;

use App\Models\Boxe;
use App\Models\Preinscripcion_fecha;
use Illuminate\Http\Request;

class CiclosController extends Controller
{
    public function show()
    {
        $fechas = Preinscripcion_fecha::select('*')->get();

        return view('ciclos.show', compact('fechas'));
    }

    public function create()
    {
        $boxes = Boxe::select('*')->get();
        return view('ciclos.create', compact('boxes'));
    }

    public function store(Request $request)
    {

        $date = strtotime($request->input('comienzo')); //fecha en entero
        $datos ['dia']= idate('d', $date);
        $datos ['mes']= idate('m', $date);
        $datos ['ano']= intval(20 . idate('y', $date));
        $datos ['nombre'] = $request->input('nombre');
        $datos ['box_id'] = intval($request->input('encargado'));
        $datos ['activo'] = intval($request->input('activo'));

        Preinscripcion_fecha::insert($datos);

        return redirect()->route('ciclos.create')->with('mensaje', 'Formulario Eviado');
    }
}
