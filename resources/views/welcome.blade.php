<x-app-layout>
    <!-- Componente de blade que contiene el titulo, imagen, y clases de estilo para esta pagina -->
    <x-registro-form>
        <form action="{{ route('form.store') }}" method="POST">
            @csrf
            <div>
                <div class="flex -mx-3">
                    <div class="w-1/2 px-3">
                        <!-- Componente de blade que contiene estilos para los label text -->
                        <x-label>Nombre</x-label>
                        </label>
                        <div class="flex">
                            <!-- Class-icons definida en el archivo common.css con los estilos-->
                            <div class="class-icons">
                                <i class="fas fa-user text-gray-400 text-lg"></i>
                            </div>
                            <!-- Componente de blade que contiene estilos para los inputs de datos personales-->
                            <x-input-nombre />
                        </div>
                    </div>
                    <div class="w-1/2 px-3 mb-5">
                        <x-label>Apellido</x-label>
                        <div class="flex">
                            <div class="class-icons">
                                <i class="fas fa-user-plus text-gray-400 text-lg"></i>
                            </div>
                            <x-input-apellido />
                        </div>
                    </div>
                </div>
                <div class="flex -mx-3">
                    <div class="w-3/6 px-3">
                        <x-label>DNI</x-label>
                        <div class="flex">
                            <div class="class-icons">
                                <i class="fas fa-keyboard text-gray-400 text-lg"></i>
                            </div>
                            <x-input-dni />
                        </div>
                    </div>
                    <div class="w-3/6 px-3">
                        <x-label>Teléfono</x-label>
                        <div class="flex">
                            <div class="class-icons">
                                <i class="fas fa-phone-square text-gray-400 text-lg"></i>
                            </div>
                            <x-input-telefono />
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
                        <x-label>Email</x-label>
                        <div class="flex">
                            <div class="class-icons">
                                <i class="fas fa-envelope-open-text text-gray-400 text-lg"></i>
                            </div>
                            <x-input-email />
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
                        <label for="" class="text-xs font-semibold px-1">Instagram</label>
                        <div class="flex">
                            <div class="class-icons">
                                <i class="fab fa-instagram text-gray-400 text-lg"></i>
                            </div>
                            <x-input-instagram />
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
                                class="block w-full max-w-xs mx-auto bg-teal-500 hover:bg-teal-400 text-white font-bold py-2 px-4 border-b-4 border-teal-700 hover:border-teal-500">
                                SOLICITAR TURNO
                            </button>
                    </div>
                </div>

                <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                    <p class="font-bold">Nota</p>
                    <p class="text-sm"> * Esta solicitud esta sujeta a aprobación. Ni bien se libere
                        un cupo en el
                        horario
                        solicitado nos comunicaremos con usted.</p>
                </div>
            </div>
        </form>
    </x-registro-form>
</x-app-layout>
