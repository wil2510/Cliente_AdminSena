<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Course;
use App\Models\Training_center;

class CourseController extends Controller
{
    // ==========================================
    // LISTADO DE CURSOS
    // ==========================================
    public function index()
    {
        $courses = Course::with([
            'area',
            'trainingCenter'
        ])->get();

        return view('course.index', compact('courses'));
    }


    // ==========================================
    // FORMULARIO CREAR CURSO
    // ==========================================
    public function create()
    {
        $areas = Area::all();

        $training_centers = Training_center::all();

        return view('course.create', compact(
            'areas',
            'training_centers'
        ));
    }


    // ==========================================
    // GUARDAR CURSO
    // ==========================================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',

            'code' => 'required|string|max:50|unique:courses,code',

            'area_id' => 'required|exists:areas,id',

            'training_center_id' =>
                'required|exists:training_centers,id',
        ]);


        Course::create([
            'name' => $request->name,

            'code' => $request->code,

            'area_id' => $request->area_id,

            'training_center_id' =>
                $request->training_center_id,
        ]);


        return redirect()
            ->route('course.index')
            ->with(
                'success',
                'Curso creado exitosamente.'
            );
    }


    // ==========================================
    // VER CURSO
    // ==========================================
    public function show(Course $course)
    {
        $course->load([
            'area',
            'trainingCenter'
        ]);

        return view('course.show', compact('course'));
    }


    // ==========================================
    // EDITAR CURSO
    // ==========================================
    public function edit(Course $course)
    {
        $areas = Area::all();

        $training_centers = Training_center::all();

        return view(
            'course.edit',
            compact(
                'course',
                'areas',
                'training_centers'
            )
        );
    }


    // ==========================================
    // ACTUALIZAR CURSO
    // ==========================================
    public function update(
        Request $request,
        Course $course
    ) {
        $request->validate([
            'name' =>
                'required|string|max:255',

            'code' =>
                'required|string|max:50|unique:courses,code,' . $course->id,

            'area_id' =>
                'required|exists:areas,id',

            'training_center_id' =>
                'required|exists:training_centers,id',
        ]);


        $course->update([
            'name' => $request->name,

            'code' => $request->code,

            'area_id' => $request->area_id,

            'training_center_id' =>
                $request->training_center_id,
        ]);


        return redirect()
            ->route('course.index')
            ->with(
                'success',
                'Curso actualizado exitosamente.'
            );
    }


    // ==========================================
    // ELIMINAR CURSO
    // ==========================================
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('course.index')
            ->with(
                'success',
                'Curso eliminado exitosamente.'
            );
    }
}