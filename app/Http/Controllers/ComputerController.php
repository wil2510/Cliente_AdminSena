<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{
    public function create()
    {
        return view('computer.create');
    }

    public function index(Request $request)
    {
        // $computers = Computer::all();

        // // Si la petición viene de Postman
        // if ($request->wantsJson()) {
        //     return response()->json($computers, 200);
        // }

        // return view('computer.index', compact('computers'));
        $computers = Computer::all();

        return response()->json($computers);
    }

    public function admin(Request $request)
    {
        // $computers = Computer::create($request->all());

        $request->validate([
            'serial_number' => 'required|max:255',
        ]);
        $computers = Computer::create($request->all());

        if ($request->hasFile("urlFoto")) {
            $file = $request->file("urlFoto");
            $nombreArchivo = "foto_".time().".".$file->guessExtension();
            $request->file('urlFoto')->storeAs('public/images', $nombreArchivo);

            $computers->urlFoto = $nombreArchivo;
            $computers->save();
        }

        // // Si la petición viene de Postman
        // if ($request->wantsJson()) {
        //     return response()->json($computers, 201);
        // }

        return response()->json($computers);

        // return redirect()->route('computer.index');
    }

    public function show(Request $request, $id)
    {
        // $computer = Computer::findOrFail($id);

        // // Si la petición viene de Postman
        // if ($request->wantsJson()) {
        //     return response()->json($computer, 200);
        // }

        // return view('computer.show', compact('computer'));

        $computers = Computer::findOrFail($id);
        // $computers = Computer::with(['posts.user'])->findOrFail($id);
        // $computers = Computer::with(['posts'])->findOrFail($id);
        return response()->json($computers);
    }

    public function edit(Computer $computer)
    {
        return view('computer.edit', compact('computer'));
    }

    public function update(Request $request, Computer $computer)
    {
        // $computer->update($request->all());

        // // Si la petición viene de Postman
        // if ($request->wantsJson()) {
        //     return response()->json($computer, 200);
        // }

        // return redirect()->route('computer.index');

        $request->validate([
            'serial_number' => 'required|max:255',
        ]);

        $computer->update($request->all());

        return $computer;
    }

    public function destroy(Request $request, Computer $computer)
    {
        // $computer->delete();

        // // Si la petición viene de Postman
        // if ($request->wantsJson()) {
        //     return response()->json(['message' => 'Equipo eliminado correctamente'], 200);
        // }

        // return redirect()->route('computer.index');

        $computer->delete();
        return $computer;
    }
}