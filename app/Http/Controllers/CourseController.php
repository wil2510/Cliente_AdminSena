<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $response = $this->fetchDataFromApi($url . '/courses');
        $courses = is_array($response) ? $response : [];
        return view('course.index', compact('courses'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');
        $course = $this->fetchDataFromApi($url . '/courses/' . $id);
        return view('course.show', compact('course'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $areasResponse = $this->fetchDataFromApi($url . '/areas');
        $trainingCentersResponse = $this->fetchDataFromApi($url . '/training-centers');
        $areas = is_array($areasResponse) ? $areasResponse : [];
        $training_centers = is_array($trainingCentersResponse) ? $trainingCentersResponse : [];

        return view('course.create', compact('areas', 'training_centers'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');
        Http::post($url . '/courses', $request->all());
        return redirect()->route('course.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        
        $course = $this->fetchDataFromApi($url . '/courses/' . $id);
        $areasResponse = $this->fetchDataFromApi($url . '/areas');
        $trainingCentersResponse = $this->fetchDataFromApi($url . '/training-centers');

        $areas = is_array($areasResponse) ? $areasResponse : [];
        $training_centers = is_array($trainingCentersResponse) ? $trainingCentersResponse : [];

        return view('course.edit', compact('course', 'areas', 'training_centers'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/courses/' . $id, $request->all());
        return redirect()->route('course.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/courses/' . $id);
        return redirect()->route('course.index');
    }
}