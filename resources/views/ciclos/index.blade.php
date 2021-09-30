@extends('adminlte::page')

@section('title', 'Listado')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('content')
    @if (Session::has('mensaje'))
        <div class="alert alert-success" role="alert">
            <span id="aleta-listado"></span>
        </div>
    @endif
    <div class="mt-20 mb-10 p-2 mx-auto bg-blue-400">
        <div class="w-11/12 mx-auto text-right bg-blue-200">
            <h1 class="text-gray-800 font-bold underline py-3 text-center uppercase">Listado de todos los ciclos</h1>
        </div>
        <table id="fechas" class="w-full min-w-full table table-dark bg-white font-sm">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Dia</th>
                    <th>Mes</th>
                    <th>Año</th>
                    <th>Activo</th>
                </tr>
            </thead>
        </table>
    </div>
@stop

@section('js')
    <script>
        $('#fechas').DataTable({
            responsive: true,
            autoWidth: false,
            "ajax": "{{ route('datatable.fechas') }}",
            "columns": [
                {data: 'id'},
                {data: 'nombre'},
                {data: 'dia'},
                {data: 'mes'},
                {data: 'ano'},
                {data: 'activo'},
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
        let timerInterval
        Swal.fire({
        title: 'Listado ciclos!',
        html: 'Listado completo en <b></b> milliseconds...',
        timer: 2500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
        }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
        }
        });
    </script>

@stop
