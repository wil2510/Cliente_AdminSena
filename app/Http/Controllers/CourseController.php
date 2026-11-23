<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        return $this->requestApi($url);
    }

    public function index()   //http://api.codersfree.test/v1/courses?included=posts
    {

        $url = env('URL_SERVER_API');

        $courses = $this->apiCollection($this->fetchDataFromApi($url . '/courses'));
        return view('course.index', compact('courses'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');

        $courses = $this->apiRecord($this->fetchDataFromApi($url . '/courses/' . $id));

        if ($courses === []) {
            return $this->missingApiRecord('course.index');
        }

        return view('course.show', compact('courses'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $areas = $this->apiCollection($this->fetchDataFromApi($url . '/areas'));
        $trainingcenters = $this->apiCollection($this->fetchDataFromApi($url . '/trainingcenters'));

        return view('course.create', compact('areas', 'trainingcenters'));
    }

    public function admin(Request $request)
    {
        $url = env('URL_SERVER_API');

        if (!$this->createApiRecord($url . '/courses', $request->except(['_token', '_method']))) {
            return back()->withInput();
        }

        return redirect()->route('course.index')->with('status', 'Curso creado correctamente.');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $course = $this->apiRecord($this->fetchDataFromApi($url . '/courses/' . $id));

        if ($course === []) {
            return $this->missingApiRecord('course.index');
        }

        $areas = $this->apiCollection($this->fetchDataFromApi($url . '/areas'));
        $trainingcenters = $this->apiCollection($this->fetchDataFromApi($url . '/trainingcenters'));
        
        return view('course.edit', compact('course', 'areas', 'trainingcenters'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/courses/' . $id, $request->except(['_token', '_method']))->throw();

        return redirect()->route('course.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/courses/' . $id)->throw();
        return redirect()->route('course.index');
    }
}