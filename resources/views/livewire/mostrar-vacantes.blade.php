<div class="py-5 overflow-hidden bg-white shadow-sm sm:rounded-lg">
    @forelse ($vacantes as $vacante)
        <div class="md:flex md:justify-between md:items-center">
            <div class="p-6 space-y-2">
                <a href="{{ route('vacantes.show', $vacante) }}" class="text-xl font-bold text-gray-900">
                    {{ $vacante->titulo }}
                </a>
                <p class="text-sm font-bold text-gray-600">{{ $vacante->empresa }}</p>
                <p class="text-sm text-gray-500">Último día: {{ \Carbon\Carbon::parse($vacante->ultimo_dia)->translatedFormat('d F Y') }}</p>
            </div>
            <div class="flex flex-col gap-3 p-6 mt-5 md:flex-row items-strech md:mt-0">
                <a href="{{ route('candidatos.index', $vacante) }}" class="px-4 py-2 text-xs font-bold text-center text-white uppercase rounded-lg bg-slate-800">({{ $vacante->candidatos->count() }}) Candidatos</a>
                <a href="{{ route('vacantes.edit', $vacante->id) }}" class="px-4 py-2 text-xs font-bold text-center text-white uppercase bg-blue-600 rounded-lg">Editar</a>
                <button wire:click="$dispatch('mostrarAlerta', { vacante: {{ $vacante->id }} } )" class="px-4 py-2 text-xs font-bold text-center text-white uppercase bg-red-600 rounded-lg">Eliminar</button>
            </div>
        </div>
    @empty
        <p class="p-5 text-center text-gray-700 text-md">No hay vacantes para mostrar</p>
    @endforelse

    <div class="flex justify-center mt-10">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        document.addEventListener('livewire:init', () => {
            Livewire.on('mostrarAlerta', ({ vacante }) => {

                Swal.fire({
                    title: '¿Está seguro de eliminar vacante?',
                    text: "¡No podrás revertirlo!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('prueba',[vacante]);

                        // evento para eliminar la vacante desde el componente
                        @this.call('eliminarVacante', vacante)

                        Swal.fire(
                            '¡Se eliminó!',
                            'La vacante ha sido eliminada correctamente',
                            'success'
                        )
                    }
                });
            });
        });

    </script>
@endpush

