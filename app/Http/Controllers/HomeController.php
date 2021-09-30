<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\Sugestions;
use App\Models\Preinscripcion_fecha;
use App\Models\Preinscripcion_inscripcion;
use App\Models\Suggestion;

const horarios = ['8 a 9', '9 a 10', '14 a 15', '15 a 16', '16 a 17', '17 a 18', '18 a 19', '19 a 20', '20 a 21', '21 a 22'];

class HomeController extends Controller
{
    public function index()
    {
        $horarios = horarios;
        return view('welcome', compact('horarios'));
    }

    public function store(RegisterUserRequest $request)
    {
        if (Preinscripcion_fecha::select('activo')->count() >= 1) {

            $datos = $request->except('_token');

            $datosHorarios = "";
            $meses = Preinscripcion_fecha::where('mes', '=', date("m"))->orderBy('activo')->limit(1)->get();
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
            // return $m;
            return redirect()->route('welcome')->with('alert', 'Formulario enviado!');
        } else {
            return redirect()->route('welcome')->with('alert', 'Sin vacantes disponible! Diculpe las molestias');
        }
    }

    public function suggestions()
    {
        return view('suggestions');
    }

    public function post(Sugestions $request)
    {
        $sugerencias = $request->except('_token');
        Suggestion::insert($sugerencias);
        return redirect()->route('suggestions')->with('message', '¡Sugerencia enviada!');
    }
}
