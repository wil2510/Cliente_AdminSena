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
        
        $fichas = is_array($response) ? $response : [];

        return view('ficha.index', compact('fichas'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $ficha = $this->fetchDataFromApi($url . '/fichas/' . $id);

        return view('ficha.show', compact('ficha'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');

        $response = $this->fetchDataFromApi($url . '/ofertas');
        
        $ofertas = is_array($response) ? $response : [];

        return view('ficha.create', compact('ofertas'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/fichas', $request->all())->throw();

        return redirect()->route('ficha.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        
        $ficha = $this->fetchDataFromApi($url . '/fichas/' . $id);
        
        $response = $this->fetchDataFromApi($url . '/ofertas');
        $ofertas = is_array($response) ? $response : [];

        return view('ficha.edit', compact('ficha', 'ofertas'));
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