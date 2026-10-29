<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url)->throw();
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $response = $this->fetchDataFromApi($url . '/apprentices');
        
        if (is_array($response)) {
            $apprentices = isset($response['data']) && is_array($response['data']) ? $response['data'] : $response;
        } else {
            $apprentices = [];
        }

        return view('apprentice.index', compact('apprentices'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $response = $this->fetchDataFromApi($url . '/apprentices/' . $id);
        $apprentice = is_array($response) && isset($response['data']) ? $response['data'] : $response;
        return view('apprentice.show', compact('apprentice'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $areasResponse = $this->fetchDataFromApi($url . '/areas');
        $computersResponse = $this->fetchDataFromApi($url . '/computers');

        $areas = is_array($areasResponse) ? ($areasResponse['data'] ?? $areasResponse) : [];
        $computers = is_array($computersResponse) ? ($computersResponse['data'] ?? $computersResponse) : [];

        return view('apprentice.create', compact('areas', 'computers'));
    }

    public function admin(Request $request)
    {
        $url = env('URL_SERVER_API');
        Http::post($url . '/apprentice', $request->all())->throw();
        return redirect()->route('apprentice.index');
    }
    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $areasResponse = $this->fetchDataFromApi($url . '/areas');
        $computersResponse = $this->fetchDataFromApi($url . '/computers');
        
        $areas = is_array($areasResponse) ? ($areasResponse['data'] ?? $areasResponse) : [];
        $computers = is_array($computersResponse) ? ($computersResponse['data'] ?? $computersResponse) : [];
        
        $responseApprentice = $this->fetchDataFromApi($url . '/apprentices/' . $id);
        $apprentice = is_array($responseApprentice) && isset($responseApprentice['data']) ? $responseApprentice['data'] : $responseApprentice;

        return view('apprentice.edit', compact('apprentice', 'areas', 'computers'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/Apprentices/' . $id, $request->all())->throw();
        return redirect()->route('Apprentice.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/apprentices/' . $id)->throw();
        return redirect()->route('apprentice.index');
    }
}