@extends('adminlte::page')

@section('title', 'Editar')

@section('content')

    <x-form-ciclos>
        <div class="w-full py-4 bg-white text-center text-xl font-bold">Crear un nuevo Ciclo
        </div>
        @if (Session::has('mensaje'))
            <div class="text-center py-4 lg:px-4">
                <div class="p-2 bg-green-800 items-center text-green-100 leading-none lg:rounded-full flex lg:inline-flex"
                    role="alert">
                    <span class="flex rounded-full bg-green-500 uppercase px-2 py-1 text-xs font-bold mr-3">Guardado</span>
                    <span class="font-semibold mr-2 text-left flex-auto">Datos cargados con exito!</span>
                </div>
            </div>
        @endif
        <form action="{{route('ciclos.update', $fechas->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="px-8 pb-6">

                <div class="m-4">
                    <label class="text-white" for="nombre">Nombre</label>
                    <input class=" border rounded w-full py-2 px-3" type="text" name="nombre" value="{{ $fechas->nombre }}"
                        required>
                </div>

                <div class="m-4">
                    <label class="text-white" for="dia">Fecha</label>
                    <input class=" border rounded w-full py-2 px-3" type="date" value="{{ $fechas->date }}" name="comienzo"
                        required>
                </div>

                <div class="m-4">
                    <label class="text-white" for="encargado">Encargado</label>
                    <select name="encargado" id="encargado">
                        @foreach ($boxes as $boxe)
                            <option value="{{ $boxe->id }}">{{ $boxe->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="m-4">
                    <label class="text-white" for="activo">Activo</label>
                    <select name="activo" id="activo">
                        <option value="1">Si</option>
                        <option value="0">No</option>
                    </select>
                </div>


                <div class="flex justify-center items-center">

                    <button class="mb-2 mx-16 py-1 px-16 rounded-full bg-gradient-to-r from-green-400 to-blue-500 "
                        type="submit"> Guardar </button>
                </div>
            </div>
        </form>
    </x-form-ciclos>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')

@stop
