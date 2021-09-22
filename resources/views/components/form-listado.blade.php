<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="min-h-screen justify-center bg-gray-700 font-sans lg:overflow-hidden">
    <div class="w-11/12 mx-auto mt-10">
        <div class="bg-gray-200 rounded">
            {{ $slot }}
        </div>
    </div>
</div>
