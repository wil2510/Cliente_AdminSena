<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Teacher;
use App\Models\Training_center;

class TeacherController extends Controller
{
    // ==========================================
    // LISTADO DE INSTRUCTORES
    // ==========================================
    public function index()
    {
        $teachers = Teacher::with(['area', 'training_center'])->get();

        return view('teacher.index', compact('teachers'));
    }


    // ==========================================
    // FORMULARIO PARA CREAR INSTRUCTOR
    // ==========================================
    public function create()
    {
        $areas = Area::all();

        $training_centers = Training_center::all();

        return view('teacher.create', compact(
            'areas',
            'training_centers'
        ));
    }


    // ==========================================
    // GUARDAR INSTRUCTOR
    // ==========================================
    public function admin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'area_id' => 'required|exists:areas,id',
            'training_center_id' => 'required|exists:training_centers,id',
        ]);

        Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'area_id' => $request->area_id,
            'training_center_id' => $request->training_center_id,
        ]);

        return redirect()
            ->route('teacher.index')
            ->with('success', 'Instructor registrado correctamente.');
    }


    // ==========================================
    // VER INSTRUCTOR
    // ==========================================
    public function show($id)
    {
        $teacher = Teacher::with([
            'area',
            'training_center'
        ])->findOrFail($id);

        return view('teacher.show', compact('teacher'));
    }


    // ==========================================
    // FORMULARIO EDITAR
    // ==========================================
    public function edit(Teacher $teacher)
    {
        $areas = Area::all();

        $training_centers = Training_center::all();

        return view('teacher.edit', compact(
            'teacher',
            'areas',
            'training_centers'
        ));
    }


    // ==========================================
    // ACTUALIZAR INSTRUCTOR
    // ==========================================
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'area_id' => 'required|exists:areas,id',
            'training_center_id' => 'required|exists:training_centers,id',
        ]);

        $teacher->update([
            'name' => $request->name,
            'email' => $request->email,
            'area_id' => $request->area_id,
            'training_center_id' => $request->training_center_id,
        ]);

        return redirect()
            ->route('teacher.index')
            ->with('success', 'Instructor actualizado correctamente.');
    }


    // ==========================================
    // ELIMINAR INSTRUCTOR
    // ==========================================
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()
            ->route('teacher.index')
            ->with('success', 'Instructor eliminado correctamente.');
    }
}