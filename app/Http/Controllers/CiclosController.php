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

        // return view('ciclos.index', compact('fechas'));

        function get_client_ip()
        {
            // Nothing to do without any reliable information
            if (!isset($_SERVER['REMOTE_ADDR'])) {
                return NULL;
            }
            // Header that is used by the trusted proxy to refer to
            // the original IP
            $proxy_header = "HTTP_X_FORWARDED_FOR";
            // List of all the proxies that are known to handle 'proxy_header'
            // in known, safe manner
            $trusted_proxies = array("2001:db8::1", "192.168.50.1");
            if (in_array($_SERVER['REMOTE_ADDR'], $trusted_proxies)) {
                // Get IP of the client behind trusted proxy
                if (array_key_exists($proxy_header, $_SERVER)) {
                    // Header can contain multiple IP-s of proxies that are passed through.
                    // Only the IP added by the last proxy (last IP in the list) can be trusted.
                    $client_ip = trim(end(explode(",", $_SERVER[$proxy_header])));
                    // Validate just in case
                    if (filter_var($client_ip, FILTER_VALIDATE_IP)) {
                        return $client_ip;
                        https: //riptutorial.com/es/home 113
                    } else {
                        // Validation failed - beat the guy who configured the proxy or
                        // the guy who created the trusted proxy list?
                        // TODO: some error handling to notify about the need of punishment
                    }
                }
            }
            // In all other cases, REMOTE_ADDR is the ONLY IP we can trust.
            return $_SERVER['REMOTE_ADDR'];
        }
        print get_client_ip();
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

        $date = $fechas->dia . $fechas->mes . $fechas->ano;
        $fechas['date'] = date('d-m-Y', $date);
        // return $fechas;
        return view('ciclos.edit', compact('fechas', 'boxes'));
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
