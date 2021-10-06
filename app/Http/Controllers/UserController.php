<?php

namespace App\Http\Controllers;

use App\Models\Preinscripcion_fecha;
use App\Models\Preinscripcion_inscripcion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $users = User::paginate(10);

        $dates = Preinscripcion_fecha::all();
        $fechas = $dates->sortBy('nombre')->pluck('nombre')->unique();
        $activos = $dates->sortBy('activo')->pluck('activo')->unique();

        return view('fecha.index', compact('fechas', 'activos', 'dates'));

    }

    public function dataTable()
    {
        return DataTables::of(Preinscripcion_fecha::select('id', 'dia', 'mes', 'ano', 'nombre', 'created_at', 'activo'))
            ->editColumn('created_at', function (Preinscripcion_fecha $fecha) {
                return $fecha->created_at->diffForHumans();
            })
            ->addColumn('btn', 'fecha.dataTable.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fecha.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $input = $request->all();
        // $input['password'] = bcrypt($request->password);
        // User::create($input);
        // return redirect()->route('user.index');

        $date = strtotime($request->input('comienzo')); //fecha en entero
        $datos['dia'] = idate('d', $date);
        $datos['mes'] = idate('m', $date);
        $datos['ano'] = intval(20 . idate('y', $date));
        $datos['nombre'] = $request->input('nombre');
        // $datos['box_id'] = intval($request->input(''));
        $datos['activo'] = intval($request->input('activo'));

        Preinscripcion_fecha::insert($datos);

        return redirect()->route('fecha.index')->with('mensaje', 'Creado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fecha = Preinscripcion_fecha::findOrFail($id);
        $inscriptos = Preinscripcion_inscripcion::where('preinscripcion_fecha_id', '=', $id)->get();
        return view('fecha.show', compact('fecha', 'inscriptos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fecha = Preinscripcion_fecha::findOrFail($id);
        return view('fecha.edit', compact('fecha'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $fecha = Preinscripcion_fecha::findOrFail($id);
        // $input = $request->only('name', 'email');
        // $password = $request->input('password');
        // if ($password) {
        //     $input['password'] = bcrypt($password);
        // }
        // $fecha->fill($input);
        // // dd($fecha);
        // $fecha->save();

        $date = strtotime($request->input('comienzo')); //fecha en entero
        $datos['dia'] = idate('d', $date);
        $datos['mes'] = idate('m', $date);
        $datos['ano'] = intval(20 . idate('y', $date));
        $datos['nombre'] = $request->input('nombre');
        $datos['activo'] = intval($request->input('activo'));

        Preinscripcion_fecha::where('id', '=', $id)->update($datos);
        return redirect()->route('fecha.index')->with('mensaje', 'Actualizado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fecha = Preinscripcion_fecha::findOrFail($id);
        $fecha->delete();
        return redirect()->back()->with('mensaje', 'Eliminado con éxito!');
    }
}
