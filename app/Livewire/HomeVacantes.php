<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithPagination;

class HomeVacantes extends Component
{

    use WithPagination;

    public $termino;
    public $categoria;
    public $salario;

    protected $listeners = [ 'terminosBusqueda' => 'buscar' ];
    protected $queryString = ['termino', 'categoria', 'salario'];


    public function buscar( $termino, $categoria, $salario )
    {
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
    }

    public function render()
    {
        // $vacantes = Vacante::all();
        
        //? when - se ejecuta cuando hay valores
        $vacantes = Vacante::when($this->termino, function ($query) {
            $query->where(function ($subquery) {
                $subquery->where('titulo', 'LIKE', "%" . $this->termino . "%")
                    ->orWhere('empresa', 'LIKE', "%" . $this->termino . "%");
            });
        })
            ->when($this->categoria, function ($query) {
                $query->where(function ($subquery) {
                    if ($this->categoria !== 'all') {
                        $subquery->where('categoria_id', $this->categoria);
                    }
                });
            })
            ->when($this->salario, function ($query) {
                $query->where(function ($subquery) {
                    if ($this->salario !== 'all') {
                        $subquery->where('salario_id', $this->salario);
                    }
                });
            })
            ->paginate(3);

 
        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes,
        ]);
    }


}
