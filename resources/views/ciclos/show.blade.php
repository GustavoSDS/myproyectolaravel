@extends('adminlte::page')

@section('title', 'Listado')

@section('content')

    <x-form-listado>
        <div class="w-full mx-auto text-right bg-blue-300">
            <h1 class="text-gray-800 font-bold underline py-3 text-center uppercase">Listado</h1>
        </div>
        <table class="w-full max-w-7xl  mx-auto text-center">
            <thead class="bg-red-200 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-2 text-left">Nombre</th>
                    <th class="py-3 px-2 text-left">Apellido</th>
                    <th class="py-3 px-2 text-left">Email</th>
                    <th class="py-3 px-2 text-left">Dni</th>
                    <th class="py-3 px-2 text-center">Telefono</th>
                    <th class="py-3 px-2 text-left">Instagram</th>
                    <th class="py-3 px-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-bold">

                @foreach ($inscriptos as $inscripto)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">

                        {{-- Inscripto Nombre --}}
                        <td class="py-3 px-2 text-left">
                            <div class="flex items-center">
                                <span>{{ $inscripto->nombre }}</span>
                            </div>
                        </td>

                        {{-- Inscripto Apellido --}}
                        <td class="py-3 px-2 text-left">
                            <div class="flex items-left justify-left">
                                <span>{{ $inscripto->apellido }}</span>
                            </div>
                        </td>

                        {{-- Inscripto Email --}}
                        <td class="py-3 px-2 text-left">
                            <div class="flex items-left justify-left">
                                <span>{{ $inscripto->email }}</span>
                            </div>
                        </td>

                        {{-- Inscript DNI --}}
                        <td class="py-3 px-2 text-left">
                            <div class="flex items-left justify-left">
                                <span>{{ $inscripto->dni }}</span>
                            </div>
                        </td>

                        {{-- Inscripto telefono --}}
                        <td class="py-3 px-2 text-left">
                            <div class="flex items-left justify-left">
                                <span>{{ $inscripto->dni }}</span>
                            </div>
                        </td>

                        {{-- Inscripto instagram --}}
                        <td class="py-3 px-2 text-left">
                            <div class="flex items-left justify-left">
                                <span>{{ $inscripto->instagram }}</span>
                            </div>
                        </td>

                        {{-- ESTADO Ciclo --}}
                        <td class="py-3 px-2 text-center">
                            @if ($inscripto->activo == 1)
                                <span class="bg-green-200 py-1 px-3 rounded-full">Activo</span>
                            @else
                                <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full">Inactivo</span>
                            @endif
                        </td>

                        {{-- <td class="py-3 px-2 text-center">
                            <div class="flex item-center justify-center">

                                Botón Ver
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-125">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                </div>

                                Botón Editar
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-150">
                                    <a href="{{route('ciclos.edit', $inscripto->id)}}"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg></a>
                                </div>

                                Botón Eliminar
                                <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-150">
                                    <a class="hover:text-red-500" href="javascript: document.getElementById('delete{{ $inscripto->id }}').submit() "><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg></a>
                                    <form id="delete{{ $inscripto->id }}"
                                        action="{{ route('ciclos.destroy', $inscripto->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                    </form>
                                </div>

                        </td> --}}
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
