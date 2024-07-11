<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Editar vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="my-10 text-2xl font-bold text-center">Editando vacante: <p class="text-gray-600">{{ $vacante->titulo }}</p> </h1>
                    <div class="p-5 md:flex md:justify-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
