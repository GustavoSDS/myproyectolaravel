<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    @auth
        <div class="min-h-screen bg-gray-100">
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    @else
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    @endauth

    @stack('modals')
    @livewireScripts
    <script>
        Swal.fire({
            title: '<strong>PÁGINA EN <u>DESARROLLO!</u></strong>',
            {{-- icon: 'info', --}}
            html: 'Puedes dejar tus <b>opiniones</b> y <b>comentarios</b> en el menú de ' +
                '<a class="text-blue-500" href="{{ route('suggestions') }}">Sugerencias!</a> ',
            focusConfirm: false,
            confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!',
        });
    </script>


</body>

</html>
