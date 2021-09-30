@extends('adminlte::page')

@section('title', 'Listado')

@section('plugins.Datatables', true)

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('content')
    <div class="mt-20 mb-10 p-2 mx-auto bg-red-400">
        <div class="w-full mx-auto text-righ">
            <h1 class="text-gray-700 uppercase font-bold py-3 text-center">inscriptos en el mes de {{$fecha->nombre}}</h1>
        </div>
        <table id="inscriptos" class="w-full min-w-full table table-dark bg-white font-sm">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Inscripto</th>
                    <th>DNI</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Instagram</th>
                </tr>
            </thead>
        </table>
    </div>
@stop


@section('js')
    <script>
        $('#inscriptos').DataTable({
            responsive: true,
            autoWidth: false,
            "ajax": "{{ route('datatable.inscriptos', $id) }}",
            "columns": [
                {data: 'id'},
                {data: 'inscripto'},
                {data: 'dni'},
                {data: 'email'},
                {data: 'telefono'},
                {data: 'instagram'},
            ],
            "language": {
                "lengthMenu": "Mostrar " +
                    `<select class="custom-select custom-select-sm form-control form-control-sm">
                    <option value='10'>10</option>
                    <option value='25'>25</option>
                    <option value='50'>50</option>
                    <option value="100">100</option>
                    <option value="-1">Todos</option>
                </select>` +
                    " registros por página",
                "zeroRecords": "Nada encontrado - lo siento",
                "info": "Mostrando la _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                'search': 'Buscar',
                'paginate': {
                    'next': 'Siguiente',
                    'previous': 'Anterior',
                }
            },
        });
    </script>
@stop
