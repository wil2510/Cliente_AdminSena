<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url)->throw();
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $response = $this->fetchDataFromApi($url . '/programas');
        $programas = is_array($response) ? $response : [];

        return view('programa.index', compact('programas'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');

        $response = $this->fetchDataFromApi($url . '/areas');
        $areas = is_array($response) ? $response : [];

        return view('programa.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/programas', $request->all())->throw();

        return redirect()->route('programa.index');
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $programa = $this->fetchDataFromApi($url . '/programas/' . $id);

        return view('programa.show', compact('programa'));
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        
        $programa = $this->fetchDataFromApi($url . '/programas/' . $id);
        
        $response = $this->fetchDataFromApi($url . '/areas');
        $areas = is_array($response) ? $response : [];

        return view('programa.edit', compact('programa', 'areas'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/programas/' . $id, $request->all())->throw();

        return redirect()->route('programa.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/programas/' . $id)->throw();
        return redirect()->route('programa.index');
    }
}