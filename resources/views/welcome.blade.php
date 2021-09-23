<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css">

<x-app-layout>
    <div class="min-w-screen min-h-screen bg-gray-900 flex items-center justify-center">
        <div class="bg-gray-100 text-gray-500 shadow-xl w-full overflow-hidden" style="max-width:1000px">
            <div class="md:flex w-full text-justify font-medium">
                @if (Session::has('mensaje'))
                    <div class="text-center py-4 lg:px-4">
                        <div class="p-2 bg-green-800 items-center text-green-100 leading-none lg:rounded-full flex lg:inline-flex"
                            role="alert">
                            <span
                                class="flex rounded-full bg-green-500 uppercase px-2 py-1 text-xs font-bold mr-3">{{session('mensaje')}}</span>
                            <span class="font-semibold mr-2 text-left flex-auto">Gracias por querer formar parte de
                                WoFit.
                                <br>
                                Ni bien tengamos un turno en la franja horaria solicitada nos comunicaremos con usted.
                                <br>
                                El precio de la cuota para el mes de SEPTIEMBRE 2021 es de $2600 pesos..</< /span>
                        </div>
                    </div>
                @endif
            </div>
            <div class="md:flex w-full">
                <div class="hidden md:block w-1/3 bg-indigo-500 py-10 px-10">
                    <img class="w-full" src="{{ asset('img/imagen.svg') }}" alt="">
                </div>
                <div class="w-full md:w-2/3 py-10 px-5 md:px-10">
                    <div class="text-center mb-5">
                        <h1 class="font-bold text-3xl text-gray-900"> Solicitud de turnos <b>WoFit</b> 2021
                            - No cambios de turno -</h1>
                        <p>Ingresa tu información par solicitar turnos</p>
                    </div>
                    <span class="flex -mx-3 mb-2">Obligatorio <b class="text-red-500">* </b></span>
                    <form action="{{ route('form-post.store') }}" method="POST">
                        @csrf
                        <div>
                            <div class="flex -mx-3">
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Nombre <span class="text-red-600">*</span> </label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-account-outline text-gray-400 text-lg"></i>
                                        </div>
                                        <input type="text" name="nombre" value="{{ Request::old('nombre') }}" required
                                            maxlength="20" pattern="[A-Za-z ]+"
                                            title="Obligatorio. Máximo 20 carácteres. Solo Letras."
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                            placeholder="John">
                                    </div>
                                </div>
                                <div class="w-1/2 px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Apellido <span class="text-red-600">*</span></label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-account-outline text-gray-400 text-lg"></i>
                                        </div>
                                        <input type="text" name="apellido" maxlength="30"
                                            value="{{ Request::old('apellido') }}" required pattern="[A-Za-z ]+"
                                            title="Obligatorio. Máximo 30 carácteres. Solo Letras."
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                            placeholder="Smith">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-3/6 px-3 mb-6">
                                    <label for="" class="text-xs font-semibold px-1">DNI <span class="text-red-600">*</span></label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-lock-outline text-gray-400 text-lg"></i>
                                        </div>
                                        <input type="number" name="dni" value="{{ Request::old('dni') }}" required
                                            onshow="false" minlength="8" maxlength="8"
                                            title="Obligatorio. 8 números requeridos"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                            placeholder="************">
                                    </div>
                                </div>
                                <div class="w-3/6 px-3 mb-6">
                                    <label for="" class="text-xs font-semibold px-1">Teléfono <span class="text-red-600">*</span></label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-phone text-gray-400 text-lg"></i>
                                        </div>
                                        <input type="tel" name="telefono" value="{{ Request::old('telefono') }}"
                                            required title="Obligatorio. Sólo números."
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                            placeholder="54 3764 0000">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Email <span class="text-red-600">*</span></label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-email-outline text-gray-400 text-lg"></i>
                                        </div>
                                        <input type="email" name="email" value="{{ Request::old('email') }}" required
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                            placeholder="johnsmith@example.com">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Instagram</label>
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="mdi mdi-instagram text-gray-400 text-lg"></i>
                                        </div>
                                        <input type="text" value="{{ Request::old('instagram') }}" name="instagram"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                            placeholder="@johnsmithexample">
                                    </div>
                                </div>
                            </div>

                            @error('horarios')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                    role="alert">
                                    <strong class="font-bold">Obligatorio!</strong>
                                    <span class="block sm:inline">
                                        <small>*{{ $message }}</small>
                                    </span>
                                </div>
                            @enderror
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-8">
                                    <label for="" class="text-sm font-semibold px-1">Horarios <span class="text-red-600">*</span></label>
                                    <div class="flex justify-center">
                                        <div class="grid grid-cols-5 gap-2">
                                            @foreach ($horarios as $horario)
                                                <div class="col-span-1">
                                                    <label for="horarios[]"
                                                        class="inline-flex items-center mt-3 text-sm font-semibold">
                                                        <input type="checkbox" name="horarios[]"
                                                            value="{{ $horario }}"
                                                            class="form-checkbox h-5 w-5 text-teal-600"><span
                                                            class="ml-1 mr-1 text-gray-700">{{ $horario }}</span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <button
                                        class="block w-full max-w-xs mx-auto bg-teal-600 hover:bg-teal-800 focus:bg-teal-700 text-white rounded-lg px-3 py-3 font-semibold">
                                        SOLICITAR TURNO</button>
                                </div>
                            </div>

                            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3"
                                role="alert">
                                <p class="font-bold">Nota</p>
                                <p class="text-sm"> * Esta solicitud esta sujeta a aprobación. Ni bien se libere
                                    un cupo en el
                                    horario
                                    solicitado nos comunicaremos con usted.</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
