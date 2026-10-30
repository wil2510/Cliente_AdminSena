<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()   //http://api.codersfree.test/v1/apprentices?included=posts
    {

        $url = env('URL_SERVER_API');

        $apprentices = $this->fetchDataFromApi($url . '/apprentices');
        return view('apprentice.index', compact('apprentices'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');

        $apprentices = $this->fetchDataFromApi($url . '/apprentices/' . $id);

        return view('apprentice.show', compact('apprentices'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $courses = Http::get($url . '/courses')->json();
        $computers = Http::get($url . '/computers')->json();

        return view('apprentice.create', compact('courses', 'computers'));
    }

    public function admin(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/apprentices', $request->all());

        return redirect()->route('apprentice.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $courses = Http::get($url . '/courses')->json();
        $computers = Http::get($url . '/computers')->json();
        $apprentice = $this->fetchDataFromApi($url . '/apprentices/' . $id);
        
        return view('apprentice.edit', compact('apprentice', 'courses', 'computers'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/apprentices/' . $id, $request->all());

        return redirect()->route('apprentice.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/apprentices/' . $id);
        return redirect()->route('apprentice.index');
    }
}