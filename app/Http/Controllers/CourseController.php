<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()   //http://api.codersfree.test/v1/courses?included=posts
    {

        $url = env('URL_SERVER_API');

        $courses = $this->fetchDataFromApi($url . '/courses');
        return view('course.index', compact('courses'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');

        $courses = $this->fetchDataFromApi($url . '/courses/' . $id);

        return view('course.show', compact('courses'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $areas = Http::get($url . '/areas')->json();
        $trainingcenters = Http::get($url . '/trainingcenters')->json();

        return view('course.create', compact('areas', 'trainingcenters'));
    }

    public function admin(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/courses', $request->all());

        return redirect()->route('course.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $areas = Http::get($url . '/areas')->json();
        $trainingcenters = Http::get($url . '/trainingcenters')->json();
        $course = $this->fetchDataFromApi($url . '/courses/' . $id);
        
        return view('course.edit', compact('course', 'areas', 'trainingcenters'));
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