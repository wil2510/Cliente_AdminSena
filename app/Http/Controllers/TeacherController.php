<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        return $this->requestApi($url);
    }

    public function index()   //http://api.codersfree.test/v1/teachers?included=posts
    {

        $url = env('URL_SERVER_API');

        $teachers = $this->apiCollection($this->fetchDataFromApi($url . '/teachers'));
        return view('teacher.index', compact('teachers'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');

        $teachers = $this->apiRecord($this->fetchDataFromApi($url . '/teachers/' . $id));

        if ($teachers === []) {
            return $this->missingApiRecord('teacher.index');
        }

        return view('teacher.show', compact('teachers'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $areas = $this->apiCollection($this->fetchDataFromApi($url . '/areas'));
        $trainingcenters = $this->apiCollection($this->fetchDataFromApi($url . '/trainingcenters'));

        return view('teacher.create', compact('areas', 'trainingcenters'));
    }

    public function admin(Request $request)
    {
        $url = env('URL_SERVER_API');

        if (!$this->createApiRecord($url . '/teachers', $request->except(['_token', '_method']))) {
            return back()->withInput();
        }

        return redirect()->route('teacher.index')->with('status', 'Instructor creado correctamente.');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $teacher = $this->apiRecord($this->fetchDataFromApi($url . '/teachers/' . $id));

        if ($teacher === []) {
            return $this->missingApiRecord('teacher.index');
        }

        $areas = $this->apiCollection($this->fetchDataFromApi($url . '/areas'));
        $trainingcenters = $this->apiCollection($this->fetchDataFromApi($url . '/trainingcenters'));
        
        return view('teacher.edit', compact('teacher', 'areas', 'trainingcenters'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/teachers/' . $id, $request->except(['_token', '_method']))->throw();

        return redirect()->route('teacher.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/teachers/' . $id)->throw();
        return redirect()->route('teacher.index');
    }
}