<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $response = $this->fetchDataFromApi($url . '/teachers');
        
        if (is_array($response)) {
            $teachers = isset($response['data']) && is_array($response['data']) ? $response['data'] : $response;
        } else {
            $teachers = [];
        }

        return view('teacher.index', compact('teachers'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $response = $this->fetchDataFromApi($url . '/teachers/' . $id);
        $teachers = is_array($response) && isset($response['data']) ? $response['data'] : $response;
        return view('teacher.show', compact('teachers'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $areasResponse = Http::get($url . '/areas')->json();
        $trainingCentersResponse = Http::get($url . '/trainingcenters')->json();

        $areas = is_array($areasResponse) ? ($areasResponse['data'] ?? $areasResponse) : [];
        $trainingcenters = is_array($trainingCentersResponse) ? ($trainingCentersResponse['data'] ?? $trainingCentersResponse) : [];

        return view('teacher.create', compact('areas', 'trainingcenters'));
    }

    public function admin(Request $request)
    {
        $url = env('URL_SERVER_API');
        Http::post($url . '/teachers', $request->all());
        return redirect()->route('teacher.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $areasResponse = Http::get($url . '/areas')->json();
        $trainingCentersResponse = Http::get($url . '/trainingcenters')->json();
        
        $areas = is_array($areasResponse) ? ($areasResponse['data'] ?? $areasResponse) : [];
        $trainingcenters = is_array($trainingCentersResponse) ? ($trainingCentersResponse['data'] ?? $trainingCentersResponse) : [];
        
        $responseTeacher = $this->fetchDataFromApi($url . '/teachers/' . $id);
        $teacher = is_array($responseTeacher) && isset($responseTeacher['data']) ? $responseTeacher['data'] : $responseTeacher;

        return view('teacher.edit', compact('teacher', 'areas', 'trainingcenters'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/teachers/' . $id, $request->all());
        return redirect()->route('teacher.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/teachers/' . $id);
        return redirect()->route('teacher.index');
    }
}