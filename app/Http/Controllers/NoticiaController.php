<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    private function fetchDataFromApi($url)
    {
        return $this->requestApi($url);
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $noticias = $this->apiCollection($this->fetchDataFromApi($url . '/noticias'));

        return view('noticia.index', compact('noticias'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');

        $trainingCenters = $this->apiCollection($this->fetchDataFromApi($url . '/trainingcenters'));

        return view('noticia.create', compact('trainingCenters'));
    }

    public function admin(Request $request)
    {
        $url = env('URL_SERVER_API');

        if (!$this->createApiRecord(
            $url . '/noticias',
            $request->except(['image', '_token', '_method']),
            $request->file('image'),
            'image'
        )) {
            return back()->withInput();
        }

        return redirect()->route('noticia.index')->with('status', 'Noticia creada correctamente.');
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $noticia = $this->apiRecord($this->fetchDataFromApi($url . '/noticias/' . $id));

        if ($noticia === []) {
            return $this->missingApiRecord('noticia.index');
        }

        return view('noticia.show', compact('noticia'));
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        
        $noticia = $this->apiRecord($this->fetchDataFromApi($url . '/noticias/' . $id));

        if ($noticia === []) {
            return $this->missingApiRecord('noticia.index');
        }
        
        $trainingCenters = $this->apiCollection($this->fetchDataFromApi($url . '/trainingcenters'));

        return view('noticia.edit', compact('noticia', 'trainingCenters'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        $payload = $request->except(['_token', '_method', 'image']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            Http::attach('image', file_get_contents($file->getRealPath()), $file->getClientOriginalName())
                ->put($url . '/noticias/' . $id, $payload)
                ->throw();
        } else {
            Http::put($url . '/noticias/' . $id, $payload)->throw();
        }

        return redirect()->route('noticia.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::delete($url . '/noticias/' . $id)->throw();

        return redirect()->route('noticia.index');
    }
}