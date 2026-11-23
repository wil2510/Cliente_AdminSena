<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        return $this->requestApi($url);
    }

    public function index()   //http://api.codersfree.test/v1/apprentices?included=posts
    {

        $url = env('URL_SERVER_API');

        $apprentices = $this->apiCollection($this->fetchDataFromApi($url . '/apprentices'));
        return view('apprentice.index', compact('apprentices'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');

        $apprentices = $this->apiRecord($this->fetchDataFromApi($url . '/apprentices/' . $id));

        if ($apprentices === []) {
            return $this->missingApiRecord('apprentice.index');
        }

        return view('apprentice.show', compact('apprentices'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $courses = $this->apiCollection($this->fetchDataFromApi($url . '/courses'));
        $computers = $this->apiCollection($this->fetchDataFromApi($url . '/computers'));

        return view('apprentice.create', compact('courses', 'computers'));
    }

    public function admin(Request $request)
    {
        $url = env('URL_SERVER_API');

        if (!$this->createApiRecord($url . '/apprentices', $request->except(['_token', '_method']))) {
            return back()->withInput();
        }

        return redirect()->route('apprentice.index')->with('status', 'Aprendiz creado correctamente.');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $apprentice = $this->apiRecord($this->fetchDataFromApi($url . '/apprentices/' . $id));

        if ($apprentice === []) {
            return $this->missingApiRecord('apprentice.index');
        }

        $courses = $this->apiCollection($this->fetchDataFromApi($url . '/courses'));
        $computers = $this->apiCollection($this->fetchDataFromApi($url . '/computers'));
        
        return view('apprentice.edit', compact('apprentice', 'courses', 'computers'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/apprentices/' . $id, $request->except(['_token', '_method']))->throw();

        return redirect()->route('apprentice.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/apprentices/' . $id)->throw();
        return redirect()->route('apprentice.index');
    }
}