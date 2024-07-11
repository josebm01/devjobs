<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{

    // especificamos el nombre de la función para que se pueda ejecutar el evento desde el archivo blade
    protected $listeners = ['eliminarVacante'];

    public function eliminarVacante( Vacante $vacante )
    {
        // eliminando vacante
        $vacante->delete();
    }

    public function render()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id )->paginate(10);
        
        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
