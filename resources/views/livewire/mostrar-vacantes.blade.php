<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-5">
    @forelse ($vacantes as $vacante)
        <div class="md:flex md:justify-between md:items-center">
            <div class="p-6 space-y-2">
                <a href="" class="text-xl font-bold text-gray-900">
                    {{ $vacante->titulo }}
                </a>
                <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                <p class="text-sm text-gray-500">Último día: {{ \Carbon\Carbon::parse($vacante->ultimo_dia)->translatedFormat('d F Y') }}</p>
            </div>
            <div class="flex flex-col md:flex-row items-strech gap-3 p-6 mt-5 md:mt-0">
                <a href="" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Candidatos</a>
                <a href="" class="bg-blue-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Editar</a>
                <a href="" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Eliminar</a>
            </div>
        </div>
    @empty
        <p class="p-5 text-center text-md text-gray-700">No hay vacantes para mostrar</p>
    @endforelse

    <div class="flex justify-center mt-10">
        {{ $vacantes->links() }}
    </div>
</div>

