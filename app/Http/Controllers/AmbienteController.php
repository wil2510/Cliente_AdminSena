<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AmbienteController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url)->throw();

        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $response = $this->fetchDataFromApi($url . '/ambientes');
        $ambientes = is_array($response) ? $response : [];

        return view('ambiente.index', compact('ambientes'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $response = $this->fetchDataFromApi($url . '/training_centers');
        $trainingCenters = is_array($response) ? $response : [];

        return view('ambiente.create', compact('trainingCenters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'training_center_id' => 'required|integer',
        ]);

        $url = env('URL_SERVER_API');
        Http::post($url . '/ambientes', $request->all())->throw();

        return redirect()->route('ambiente.index');
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $ambiente = $this->fetchDataFromApi($url . '/ambientes/' . $id);

        return view('ambiente.show', compact('ambiente'));
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $ambiente = $this->fetchDataFromApi($url . '/ambientes/' . $id);
        $response = $this->fetchDataFromApi($url . '/training_centers');
        $trainingCenters = is_array($response) ? $response : [];

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
        Http::put($url . '/ambientes/' . $id, $request->all())->throw();

        return redirect()->route('ambiente.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/ambientes/' . $id)->throw();

        return redirect()->route('ambiente.index');
    }
}
