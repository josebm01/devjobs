<div class="p-10">
    <div class="mb-5">
        <h3 class="text-3xl font-bold text-gray-800 MY-3"> {{ $vacante->titulo }} </h3>
    </div>

    <div class="p-5 bg-gray-100 rounded-md md:grid md:grid-cols-2">
        <p class="my-3 text-sm font-bold text-gray-900 uppercase"> Empresa:
            <span class="font-normal normal-case">{{ $vacante->empresa }}</span>
        </p>
        
        <p class="my-3 text-sm font-bold text-gray-900 uppercase"> Último día para postularse:
            <span class="font-normal normal-case">{{ \Carbon\Carbon::parse($vacante->ultimo_dia)->translatedFormat('d F Y') }}</span>
        </p>

        <p class="my-3 text-sm font-bold text-gray-900 uppercase"> Categoría:
            <span class="font-normal normal-case">{{ $vacante->categoria->categoria }}</span>
        </p>
        
        <p class="my-3 text-sm font-bold text-gray-900 uppercase"> Categoría:
            <span class="font-normal normal-case">{{ $vacante->salario->salario }}</span>
        </p>
    </div>

    <div class="gap-4 md:grid md:grid-cols-6">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacantes/'.$vacante->imagen) }}" alt="{{ 'Imagen vacante' . $vacante->imagen }}">
        </div>
        <div class="md:col-span-4">
            <h2 class="mb-5 text-2xl font-bold">Descripción del puesto</h2>
            <p>{{ $vacante->descripcion }}</p>
        </div>
    </div>

    {{-- Usuario no autenticado --}}
    @guest
        <div class="p-5 mt-5 text-center border border-dashed bg-gray-50">
            <p>
                ¿Deseas aplicar a esta vacante? <a href="{{ route('register') }}" class="font-bold text-indigo-600">Obten una cuenta y aplica a esta y otras vacantes</a>
            </p>
        </div>
    @endguest

    {{-- Solo para los desarrolladores --}}
    @cannot('create', App\Models\Vacante::class)
        @livewire('postular-vacante', [ 'vacante' => $vacante ])
    @endcan
    
</div>


