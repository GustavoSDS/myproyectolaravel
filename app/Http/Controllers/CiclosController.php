<?php

namespace App\Http\Controllers;

use App\Models\Boxe;
use App\Models\Preinscripcion_fecha;
use Illuminate\Http\Request;

class CiclosController extends Controller
{
    public function index()
    {
        return view('ciclos.index')->with('mensaje', "");
    }

    public function show($id)
    {
        $fecha = Preinscripcion_fecha::where('id', '=', $id)->get();
        foreach ($fecha as $fecha) {
            $fecha = $fecha;
        }
        return view('ciclos.show', compact('id', 'fecha'));
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

        return redirect()->route('ciclos.create')->with('mensaje', 'Guardado');
    }

    public function edit($id)
    {
        $boxes = Boxe::select('*')->get();

        $fechas = Preinscripcion_fecha::findOrFail($id);

        $date = $fechas->dia . $fechas->mes . $fechas->ano;
        $fechas['date'] = date('d-m-Y', $date);
        // return $fechas;
        return view('ciclos.edit', compact('fechas', 'boxes'));
    }

    public function update(Request $request, $id)
    {
        $date = strtotime($request->input('comienzo')); //fecha en entero
        $datos['dia'] = idate('d', $date);
        $datos['mes'] = idate('m', $date);
        $datos['ano'] = intval(20 . idate('y', $date));
        $datos['nombre'] = $request->input('nombre');
        $datos['box_id'] = intval($request->input('encargado'));
        $datos['activo'] = intval($request->input('activo'));

        Preinscripcion_fecha::where('id', '=', $id)->update($datos);
        return redirect()->route('ciclos.index')->with('mensaje', 'Actualizado');
    }

    public function destroy(Preinscripcion_fecha $id)
    {
        $id->delete();

        return redirect()->route('ciclos.show', $id);
    }
}
