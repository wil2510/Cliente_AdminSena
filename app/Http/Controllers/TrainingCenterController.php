<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TrainingCenterController extends Controller
{
    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url)->throw();

        return $response->json();
    }

    public function index()   //http://api.codersfree.test/v1/categories?included=posts
    {

        $url = env('URL_SERVER_API');

        $response = $this->fetchDataFromApi($url . '/trainingcenters');
        $trainingcenters = is_array($response) ? $response : [];

        return view('trainingcenter.index', compact('trainingcenters'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');

        $trainingcenters = $this->fetchDataFromApi($url . '/trainingcenters/' . $id);

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

        $response = Http::attach('imagen',file_get_contents($file->getRealPath()),$file->getClientOriginalName())
        ->post(env('URL_SERVER_API') . '/trainingcenters',['name' => $request->name, 'location' => $request->location]);

        return redirect()->route('trainingcenter.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $trainingcenter = $this->fetchDataFromApi($url . '/trainingcenters/' . $id);
        return view('trainingcenter.edit', compact('trainingcenter'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/trainingcenters/' . $id, $request->all())->throw();

        return redirect()->route('trainingcenter.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/trainingcenters/' . $id)->throw();
        return redirect()->route('trainingcenter.index');
    }
}