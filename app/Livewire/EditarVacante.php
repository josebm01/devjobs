<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class EditarVacante extends Component
{

    public $vacanteId;

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagenNueva;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'empresa' => 'required',
        'categoria' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagenNueva' => 'nullable|image|max:1024' // nullable - puede ir vacío pero si tiene algo debe cumplir las reglas
    ];


    // hook de ciclo de vida
    public function mount( Vacante $vacante )
    {
        $this->vacanteId = $vacante->id;
        $this->titulo = $vacante->titulo; 
        $this->salario = $vacante->salario_id; 
        $this->categoria = $vacante->categoria_id; 
        $this->empresa = $vacante->empresa; 
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d'); 
        $this->descripcion = $vacante->descripcion; 
        $this->imagen = $vacante->imagen; 
    }

    public function editarVacante()
    {
        $datos = $this->validate();    

        // Verificar si hay una nueva imagen 
        if ( $this->imagenNueva ){
            $imagen = $this->imagenNueva->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes', '', $imagen);
        }
        
        // Encontrar la vaante a editar
        $vacante = Vacante::find( $this->vacanteId );

        // Asignar los valores
        $vacante->titulo = $datos['titulo']; 
        $vacante->salario_id = $datos['salario']; 
        $vacante->categoria_id = $datos['categoria']; 
        $vacante->empresa = $datos['empresa']; 
        $vacante->ultimo_dia = $datos['ultimo_dia']; 
        $vacante->descripcion = $datos['descripcion']; 
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen; 
    
        // Guardar vacante
        $vacante->save();

        // redireccionar
        session()->flash('mensaje', 'La vacante se actualizó correctamente');
    
        return redirect()->route('vacantes.index');
    
    }

    public function render()
    {
        // consultar db
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.editar-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
