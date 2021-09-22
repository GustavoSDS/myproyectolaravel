@extends('adminlte::page')

@section('title', 'Listado')

@section('content')

    <x-form-listado>
        <div class="w-11/12 mx-auto text-right bg-blue-300">
            <h1 class="text-gray-800 font-bold underline py-3 text-center uppercase">Listado</h1>
        </div>
        <table class="w-11/12 max-w-7xl  mx-auto text-center">
            <thead class="bg-red-200 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-2 text-left">Nombre</th>
                    <th class="py-3 px-2 text-left">Dia</th>
                    <th class="py-3 px-2 text-left">Mes</th>
                    <th class="py-3 px-2 text-center">Año</th>
                    <th class="py-3 px-2 text-left">Activo</th>
                    <th class="py-3 px-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-bold">

                @foreach ($fechas as $fecha)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">

                        {{-- Nombre Ciclo --}}
                        <td class="py-3 px-2 text-left">
                            <div class="flex items-center">
                                <span>{{ $fecha->nombre }}</span>
                            </div>
                        </td>

                        {{-- Dia Ciclo --}}
                        <td class="py-3 px-2 text-left">
                            <div class="flex items-left justify-left">
                                <span>{{ $fecha->dia }}</span>
                            </div>
                        </td>

                        {{-- Mes Ciclo --}}
                        <td class="py-3 px-2 text-left">
                            <div class="flex items-left justify-left">
                                <span>{{ $fecha->mes }}</span>
                            </div>
                        </td>

                        {{-- Año Ciclo --}}
                        <td class="py-3 px-2 text-left">
                            <div class="flex items-left justify-left">
                                <span>{{ $fecha->ano }}</span>
                            </div>
                        </td>

                        {{-- ESTADO Ciclo --}}
                        <td class="py-3 px-2 text-center">
                            @if ($fecha->activo == 1)
                                <span class="bg-green-500 py-1 px-3 rounded-full">Activo</span>
                            @else
                                <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full">Inactivo</span>
                            @endif
                        </td>

                        <td class="py-3 px-2 text-center">
                            <div class="flex item-center justify-center">

                                {{-- Botón Ver --}}
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-125">
                                    <a href="{{ route('ciclos.show', $fecha->id) }}">
                                        <img src="{{ asset('img/svg/btn-ver.svg') }}" alt="">
                                    </a>
                                </div>

                                {{-- Botón Editar --}}
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-150">
                                    <a href="{{ route('ciclos.edit', $fecha->id) }}"> <img
                                            src="{{ asset('img/svg/btn-editar.svg') }}" alt=""></a>
                                </div>

                                {{-- Botón Eliminar --}}
                                <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-150">
                                    <a class="hover:text-red-500"
                                        href="javascript: document.getElementById('delete{{ $fecha->id }}').submit() ">
                                        <img src="{{ asset('img/svg/btn-eliminar.svg') }}" alt="">
                                    </a>
                                    <form id="delete{{ $fecha->id }}"
                                        action="{{ route('ciclos.destroy', $fecha->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                    </form>
                                </div>

                        </td>
                @endforeach
                </tr>
            </tbody>
        </table>
    </x-form-listado>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')

@stop
