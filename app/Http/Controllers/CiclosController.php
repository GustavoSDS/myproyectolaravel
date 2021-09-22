<?php

namespace App\Http\Controllers;

use App\Models\Boxe;
use App\Models\Preinscripcion_fecha;
use App\Models\Preinscripcion_inscripcion;
use Illuminate\Http\Request;

class CiclosController extends Controller
{
    public function index(Preinscripcion_fecha $fechas)
    {
        $fechas = Preinscripcion_fecha::select('*')->get();

        return view('ciclos.index', compact('fechas'));
    }

    public function show(Preinscripcion_fecha $fechas, $id)
    {
        $inscriptos = Preinscripcion_inscripcion::where('preinscripcion_fecha_id', '=', $id)->get();
        // return $inscriptos;
        return view('ciclos.show', compact('inscriptos'));
    }

    public function create()
    {
        $boxes = Boxe::select('*')->get();
        return view('ciclos.create', compact('boxes'));
    }

    public function store(Request $request)
    {
        $date = strtotime($request->input('comienzo')); //fecha en entero
        $datos['dia'] = idate('d', $date);
        $datos['mes'] = idate('m', $date);
        $datos['ano'] = intval(20 . idate('y', $date));
        $datos['nombre'] = $request->input('nombre');
        $datos['box_id'] = intval($request->input('encargado'));
        $datos['activo'] = intval($request->input('activo'));

        Preinscripcion_fecha::insert($datos);

        return redirect()->route('ciclos.create')->with('mensaje', 'Formulario Eviado');
    }

    public function edit($id)
    {
        $boxes = Boxe::select('*')->get();

        $fechas = Preinscripcion_fecha::findOrFail($id);

        $date = $fechas->dia.$fechas->mes.$fechas->ano;
        $fechas ['date'] = date('d-m-Y', $date);
        // return $fechas;
        return view('ciclos.edit', compact('fechas','boxes'));
    }

    public function update(Request $request, Preinscripcion_fecha $fecha)
    {
        #
    }

    public function destroy(Preinscripcion_fecha $id)
    {
        $id->delete();

        return redirect()->route('ciclos.show', $id);
    }
}
