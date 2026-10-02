<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training_center;

class TrainingCenterController extends Controller
{
    public function create()
    {
        return view('trainingcenter.create');
    }

    public function index(Request $request)
    {
        // $trainingcenters = Training_center::all();

        // // Si la petición viene de Postman
        // if ($request->wantsJson()) {
        //     return response()->json($trainingcenters, 200);
        // }

        // return view('trainingcenter.index', compact('trainingcenters'));
        $trainingcenters = Training_center::all();

        return response()->json($trainingcenters);
    }

    public function admin(Request $request)
    {
        // $trainingcenter = Training_center::create($request->all());

        $request->validate([
            'name' => 'required|max:255',
        ]);
        $trainingcenter = Training_center::create($request->all());

        if ($request->hasFile("urlFoto")) {
            $file = $request->file("urlFoto");
            $nombreArchivo = "foto_".time().".".$file->guessExtension();
            $request->file('urlFoto')->storeAs('public/images', $nombreArchivo);

            $trainingcenter->urlFoto = $nombreArchivo;
            $trainingcenter->save();
        }

        // // Si la petición viene de Postman
        // if ($request->wantsJson()) {
        //     return response()->json($trainingcenter, 201);
        // }

        return response()->json($trainingcenter);

        // return redirect()->route('trainingcenter.index');
    }

    public function ambientes()
    {
        return $this->hasMany(Ambientes::class);
    }

    public function show(Request $request, $id)
    {
        // $trainingcenter = Training_center::find($id);

        // // Si la petición viene de Postman
        // if ($request->wantsJson()) {
        //     return response()->json($trainingcenter, 200);
        // }

        // return view('trainingcenter.show', compact('trainingcenter'));

        $trainingcenter = Training_center::findOrFail($id);
        // $trainingcenter = Training_center::with(['posts.user'])->findOrFail($id);
        // $trainingcenter = Training_center::with(['posts'])->findOrFail($id);
        return response()->json($trainingcenter);
    }

    public function edit(Training_center $trainingcenter)
    {
        return view('trainingcenter.edit', compact('trainingcenter'));
    }

    public function update(Request $request, Training_center $trainingcenter)
    {
        // $trainingcenter->update($request->all());

        // // Si la petición viene de Postman
        // if ($request->wantsJson()) {
        //     return response()->json($trainingcenter, 200);
        // }

        // return redirect()->route('trainingcenter.index');

        $request->validate([
            'name' => 'required|max:255',
        ]);

        $trainingcenter->update($request->all());

        return $trainingcenter;
    }

    public function destroy(Request $request, Training_center $trainingcenter)
    {
        // $trainingcenter->delete();

        // // Si la petición viene de Postman
        // if ($request->wantsJson()) {
        //     return response()->json(['message' => 'Centro de formación eliminado correctamente'], 200);
        // }

        // return redirect()->route('trainingcenter.index');

        $trainingcenter->delete();
        return $trainingcenter;
    }
}