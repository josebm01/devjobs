<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //? Restringiendo que el usuario que cumpla la validación de viewAny 
        if (Gate::allows('viewAny', Vacante::class)){
            return view('vacantes.index');
        } else {
            abort('403', 'Acción no autorizada');
        }
        // return view('vacantes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //? Restringiendo que el usuario que cumpla la validación de viewAny 
        if (Gate::allows('create', Vacante::class)){
            return view('vacantes.create');
        } else {
            abort('403', 'Acción no autorizada');
        }

        // return view('vacantes.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacante $vacante)
    {
        return view('vacantes.show', [
            'vacante' => $vacante
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacante $vacante)
    {
        
        if (Gate::allows('update', $vacante)){

            return view('vacantes.edit', [
                'vacante' => $vacante
            ]);
        
        } else {
            return redirect()->route('vacantes.index');
        }

        // return view('vacantes.edit', [
        //     'vacante' => $vacante
        // ]);
    }

}
