<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(!Auth::guest())
                <div class="p-6 bg-white border-b border-gray-200">
                    Has iniciado sesion correctamente!
                    @if(Auth::user()->status==0)
                        <br>Para acceder a las funciones de la pagina primero un administrador debe de activar tu cuenta
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>