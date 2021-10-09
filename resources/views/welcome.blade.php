<x-app-layout>
    <!-- Componente de blade que contiene el titulo, imagen, y clases de estilo para esta pagina -->
    <x-registro-form>
        <form action="{{ route('preInscripciones.post') }}" method="POST">
            @csrf
            {{ csrf_field() }}
            <div>
                <div class="flex -mx-3">
                    <div class="w-1/2 px-3">
                        <!-- Componente de blade que contiene estilos para los label text -->
                        <x-label for="nombre">Nombre</x-label>
                        </label>
                        <div class="flex">
                            <!-- Class-icons definida en el archivo common.css con los estilos-->
                            <div class="class-icons">
                                <i class="fas fa-user text-gray-400 text-lg"></i>
                            </div>
                            <!-- Componente de blade que contiene estilos para los inputs de datos personales-->
                            <input class="inputs-datos" placeholder="John" name="nombre" type="text" value="{{ Request::old('nombre') }}" maxlength="20" pattern="[A-Za-z ]+"
                            title="Obligatorio. Máximo 20 carácteres. Solo Letras." required />
                        </div>
                    </div>
                    <div class="w-1/2 px-3 mb-5">
                        <x-label for="apellido">Apellido</x-label>
                        <div class="flex">
                            <div class="class-icons">
                                <i class="fas fa-user-plus text-gray-400 text-lg"></i>
                            </div>
                            <input class="inputs-datos" placeholder="Smith" type="text" name="apellido" maxlength="30" value="{{ Request::old('apellido') }}" required pattern="[A-Za-z ]+"
                            title="Obligatorio. Máximo 30 carácteres. Solo Letras." />
                        </div>
                    </div>
                </div>
                <div class="flex -mx-3">
                    <div class="w-3/6 px-3">
                        <x-label for="dni">DNI</x-label>
                        <div class="flex">
                            <div class="class-icons">
                                <i class="fas fa-keyboard text-gray-400 text-lg"></i>
                            </div>
                            <input class="inputs-datos" placeholder="00000000" type="text" name="dni" value="{{ Request::old('dni') }}" required maxlength="8" pattern="[0-9]+"
                            title="Obligatorio. 8 números requeridos"
                            />
                        </div>
                    </div>
                    <div class="w-3/6 px-3">
                        <x-label for="telefono">Teléfono</x-label>
                        <div class="flex">
                            <div class="class-icons">
                                <i class="fas fa-phone-square text-gray-400 text-lg"></i>
                            </div>
                            <input class="inputs-datos" placeholder="37640000" type="tel" pattern="[0-9]+" minlength="10" maxlength="12" name="telefono" value="{{ Request::old('telefono') }}" required title="Obligatorio. Sólo números."
                            />
                        </div>
                    </div>
                </div>
                <!-- Muestra una alerta de error despues de la validacion de los datos del formulario -->
                <div class="mb-5">
                    @error('dni')
                        <!-- Componente de blade que contiene estilos para los mensajes de errores -->
                        <x-input-error>
                            {{ $message }}
                        </x-input-error>
                    @enderror
                </div>

                <div class="flex -mx-3">
                    <div class="w-full px-3 mb-5">
                        <x-label for="email">Email</x-label>
                        <div class="flex">
                            <div class="class-icons">
                                <i class="fas fa-envelope-open-text text-gray-400 text-lg"></i>
                            </div>
                            <input class="inputs-datos" placeholder="johnsmith@example.com" type="email" name="email" value="{{ Request::old('email') }}" required
                            />
                        </div>
                        @error('email')
                            <x-input-error>
                                {{ $message }}
                            </x-input-error>
                        @enderror
                    </div>
                </div>

                <div class="flex -mx-3">
                    <div class="w-full px-3 mb-5">
                        <x-label for="instagram">Instagram</x-label>
                        <div class="flex">
                            <div class="class-icons">
                                <i class="fab fa-instagram text-gray-400 text-lg"></i>
                            </div>
                            <input class="inputs-datos" placeholder="@johnsmithexample" type="text" value="{{ Request::old('instagram') }}" name="instagram"/>
                        </div>
                    </div>
                </div>

                <div class="flex -mx-3">
                    <div class="w-full px-3 mb-8">
                        <x-label>
                            <i class="fas fa-user-clock text-gray-400 text-lg"></i>
                            Horarios
                        </x-label>
                        <div class="flex justify-center">
                            <div class="grid grid-cols-5 gap-2">
                                @foreach ($horarios as $horario)
                                    <div class="col-span-1">
                                        <label for="horarios[]"
                                            class="inline-flex items-center mt-3 text-sm font-semibold">
                                            <input type="checkbox" name="horarios[]" value="{{ $horario }}"
                                                {{ !empty(old('horarios')) && in_array($horario, old('horarios')) ? 'checked' : '' }}
                                                class="cursor-pointer form-checkbox h-5 w-5 text-teal-600"><span
                                                class="ml-1 mr-1 text-gray-700">{{ $horario }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @error('horarios')
                            <x-input-error>
                                {{ $message }}
                            </x-input-error>
                        @enderror
                    </div>
                </div>

                <div class="flex -mx-3">
                    <div class="w-full px-3 mb-5">
                            <button
                                class="block w-full max-w-xs mx-auto bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 border-b-4 border-teal-700 hover:border-teal-700">
                                SOLICITAR TURNO
                            </button>
                    </div>
                </div>

                <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                    <p class="font-bold">Nota:</p>
                    <p class="text-sm"> * Esta solicitud esta sujeta a aprobación. Ni bien se libere
                        un cupo en el
                        horario
                        solicitado nos comunicaremos con usted.</p>
                </div>
            </div>
        </form>
    </x-registro-form>
</x-app-layout>
