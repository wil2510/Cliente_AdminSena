<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    private function fetchDataFromApi($url)
    {
        return $this->requestApi($url);
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $ofertas = $this->apiCollection($this->fetchDataFromApi($url . '/ofertas'));

        return view('oferta.index', compact('ofertas'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $oferta = $this->apiRecord($this->fetchDataFromApi($url . '/ofertas/' . $id));

        if ($oferta === []) {
            return $this->missingApiRecord('oferta.index');
        }

        return view('oferta.show', compact('oferta'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $programas = $this->apiCollection($this->fetchDataFromApi($url . '/programas'));

        return view('oferta.create', compact('programas'));
    }

    public function admin(Request $request)
    {
        $url = env('URL_SERVER_API');
        if (!$this->createApiRecord($url . '/ofertas', $request->except(['_token', '_method']))) {
            return back()->withInput();
        }

        return redirect()->route('oferta.index')->with('status', 'Oferta creada correctamente.');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $oferta = $this->apiRecord($this->fetchDataFromApi($url . '/ofertas/' . $id));

        if ($oferta === []) {
            return $this->missingApiRecord('oferta.index');
        }

        $programas = $this->apiCollection($this->fetchDataFromApi($url . '/programas'));

        return view('oferta.edit', compact('oferta', 'programas'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/ofertas/' . $id, $request->except(['_token', '_method']))->throw();
        return redirect()->route('oferta.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/ofertas/' . $id)->throw();
        return redirect()->route('oferta.index');
    }
}