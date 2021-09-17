<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\Boxe;
use App\Models\Preinscripcion_fecha;
use App\Models\Preinscripcion_inscripcion;
use Illuminate\Http\Request;

const horarios = ['8 a 9', '9 a 10', '14 a 15', '15 a 16', '16 a 17', '17 a 18', '18 a 19', '19 a 20', '20 a 21', '21 a 22'];

class FormularioController extends Controller
{
    public function index()
    {
        $horarios = horarios;
        return view('welcome', compact('horarios'));
    }

    public function store(RegisterUserRequest $request)
    {
        $horarios = horarios;
        if (!Preinscripcion_fecha::select('*')->count() == 0) {
            // return dd(request()->except('_token'));

            $datos = $request->except('_token');

            $datosHorarios = "";
            $meses = Preinscripcion_fecha::select('id')->orderBy('activo')->limit(1)->get();
            $mes = $meses[0];
            $m = $mes['id'];
            foreach ($datos['horarios'] as $dato) {
                $datosHorarios = $datosHorarios . $dato . " - ";
            }

            $datos['horarios'] = $datosHorarios;
            $datos['preinscripcion_fecha_id'] = $m;

            $datosOrdenados['preinscripcion_fecha_id'] = $datos['preinscripcion_fecha_id'];
            $datosOrdenados['dni'] = $datos['dni'];
            $datosOrdenados['nombre'] = $datos['nombre'];
            $datosOrdenados['apellido'] = $datos['apellido'];
            $datosOrdenados['email'] = $datos['email'];
            $datosOrdenados['telefono'] = $datos['telefono'];
            $datosOrdenados['instagram'] = $datos['instagram'];
            $datosOrdenados['horarios'] = $datos['horarios'];

            Preinscripcion_inscripcion::insert($datosOrdenados);
            // return $datosOrdenados;
            return redirect()->route('welcome', $horarios)->with('mensaje', 'Formulario Eviado');
        } else {
            return redirect()->route('welcome', $horarios)->with('mensaje', 'Formulario Pendiente');
        }
    }
}
