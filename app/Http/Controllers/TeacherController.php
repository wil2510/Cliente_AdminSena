<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeacherController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url)->throw();

        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $response = $this->fetchDataFromApi($url . '/teachers');
        $teachers = is_array($response) ? $response : [];

        return view('teacher.index', compact('teachers'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $areasResponse = $this->fetchDataFromApi($url . '/areas');
        $centersResponse = $this->fetchDataFromApi($url . '/training_centers');
        $areas = is_array($areasResponse) ? $areasResponse : [];
        $training_centers = is_array($centersResponse) ? $centersResponse : [];

        return view('teacher.create', compact('areas', 'training_centers'));
    }

    public function admin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'area_id' => 'required|integer',
            'training_center_id' => 'required|integer',
        ]);

        $url = env('URL_SERVER_API');
        Http::post($url . '/teachers', $request->all())->throw();

        return redirect()->route('teacher.index');
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $teacher = $this->fetchDataFromApi($url . '/teachers/' . $id);

        return view('teacher.show', compact('teacher'));
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $teacher = $this->fetchDataFromApi($url . '/teachers/' . $id);
        $areasResponse = $this->fetchDataFromApi($url . '/areas');
        $centersResponse = $this->fetchDataFromApi($url . '/training_centers');
        $areas = is_array($areasResponse) ? $areasResponse : [];
        $training_centers = is_array($centersResponse) ? $centersResponse : [];

        return view('teacher.edit', compact('teacher', 'areas', 'training_centers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'area_id' => 'required|integer',
            'training_center_id' => 'required|integer',
        ]);

        $url = env('URL_SERVER_API');
        Http::put($url . '/teachers/' . $id, $request->all())->throw();

        return redirect()->route('teacher.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/teachers/' . $id)->throw();

        return redirect()->route('teacher.index');
    }
}
