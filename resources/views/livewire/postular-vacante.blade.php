<div class="flex flex-col items-center justify-center p-5 mt-10 bg-gray-200">
    <h3 class="my-4 text-2xl font-bold text-center">Postular a esta vacante</h3>

    <form action="" class="mt-5 w-96">
        <div class="mb-4">
            <x-input-label for="cv" :value="'Curriculum u Hoja de vida (PDF)'" />
            <x-text-input 
                id="cv" 
                class="block w-full mt-1" 
                type="file" 
                accept=".pdf" {{-- para aceptar solo imágenes --}}
            />
        </div>
    </form>
</div>
