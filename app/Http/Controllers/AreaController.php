<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AreaController extends Controller
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

        $response = $this->fetchDataFromApi($url . '/areas');
        $areas = is_array($response) ? $response : [];
        // return $categories;
        return view('area.index', compact('areas'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');

        $areas = $this->fetchDataFromApi($url . '/areas/' . $id);

        return view('area.show', compact('areas'));
    }

    public function create()
    {
        return view('area.create');
    }

    public function admin(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/areas', $request->all())->throw();

        return redirect()->route('area.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $area = $this->fetchDataFromApi($url . '/areas/' . $id);
        return view('area.edit', compact('area'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/areas/' . $id, $request->all())->throw();

        return redirect()->route('area.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/areas/' . $id)->throw();
        return redirect()->route('area.index');
    }
}
