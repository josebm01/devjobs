<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    public $cv;
    public $vacante;

    use WithFileUploads;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount( Vacante $vacante )
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $this->validate();

        // Guardar cv en el servidor
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        // crear candidato a la vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv']
        ]);
        
        // crear notificación y enviar el email
        $this->vacante->reclutador->notify( 
            new NuevoCandidato(
                $this->vacante->id, 
                $this->vacante->titulo, 
                auth()->user()->id 
            ) 
        );

        // Mostrar el usuario un mensaje de ok
        session()->flash('mensaje', 'Se envió correctamente tu información, suerte :)');

        return redirect()->back();

    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
