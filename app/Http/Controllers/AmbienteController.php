<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AmbienteController extends Controller
{
    private function fetchDataFromApi($url)
    {
        return $this->requestApi($url);
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $ambientes = $this->apiCollection($this->fetchDataFromApi($url . '/ambientes'));

        return view('ambiente.index', compact('ambientes'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $trainingCenters = $this->apiCollection($this->fetchDataFromApi($url . '/trainingcenters'));

        return view('ambiente.create', compact('trainingCenters'));
    }

    public function admin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'training_center_id' => 'required|integer',
        ]);

        $url = env('URL_SERVER_API');
        if (!$this->createApiRecord($url . '/ambientes', $request->except(['_token', '_method']))) {
            return back()->withInput();
        }

        return redirect()->route('ambiente.index')->with('status', 'Ambiente creado correctamente.');
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $ambiente = $this->apiRecord($this->fetchDataFromApi($url . '/ambientes/' . $id));

        if ($ambiente === []) {
            return $this->missingApiRecord('ambiente.index');
        }

        return view('ambiente.show', compact('ambiente'));
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $ambiente = $this->apiRecord($this->fetchDataFromApi($url . '/ambientes/' . $id));

        if ($ambiente === []) {
            return $this->missingApiRecord('ambiente.index');
        }

        $trainingCenters = $this->apiCollection($this->fetchDataFromApi($url . '/trainingcenters'));

        return view('ambiente.edit', compact('ambiente', 'trainingCenters'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'training_center_id' => 'required|integer',
        ]);

        $url = env('URL_SERVER_API');
        Http::put($url . '/ambientes/' . $id, $request->except(['_token', '_method']))->throw();

        return redirect()->route('ambiente.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/ambientes/' . $id)->throw();

        return redirect()->route('ambiente.index');
    }
}
