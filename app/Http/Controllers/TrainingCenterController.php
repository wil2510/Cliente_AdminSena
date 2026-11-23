<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TrainingCenterController extends Controller
{
    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        return $this->requestApi($url);
    }

    public function index()   //http://api.codersfree.test/v1/categories?included=posts
    {

        $url = env('URL_SERVER_API');

        $trainingcenters = $this->apiCollection($this->fetchDataFromApi($url . '/trainingcenters'));

        return view('trainingcenter.index', compact('trainingcenters'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');

        $trainingcenters = $this->apiRecord($this->fetchDataFromApi($url . '/trainingcenters/' . $id));

        if ($trainingcenters === []) {
            return $this->missingApiRecord('trainingcenter.index');
        }

        return view('trainingcenter.show', compact('trainingcenters'));
    }

    public function create()
    {
        return view('trainingcenter.create');
    }

    public function admin(Request $request)
    {
            $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $url = env('URL_SERVER_API');

        $file = $request->file('imagen');

        if (!$this->createApiRecord($url . '/trainingcenters', [
                'name' => $request->name,
                'location' => $request->location,
            ], $file, 'imagen')) {
            return back()->withInput();
        }

        return redirect()->route('trainingcenter.index')->with('status', 'Centro creado correctamente.');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $trainingcenter = $this->apiRecord($this->fetchDataFromApi($url . '/trainingcenters/' . $id));

        if ($trainingcenter === []) {
            return $this->missingApiRecord('trainingcenter.index');
        }

        return view('trainingcenter.edit', compact('trainingcenter'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        $payload = $request->except(['_token', '_method', 'imagen']);
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            Http::attach('imagen', file_get_contents($file->getRealPath()), $file->getClientOriginalName())
                ->put($url . '/trainingcenters/' . $id, $payload)
                ->throw();
        } else {
            Http::put($url . '/trainingcenters/' . $id, $payload)->throw();
        }

        return redirect()->route('trainingcenter.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/trainingcenters/' . $id)->throw();
        return redirect()->route('trainingcenter.index');
    }
}