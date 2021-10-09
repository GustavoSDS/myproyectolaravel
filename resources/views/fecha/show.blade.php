@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
    <div class="container mx-auto mt-20">
        <div class="card">
            <div class="flex card-header">
                <div class="w-2/4">
                    <h3 class="font-semibold text-lg uppercase">Total Inscriptos en {{ $fecha->nombre }}
                        {{ $fecha->dia }}/{{ $fecha->mes }}/{{ $fecha->ano }}</h3>
                </div>
                <div class="col text-right">
                    <div class="transform hover:scale-110 m-1 inline-block">
                        <a href="{{ route('fecha.index') }}"
                            class="focus:outline-none text-white text-sm py-2 px-4 bg-gradient-to-r from-red-400 to-red-600">Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-2">
                    <table class="table table-responsive table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th> Inscripto </th>
                                <th> Email </th>
                                <th> DNI </th>
                                <th> Telefono </th>
                                <th> Instagram </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inscriptos as $inscripto)
                                <tr>
                                    <td> {{ $inscripto->nombre." ".$inscripto->apellido }} </td>
                                    <td> {{ $inscripto->email }} </td>
                                    <td> {{ $inscripto->dni }} </td>
                                    <td> {{ $inscripto->telefono }} </td>
                                    <td> {{ $inscripto->instagram }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
