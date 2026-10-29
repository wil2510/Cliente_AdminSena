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
        
        if (is_array($response)) {
            $ofertas = isset($response['data']) && is_array($response['data']) ? $response['data'] : $response;
        } else {
            $ofertas = [];
        }

        return view('oferta.index', compact('ofertas'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $response = $this->fetchDataFromApi($url . '/ofertas/' . $id);
        $oferta = is_array($response) && isset($response['data']) ? $response['data'] : $response;
        return view('oferta.show', compact('oferta'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $programasResponse = Http::get($url . '/areas')->json();
        $programas = is_array($programasResponse) ? ($programasResponse['data'] ?? $programasResponse) : [];

        return view('oferta.create', compact('programas'));
    }

    public function admin(Request $request)
    {
        $url = env('URL_SERVER_API');
        Http::post($url . '/Ofertas', $request->all())->throw();
        return redirect()->route('Oferta.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $response = $this->fetchDataFromApi($url . '/ofertas/' . $id);
        $oferta = is_array($response) && isset($response['data']) ? $response['data'] : $response;
        return view('oferta.edit', compact('oferta'));
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