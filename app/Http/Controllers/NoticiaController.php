<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $response = $this->fetchDataFromApi($url . '/noticias');
        $noticias = is_array($response) ? $response : [];

        return view('noticia.index', compact('noticias'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');

        $response = $this->fetchDataFromApi($url . '/training-centers');
        $trainingCenters = is_array($response) ? $response : [];

        return view('noticia.create', compact('trainingCenters'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        if ($request->hasFile('image')) {
            $response = Http::attach(
                'image',
                file_get_contents($request->file('image')->path()),
                $request->file('image')->getClientOriginalName()
            )->post($url . '/noticias', $request->except('image'));
        } else {
            Http::post($url . '/noticias', $request->all());
        }

        return redirect()->route('noticia.index');
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $noticia = $this->fetchDataFromApi($url . '/noticias/' . $id);

        return view('noticia.show', compact('noticia'));
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        
        $noticia = $this->fetchDataFromApi($url . '/noticias/' . $id);
        
        $response = $this->fetchDataFromApi($url . '/training-centers');
        $trainingCenters = is_array($response) ? $response : [];

        return view('noticia.edit', compact('noticia', 'trainingCenters'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/noticias/' . $id, $request->all());

        return redirect()->route('noticia.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::delete($url . '/noticias/' . $id);

        return redirect()->route('noticia.index');
    }
}