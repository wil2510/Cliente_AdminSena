<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class FichaController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url)->throw();
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $response = $this->fetchDataFromApi($url . '/fichas');
        
        if (is_array($response)) {
            $fichas = isset($response['data']) && is_array($response['data']) ? $response['data'] : $response;
        } else {
            $fichas = [];
        }

        return view('ficha.index', compact('fichas'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $response = $this->fetchDataFromApi($url . '/fichas/' . $id);
        $ficha = is_array($response) && isset($response['data']) ? $response['data'] : $response;
        return view('ficha.show', compact('ficha'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $ofertasResponse = $this->fetchDataFromApi($url . '/ofertas');
        $programasResponse = $this->fetchDataFromApi($url . '/programas');

        $ofertas = is_array($ofertasResponse) ? ($ofertasResponse['data'] ?? $ofertasResponse) : [];
        $programas = is_array($programasResponse) ? ($programasResponse['data'] ?? $programasResponse) : [];

        return view('ficha.create', compact('ofertas', 'programas'));
    }

    public function admin(Request $request)
    {
        $url = env('URL_SERVER_API');
        Http::post($url . '/fichas', $request->all())->throw();
        return redirect()->route('ficha.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $ofertasResponse = $this->fetchDataFromApi($url . '/ofertas');
        $programasResponse = $this->fetchDataFromApi($url . '/programas');
        
        $ofertas = is_array($ofertasResponse) ? ($ofertasResponse['data'] ?? $ofertasResponse) : [];
        $programas = is_array($programasResponse) ? ($programasResponse['data'] ?? $programasResponse) : [];
        
        $responseFicha = $this->fetchDataFromApi($url . '/fichas/' . $id);
        $ficha = is_array($responseFicha) && isset($responseFicha['data']) ? $responseFicha['data'] : $responseFicha;

        return view('ficha.edit', compact('ficha', 'ofertas', 'programas'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/fichas/' . $id, $request->all())->throw();
        return redirect()->route('ficha.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/fichas/' . $id)->throw();
        return redirect()->route('ficha.index');
    }
}