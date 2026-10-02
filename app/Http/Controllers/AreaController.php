<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use Illuminate\Support\Facades\Http;

class AreaController extends Controller
{
    public function create()
    {
        return view('area.create');
    }

    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json(); 
    }
    
    public function index() 
    {
        $url = env('URL_SERVER_API');

        $areas = $this->fetchDataFromApi($url . '/areas');
        
        return view('area.index', compact('areas'));
    }

    public function admin(Request $request)
    {
        // $areas = Area::create($request->all());

        $request->validate([
            'name' => 'required|max:255',
        ]);
        $areas = Area::create($request->all());

        if ($request->hasFile("urlFoto")) {
            $file = $request->file("urlFoto");
            $nombreArchivo = "foto_".time().".".$file->guessExtension();
            $request->file('urlFoto')->storeAs('public/images', $nombreArchivo);

            $areas->urlFoto = $nombreArchivo;
            $areas->save();
        }

        // // Si la petición viene de Postman
        // if ($request->wantsJson()) {
        //     return response()->json($areas, 201);
        // }

        return response()->json($areas);

        // return redirect()->route('area.index');
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');

        $area = $this->fetchDataFromApi($url . '/areas/' . $id);

        return view('area.show', compact('area'));
    }

    public function edit(Area $area)
    {
        return view('area.edit', compact('area'));
    }

    public function update(Request $request, Area $area)
    {
        // $area->update($request->all());

        // // Si la petición viene de Postman
        // if ($request->wantsJson()) {
        //     return response()->json($area, 200);
        // }

        // return redirect()->route('area.index');

        $request->validate([
            'name' => 'required|max:255',
        ]);

        $area->update($request->all());

        return $area;
    }

    public function destroy(Request $request, Area $area)
    {
        // $area->delete();

        // // Si la petición viene de Postman
        // if ($request->wantsJson()) {
        //     return response()->json(['message' => 'Área eliminada correctamente'], 200);
        // }

        // return redirect()->route('area.index');

        $area->delete();
        return $area;
    }
}