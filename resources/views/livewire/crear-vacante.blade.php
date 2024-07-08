<form class="md:w-1/2 space-y-5" wire:submit.prevent="crearVacante">

    <div>
        <x-input-label for="titulo" :value="__('Título vacante')" />
        <x-text-input 
            id="titulo" 
            wire:model="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            :value="old('titulo')" 
        />
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario mensual')" />
        <select wire:model="salario" id="salario" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:rinf-indigo-200 focus:ring-opacity-50">
        <option value="">-- Seleccione --</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('salario')" class="mt-2" />
    </div>
    
    <div>
        <x-input-label for="categoria" :value="__('Categoría')" />
        <select wire:model="categoria" id="categoria" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:rinf-indigo-200 focus:ring-opacity-50">
            <option value="">-- Seleccione --</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input 
            id="empresa" 
            wire:model="empresa" 
            class="block mt-1 w-full" 
            type="text" 
            :value="old('empresa')"
            placeholder="Ej. Netflix, Uber, Shopify" 
        />
        <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
    </div>
    
    <div>
        <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />
        <x-text-input 
            id="ultimo_dia" 
            wire:model="ultimo_dia" 
            class="block mt-1 w-full" 
            type="date" 
            :value="old('ultimo_dia')"
        />
        <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripción del puesto')" />
        <textarea 
            id="descripcion" 
            rows="5"
            wire:model="descripcion" 
            placeholder="Descripción general del puesto"
            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:rinf-indigo-200 focus:ring-opacity-50"
        ></textarea>
        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input 
            id="imagen" 
            wire:model="imagen"
            class="block mt-1 w-full" 
            type="file" 
            accept="image/*" {{-- para aceptar solo imágenes --}}
        />

        <div class="my-5 w-auto">
            @if ( $imagen )
                Imagen:
                <img src="{{ $imagen->temporaryUrl() }}" />
            @endif
        </div>

        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>

    <x-primary-button class="w-full justify-center">
        {{ __('Crear vacante') }}
    </x-primary-button>

</form>