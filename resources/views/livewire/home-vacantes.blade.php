<div>
    
    @livewire('filtrar-vacantes')

    <div class="py-12">
        <div class="mx-auto max-w-7xl">
            <h3 class="mb-12 text-4xl font-extrabold text-gray-800">Nuestras Vacantes disponibles</h3>
        
            <div class="p-6 bg-white divide-y divide-gray-300 rounded-lg shadow-sm">
                @forelse ($vacantes as $vacante)
                    <div class="py-5 md:flex md:justify-between md:items-center">
                        <div class="md:flex-1">
                            <a class="text-3xl font-extrabold text-gray-600" href=" href="{{ route('vacantes.show', $vacante->id) }}">
                                {{ $vacante->titulo }}
                            </a>
                            <p class="mb-1 text-base text-gray-600">{{ $vacante->empresa }}</p>
                            <p class="text-xs font-bold text-gray-600">Último día para postularse: 
                               <span class="font-normal">
                                    {{ \Carbon\Carbon::parse($vacante->ultimo_dia)->translatedFormat('d F Y') }}
                                </span> 
                            </p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a 
                                class="p-3 text-sm font-bold text-white uppercase bg-indigo-600 rounded-lg"
                                href="{{ route('vacantes.show', $vacante->id) }}"
                            >Ver vacantes</a>
                        </div>
                    </div>
                @empty  
                    <p class="p-3 text-sm text-center text-gray-600">No hay vacantes</p>
                @endforelse
            </div>
        
        </div>
    </div>
</div>
