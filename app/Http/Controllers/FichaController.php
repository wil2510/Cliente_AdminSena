<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class FichaController extends Controller
{
    private function fetchDataFromApi($url)
    {
        return $this->requestApi($url);
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $fichas = $this->apiCollection($this->fetchDataFromApi($url . '/fichas'));

        return view('ficha.index', compact('fichas'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $ficha = $this->apiRecord($this->fetchDataFromApi($url . '/fichas/' . $id));

        if ($ficha === []) {
            return $this->missingApiRecord('ficha.index');
        }

        return view('ficha.show', compact('ficha'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $ofertasResponse = $this->fetchDataFromApi($url . '/ofertas');
        $programasResponse = $this->fetchDataFromApi($url . '/programas');

        $ofertas = $this->apiCollection($ofertasResponse);
        $programas = $this->apiCollection($programasResponse);

        return view('ficha.create', compact('ofertas', 'programas'));
    }

    public function admin(Request $request)
    {
        $url = env('URL_SERVER_API');
        if (!$this->createApiRecord($url . '/fichas', $request->except(['_token', '_method']))) {
            return back()->withInput();
        }

        return redirect()->route('ficha.index')->with('status', 'Ficha creada correctamente.');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $ficha = $this->apiRecord($this->fetchDataFromApi($url . '/fichas/' . $id));

        if ($ficha === []) {
            return $this->missingApiRecord('ficha.index');
        }

        $ofertasResponse = $this->fetchDataFromApi($url . '/ofertas');
        $programasResponse = $this->fetchDataFromApi($url . '/programas');
        
        $ofertas = $this->apiCollection($ofertasResponse);
        $programas = $this->apiCollection($programasResponse);
        
        return view('ficha.edit', compact('ficha', 'ofertas', 'programas'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/fichas/' . $id, $request->except(['_token', '_method']))->throw();
        return redirect()->route('ficha.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/fichas/' . $id)->throw();
        return redirect()->route('ficha.index');
    }
}