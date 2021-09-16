<x-app-layout>
    <div class="w-full min-h-screen p-4">
        <h2 class="text-gray-800 text-center text-3xl font-semibold">
            Solicitud de turnos <b>WoFit</b> 2021
            - No cambios de turno -
        </h2>
        <div class="text-justify font-medium mt-10 px-10">
            <p>
                Gracias por querer formar parte de WoFit. <br>
                Ni bien tengamos un turno en la franja horaria solicitada nos comunicaremos con usted. <br>
                El precio de la cuota para el mes de SEPTIEMBRE 2021 es de $2600 pesos.
            </p>
        </div>
        <div class="mt-4 mx-auto">
            <x-registro>
                <h3 class="font-bold text-lg text-center text-white p-5 bg-gray-600">Formulario de Pre-Inscripción
                </h3>
                <form action="{{ route('form-post') }}" method="POST">
                    @csrf
                    <div class="px-4 py-4">
                        <span class="flex float-right"><b class="text-red-500">* </b> Obligatorio</span>
                        <div class="mt-4 mb-4 flex-none float-none">
                            <label class="font-bold" for="apellido">Apellido <span><b class="text-red-500">*</b></span></label>
                            <input class="border-0 rounded-3xl w-full py-2 px-3" type="text" name="apellido" maxlength="50" value="{{ Request::old('apellido') }}"
                                required pattern="[A-Za-z ]+" placeholder="Perez"
                                title="Apellido Obligatorio. Máximo 50 carácteres. Solo Letras.">
                        </div>

                        <div class="mb-4">
                            <label class="font-bold" for="nombre">Nombre <span><b class="text-red-500">*</b></span></label>
                            <input class="border-0 rounded-3xl w-full py-2 px-3 text-grey-darker" type="text" name="nombre" value="{{ Request::old('nombre') }}"
                                required maxlength="50" pattern="[A-Za-z ]+" placeholder="Juan"
                                title="Nombre Obligatorio. Máximo 50 carácteres. Solo Letras.">
                        </div>

                        <div class="mb-4">
                            <label class="font-bold" for="dni">DNI <span><b class="text-red-500">*</b></span></label>
                            <input class=" border-0 rounded-3xl w-full py-2 px-3 text-grey-darker" type="number" name="dni" value="{{ Request::old('dni') }}"
                                required minlength="8" maxlength="8" placeholder="12345678">
                        </div>

                        <div class="mb-4">
                            <label class="font-bold" for="email">Email <span><b class="text-red-500">*</b></span></label>
                            <input class=" border-0 rounded-3xl w-full py-2 px-3 text-grey-darker" type="email" name="email" value="{{ Request::old('email') }}" placeholder="examplo@examplo.com"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="font-bold" for="telefono">Teléfono <span><b class="text-red-500">*</b></span></label>
                            <input class=" border-0 rounded-3xl w-full py-2 px-3 text-grey-darker" type="tel" name="telefono" pattern="[+0-9]{12}"
                                value="{{ Request::old('telefono') }}" placeholder="5437640000" required>
                        </div>

                        <div class="mb-4">
                            <label class="font-bold" for="instagram">Instagram</label>
                            <input class=" border-0 rounded-3xl w-full py-2 px-3 text-grey-darker" type="text" value="{{ Request::old('instagram') }}"
                                name="instagram" placeholder="@examplo">
                        </div>

                        <hr class="border m-1">

                        <div class="text-center mb-4"><label class="text-black font-bold underline"
                                for="">HORARIOS</label></div>
                                @error('skills')
                                    <small>*{{ $message }}</small>
                                @enderror
                        <div
                            class="mb-4 rounded shadow bg-gradient-to-tr from-gray-200 to-gray-500 grid grid-cols-5 gap-1">
                            <div class="cols-span-1 mt-1 text-center hover:scale-110">
                                <input class="cursor-pointer" name="skills[]" value="check1" type="checkbox"><br>
                                <label for="skills[]">8 a 9</label>
                            </div>
                            <div class="cols-span-1 mt-1 text-center hover:scale-110">
                                <input class="cursor-pointer" name="skills[]" value="check2" type="checkbox"><br>
                                <label for="skills[]">9 a 10</label>
                            </div>
                            <div class="cols-span-1 mt-1 text-center hover:scale-110">
                                <input class="cursor-pointer" name="skills[]" value="check3" type="checkbox"><br>
                                <label for="skills[]">14 a 15</label>
                            </div>
                            <div class="cols-span-1 mt-1 text-center hover:scale-110">
                                <input class="cursor-pointer" name="skills[]" value="check4" type="checkbox"><br>
                                <label for="skills[]">15 a 16</label>
                            </div>
                            <div class="cols-span-1 mt-1 text-center hover:scale-110">
                                <input class="cursor-pointer" name="skills[]" value="check5" type="checkbox"><br>
                                <label for="skills[]">16 a 17</label>
                            </div>
                            <div class="cols-span-1 mt-1 text-center hover:scale-110">
                                <input class="cursor-pointer" name="skills[]" value="check6" type="checkbox"><br>
                                <label for="skills[]">17 a 18</label>
                            </div>
                            <div class="cols-span-1 mt-1 text-center hover:scale-110">
                                <input class="cursor-pointer" name="skills[]" value="check7" type="checkbox"><br>
                                <label for="skills[]">18 a 19</label>
                            </div>
                            <div class="cols-span-1 mt-1 text-center hover:scale-110">
                                <input class="cursor-pointer" name="skills[]" value="check8" type="checkbox"><br>
                                <label for="skills[]">19 a 20</label>
                            </div>
                            <div class="cols-span-1 mt-1 text-center hover:scale-110">
                                <input class="cursor-pointer" name="skills[]" value="check9" type="checkbox"><br>
                                <label for="skills[]">20 a 21</label>
                            </div>
                            <div class="cols-span-1 mt-1 text-center hover:scale-110 ">
                                <input class="cursor-pointer" name="skills[]" value="check10" type="checkbox"><br>
                                <label for="skills[]">21 a 22</label>
                            </div>
                        </div>

                        <div class="mb-4 mt-2">
                            <cite>
                                <p class="bg-gradient-to-tl from-red-100 to-red-50 border-opacity-100 rounded">
                                    * Esta solicitud esta sujeta a aprobación. Ni bien se libere un cupo en el horario
                                    solicitado nos comunicaremos con usted.
                                </p>
                            </cite>
                        </div>

                        <div class="mx-auto mt-2 text-center">
                            <button class="m-2 px-16 py-1 rounded-full bg-gradient-to-r from-green-400 to-blue-500 hover:scale-125"
                                type="submit"> Solicitar </button>
                        </div>
                    </div>
                </form>
            </x-registro>
        </div>
    </div>
</x-app-layout>
