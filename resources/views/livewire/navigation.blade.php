<nav class="bg-gray-800" x-data="{ open: false }">

    <div class="container">
        <div class="relative flex items-center justify-between h-16">

            <!-- Boton del Menu movil-->
            <div class="absolute inset-y-0 right-0 flex items-center sm:hidden">
                <button x-on:click="open = true" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">

                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex-1 flex sm:items-start sm:justify-start">
                {{-- logotipo --}}
                <a href="/" class="flex-1 ml-4 flex items-baseline justify-items-start">
                    <img class="block lg:hidden h-16 w-auto" src="{{ asset('img/icon.svg') }}" alt="Logotipo">
                    <img class="hidden lg:block h-16 w-auto" src="{{ asset('img/icon.svg') }}" alt="Logotipo">
                </a>

                {{-- Menu lg --}}
                <div class="hidden lg:hidden sm:block">
                    @auth
                    <a href="{{ route('admin') }}"
                    class="bg-gradient-to-r from-indigo-300 to-red-400 text-gray-800 px-3 py-1 mr-4 rounded-md text-base font-bold">Dashboard</a>
                    @else
                    <div class="flex justify-center space-x-4">
                        <a href="{{ route('login') }}"
                        class="bg-gradient-to-r from-indigo-300 to-red-400 text-gray-800 px-3 py-1 rounded-md text-base font-bold">Iniciar
                        sesión</a>
                    </div>
                    @endauth
                </div>

            </div>

                {{-- Menu de usuario --}}
                <div class="absolute inset-y-0 right-0 items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <!-- Perfil del usuario -->
                    @auth
                    <a href="{{ route('admin') }}"
                    class="bg-gradient-to-r from-indigo-300 to-red-400 text-gray-800 px-3 py-1 mr-4 rounded-md text-base font-bold">Dashboard</a>
                    @else
                    <div class="flex justify-center space-x-4">
                        <a href="{{ route('login') }}"
                        class="bg-gradient-to-r from-indigo-300 to-red-400 text-gray-800 px-3 py-1 rounded-md text-base font-bold">Iniciar
                        sesión</a>
                    </div>
                    @endauth
                    <div class="hidden ml-3 relative" x-data="{ open: false}">
                        <div>
                            <button x-on:click="open = true" type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                {{-- <span class="sr-only">Open user menu</span> --}}
                                <img class="h-8 w-8 rounded-full" src="" alt="">
                            </button>
                        </div>

                        <div x-show="open" x-on:click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->

                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                id="user-menu-item-0">Perfil</a>

                            {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a> --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2" onclick="event.preventDefault(); this.closest('form').submit();">Cerrar sesión</a>
                            </form>
                        </div>

                    </div>
            </div>
        </div>

    </div>

    <!-- Menu movil  -->
    <div class="flex justify-end sm:hidden" id="mobile-menu" x-show="open" x-on:click.away="open = false" role="menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            @auth
            <a href="{{ route('admin') }}"
            class="bg-gradient-to-r from-indigo-300 to-red-400 text-gray-800 px-3 py-1 mr-4 rounded-md text-base font-bold">Dashboard</a>
            @else
            <a href="{{ route('login') }}"
            class="bg-gradient-to-r from-indigo-300 to-red-400 text-gray-800 px-3 py-1 mr-4 rounded-md text-base font-bold">Iniciar
            sesión</a>
            @endauth
        </div>
    </div>
</nav>
