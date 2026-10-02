<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\Programa;

class OfertaController extends Controller
{
    public function index()
    {
        $ofertas = Oferta::with('programa')->get();

        return view('oferta.index', compact('ofertas'));
    }

    public function create()
    {
        $programas = Programa::all();

        return view('oferta.create', compact('programas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jornada' => 'required|string|max:100',
            'registration_date' => 'required|date',
            'capacity' => 'required|integer|min:1',
            'programa_id' => 'required|exists:programas,id',
        ]);

        Oferta::create([
            'jornada' => $request->jornada,
            'registration_date' => $request->registration_date,
            'capacity' => $request->capacity,
            'programa_id' => $request->programa_id,
        ]);

        return redirect()
            ->route('oferta.index')
            ->with('success', 'Oferta creada correctamente.');
    }

    public function show($id)
    {
        $oferta = Oferta::with('programa')->findOrFail($id);

        return view('oferta.show', compact('oferta'));
    }

    public function edit($id)
    {
        $oferta = Oferta::findOrFail($id);
        $programas = Programa::all();

        return view('oferta.edit', compact('oferta', 'programas'));
    }

    public function update(Request $request, $id)
    {
        $oferta = Oferta::findOrFail($id);

        $request->validate([
            'jornada' => 'required|string|max:100',
            'registration_date' => 'required|date',
            'capacity' => 'required|integer|min:1',
            'programa_id' => 'required|exists:programas,id',
        ]);

        $oferta->update([
            'jornada' => $request->jornada,
            'registration_date' => $request->registration_date,
            'capacity' => $request->capacity,
            'programa_id' => $request->programa_id,
        ]);

        return redirect()
            ->route('oferta.index')
            ->with('success', 'Oferta actualizada correctamente.');
    }

    public function destroy($id)
    {
        $oferta = Oferta::findOrFail($id);

        $oferta->delete();

        return redirect()
            ->route('oferta.index')
            ->with('success', 'Oferta eliminada correctamente.');
    }
}

