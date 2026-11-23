<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    private function fetchDataFromApi($url)
    {
        return $this->requestApi($url);
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $programas = $this->apiCollection($this->fetchDataFromApi($url . '/programas'));

        return view('programa.index', compact('programas'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');

        $areas = $this->apiCollection($this->fetchDataFromApi($url . '/areas'));

        return view('programa.create', compact('areas'));
    }

    public function admin(Request $request)
    {
        $url = env('URL_SERVER_API');

        if (!$this->createApiRecord($url . '/programas', $request->except(['_token', '_method']))) {
            return back()->withInput();
        }

        return redirect()->route('programa.index')->with('status', 'Programa creado correctamente.');
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $programa = $this->apiRecord($this->fetchDataFromApi($url . '/programas/' . $id));

        if ($programa === []) {
            return $this->missingApiRecord('programa.index');
        }

        return view('programa.show', compact('programa'));
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        
        $programa = $this->apiRecord($this->fetchDataFromApi($url . '/programas/' . $id));

        if ($programa === []) {
            return $this->missingApiRecord('programa.index');
        }

        $areas = $this->apiCollection($this->fetchDataFromApi($url . '/areas'));

        return view('programa.edit', compact('programa', 'areas'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/programas/' . $id, $request->except(['_token', '_method']))->throw();

        return redirect()->route('programa.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/programas/' . $id)->throw();
        return redirect()->route('programa.index');
    }
}