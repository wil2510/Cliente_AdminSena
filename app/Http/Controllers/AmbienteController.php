<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ambiente;
use App\Models\Training_center;

class AmbienteController extends Controller
{
    public function index()
    {
        $ambientes = Ambiente::with('trainingCenter')->get();

        return view('ambiente.index', compact('ambientes'));
    }

    public function create()
    {
        $trainingCenters = Training_center::all();

        return view('ambiente.create', compact('trainingCenters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'training_center_id' => 'required|exists:training_centers,id',
        ]);

        Ambiente::create([
            'name' => $request->name,
            'location' => $request->location,
            'training_center_id' => $request->training_center_id,
        ]);

        return redirect()
            ->route('ambiente.index')
            ->with('success', 'Ambiente creado correctamente.');
    }

    public function show($id)
    {
        $ambiente = Ambiente::with('trainingCenter')->findOrFail($id);

        return view('ambiente.show', compact('ambiente'));
    }

    public function edit($id)
    {
        $ambiente = Ambiente::findOrFail($id);
        $trainingCenters = Training_center::all();

        return view('ambiente.edit', compact(
            'ambiente',
            'trainingCenters'
        ));
    }

    public function update(Request $request, $id)
    {
        $ambiente = Ambiente::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'training_center_id' => 'required|exists:training_centers,id',
        ]);

        $ambiente->update([
            'name' => $request->name,
            'location' => $request->location,
            'training_center_id' => $request->training_center_id,
        ]);

        return redirect()
            ->route('ambiente.index')
            ->with('success', 'Ambiente actualizado correctamente.');
    }

    public function destroy($id)
    {
        $ambiente = Ambiente::findOrFail($id);

        $ambiente->delete();

        return redirect()
            ->route('ambiente.index')
            ->with('success', 'Ambiente eliminado correctamente.');
    }
}