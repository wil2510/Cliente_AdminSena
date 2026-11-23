<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        return $this->requestApi($url);
    }

    public function index()   //http://api.codersfree.test/v1/categories?included=posts
    {

        $url = env('URL_SERVER_API');

        $computers = $this->apiCollection($this->fetchDataFromApi($url . '/computers'));

        return view('computer.index', compact('computers'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');

        $computers = $this->apiRecord($this->fetchDataFromApi($url . '/computers/' . $id));

        if ($computers === []) {
            return $this->missingApiRecord('computer.index');
        }

        return view('computer.show', compact('computers'));
    }

    public function create()
    {
        return view('computer.create');
    }

    public function admin(Request $request)
    {
        $url = env('URL_SERVER_API');

        if (!$this->createApiRecord($url . '/computers', $request->except(['_token', '_method']))) {
            return back()->withInput();
        }

        return redirect()->route('computer.index')->with('status', 'Computador creado correctamente.');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $computer = $this->apiRecord($this->fetchDataFromApi($url . '/computers/' . $id));

        if ($computer === []) {
            return $this->missingApiRecord('computer.index');
        }

        return view('computer.edit', compact('computer'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/computers/' . $id, $request->except(['_token', '_method']))->throw();

        return redirect()->route('computer.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/computers/' . $id)->throw();
        return redirect()->route('computer.index');
    }
}