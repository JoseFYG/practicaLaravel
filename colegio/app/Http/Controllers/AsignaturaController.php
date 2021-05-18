<?php

namespace App\Http\Controllers;

use App\Models\{Asignatura, Profesor};
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaturas=Asignatura::orderBy('nombre')->orderBy('creditos')->paginate(3);
        return view('asignaturas.index', compact('asignaturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $misProfesores=Profesor::getArrayIdNombre();
        //dd($misTiendas);
        return view('asignaturas.create', compact('misProfesores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>['required', 'string', 'min:3', 'max:30', 'unique:asignaturas,nombre'],
            'descripcion'=>['required', 'string', 'min:10', 'max:120'],
            'creditos'=>['required', 'string', 'min:1', 'max:2'],
            'profesor_id'=>['required'] 
        ]);
        try{
            Asignatura::create($request->all());
        }catch(\Exception $ex){
            return redirect()->route('asignaturas.index')->with('mensaje', 'Error: '.$ex->getMessage().' BD');
        }
        return redirect()->route('asignaturas.index')->with('mensaje', 'Asignatura Creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
        return view('asignaturas.show', compact('asignatura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
        $misProfesores=Profesor::getArrayIdNombre();
        return view('asignaturas.edit', compact('asignatura', 'misProfesores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignatura $asignatura)
    {
        $request->validate([
            'nombre'=>['required', 'string', 'min:3', 'max:30', 'unique:asignaturas,nombre,'.$asignatura->id],
            'descripcion'=>['required', 'string', 'min:10', 'max:120'],
            'creditos'=>['required', 'string', 'min:1', 'max:2'],
            'profesor_id'=>['required'] 
        ]);
        try{
            $asignatura->update($request->all());
        }catch(\Exception $ex){
            return redirect()->route('asignaturas.index')->with('mensaje', 'Error: '.$ex->getMessage().' BD');
        }
        return redirect()->route('asignaturas.index')->with('mensaje', 'Asignatura Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura)
    {
        try{
            $asignatura->delete();
        }catch(\Exception $ex){
            return redirect()->route('asignaturas.index')->with('mensaje', 'Error: '.$ex->getMessage().' BD');
        }
        return redirect()->route('asignaturas.index')->with('mensaje', 'Asignatura Borrada');
    }
}
