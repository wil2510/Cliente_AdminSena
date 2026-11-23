<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        return $this->requestApi($url);
    }

    public function index()
    {

        $url = env('URL_SERVER_API');
        $areas = $this->apiCollection($this->fetchDataFromApi($url . '/areas'));

        return view('area.index', compact('areas'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');
        $areas = $this->apiRecord($this->fetchDataFromApi($url . '/areas/' . $id));

        if ($areas === []) {
            return $this->missingApiRecord('area.index');
        }

        return view('area.show', compact('areas'));
    }

    public function create()
    {
        return view('area.create');
    }

    public function admin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $url = env('URL_SERVER_API');

        $file = $request->file('imagen');

        if (!$this->createApiRecord($url . '/areas', ['name' => $request->name], $file, 'imagen')) {
            return back()->withInput();
        }

        return redirect()->route('area.index')->with('status', 'Área creada correctamente.');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $area = $this->apiRecord($this->fetchDataFromApi($url . '/areas/' . $id));

        if ($area === []) {
            return $this->missingApiRecord('area.index');
        }

        return view('area.edit', compact('area'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        $payload = $request->except(['_token', '_method', 'imagen']);

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            Http::attach('imagen', file_get_contents($file->getRealPath()), $file->getClientOriginalName())
                ->put($url . '/areas/' . $id, $payload)
                ->throw();
        } else {
            Http::put($url . '/areas/' . $id, $payload)->throw();
        }

        return redirect()->route('area.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/areas/' . $id)->throw();
        return redirect()->route('area.index');
    }
}