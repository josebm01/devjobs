<div class="flex flex-col items-center justify-center p-5 mt-10 bg-gray-200">
    <h3 class="my-4 text-2xl font-bold text-center">Postular a esta vacante</h3>

    @if ( session()->has('mensaje') )
        <p class="p-2 text-sm font-bold text-green-600 uppercase bg-green-100 border border-green-600 rounded-lg">
            {{ session('mensaje') }}
        </p>
    @else 
        <form wire:submit.prevent='postularme' class="mt-5 w-96">
            <div class="mb-4">
                <x-input-label for="cv" :value="'Curriculum u Hoja de vida (PDF)'" />
                <x-text-input 
                    id="cv" 
                    wire:model="cv"
                    class="block w-full mt-1" 
                    type="file" 
                    accept=".pdf" {{-- para aceptar solo imágenes --}}
                />
                <x-input-error :messages="$errors->get('cv')" class="mt-2" />
            </div>

            <x-primary-button class="my-5">
                {{ __('Postularme') }}
            </x-primary-button>
        </form>
    @endif
    

</div>
