<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programa;
use App\Models\Area;

class ProgramaController extends Controller
{
    // Mostrar todos los programas
    public function index()
    {
        $programas = Programa::with('area')->get();

        return view('programa.index', compact('programas'));
    }

    // Mostrar formulario para crear
    public function create()
    {
        $areas = Area::all();

        return view('programa.create', compact('areas'));
    }

    // Guardar programa
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|max:100',
            'duration' => 'required|integer|min:1',
            'area_id' => 'required|exists:areas,id',
        ]);

        Programa::create([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'duration' => $request->duration,
            'area_id' => $request->area_id,
        ]);

        return redirect()
            ->route('programa.index')
            ->with('success', 'Programa creado correctamente.');
    }

    // Mostrar un programa
    public function show($id)
    {
        $programa = Programa::with('area')->findOrFail($id);

        return view('programa.show', compact('programa'));
    }

    // Mostrar formulario para editar
    public function edit($id)
    {
        $programa = Programa::findOrFail($id);
        $areas = Area::all();

        return view('programa.edit', compact('programa', 'areas'));
    }

    // Actualizar programa
    public function update(Request $request, $id)
    {
        $programa = Programa::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|max:100',
            'duration' => 'required|integer|min:1',
            'area_id' => 'required|exists:areas,id',
        ]);

        $programa->update([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'duration' => $request->duration,
            'area_id' => $request->area_id,
        ]);

        return redirect()
            ->route('programa.index')
            ->with('success', 'Programa actualizado correctamente.');
    }

    // Eliminar programa
    public function destroy($id)
    {
        $programa = Programa::findOrFail($id);

        $programa->delete();

        return redirect()
            ->route('programa.index')
            ->with('success', 'Programa eliminado correctamente.');
    }
}