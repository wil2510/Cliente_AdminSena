<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url)->throw();
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $response = $this->fetchDataFromApi($url . '/ofertas');
        $ofertas = is_array($response) ? $response : [];

        return view('oferta.index', compact('ofertas'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $oferta = $this->fetchDataFromApi($url . '/ofertas/' . $id);

        return view('oferta.show', compact('oferta'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');

        $response = $this->fetchDataFromApi($url . '/programas');
        $programas = is_array($response) ? $response : [];

        return view('oferta.create', compact('programas'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/ofertas', $request->all())->throw();

        return redirect()->route('oferta.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        
        $oferta = $this->fetchDataFromApi($url . '/ofertas/' . $id);
        
        $response = $this->fetchDataFromApi($url . '/programas');
        $programas = is_array($response) ? $response : [];

        return view('oferta.edit', compact('oferta', 'programas'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/ofertas/' . $id, $request->all())->throw();

        return redirect()->route('oferta.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::delete($url . '/ofertas/' . $id)->throw();

        return redirect()->route('oferta.index');
    }
}