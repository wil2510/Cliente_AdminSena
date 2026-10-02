<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ficha;
use App\Models\Oferta;

class FichaController extends Controller
{
    public function index()
    {
        $fichas = Ficha::with('oferta.programa')->get();

        return view('ficha.index', compact('fichas'));
    }

    public function create()
    {
        $ofertas = Oferta::with('programa')->get();

        return view('ficha.create', compact('ofertas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:100|unique:fichas,code',
            'start_date' => 'required|date',
            'schedule' => 'required|string|max:100',
            'oferta_id' => 'required|exists:ofertas,id',
        ]);

        Ficha::create([
            'code' => $request->code,
            'start_date' => $request->start_date,
            'schedule' => $request->schedule,
            'oferta_id' => $request->oferta_id,
        ]);

        return redirect()
            ->route('ficha.index')
            ->with('success', 'Ficha creada correctamente.');
    }

    public function show($id)
    {
        $ficha = Ficha::with('oferta.programa')->findOrFail($id);

        return view('ficha.show', compact('ficha'));
    }

    public function edit($id)
    {
        $ficha = Ficha::findOrFail($id);
        $ofertas = Oferta::with('programa')->get();

        return view('ficha.edit', compact('ficha', 'ofertas'));
    }

    public function update(Request $request, $id)
    {
        $ficha = Ficha::findOrFail($id);

        $request->validate([
            'code' => 'required|string|max:100|unique:fichas,code,' . $id,
            'start_date' => 'required|date',
            'schedule' => 'required|string|max:100',
            'oferta_id' => 'required|exists:ofertas,id',
        ]);

        $ficha->update([
            'code' => $request->code,
            'start_date' => $request->start_date,
            'schedule' => $request->schedule,
            'oferta_id' => $request->oferta_id,
        ]);

        return redirect()
            ->route('ficha.index')
            ->with('success', 'Ficha actualizada correctamente.');
    }

    public function destroy($id)
    {
        $ficha = Ficha::findOrFail($id);

        $ficha->delete();

        return redirect()
            ->route('ficha.index')
            ->with('success', 'Ficha eliminada correctamente.');
    }
}