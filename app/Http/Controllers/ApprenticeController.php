<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprentice;
use App\Models\Course;
use App\Models\Computer;

class ApprenticeController extends Controller
{
    // =====================================================
    // LISTAR APRENDICES
    // =====================================================
    public function index()
    {
        $apprentices = Apprentice::with([
            'course',
            'computer'
        ])->get();

        return view('apprentice.index', compact(
            'apprentices'
        ));
    }


    // =====================================================
    // FORMULARIO PARA CREAR APRENDIZ
    // =====================================================
    public function create()
    {
        $courses = Course::all();

        $computers = Computer::all();

        return view('apprentice.create', compact(
            'courses',
            'computers'
        ));
    }


    // =====================================================
    // GUARDAR APRENDIZ
    // =====================================================
    public function admin(Request $request)
    {
        $request->validate([

            'name' =>
                'required|string|max:255',

            'email' =>
                'required|email|max:255',

            'cell_number' =>
                'required|string|max:20',

            'course_id' =>
                'required|exists:courses,id',

            'computer_id' =>
                'required|exists:computers,id',

        ]);


        Apprentice::create([

            'name' =>
                $request->name,

            'email' =>
                $request->email,

            'cell_number' =>
                $request->cell_number,

            'course_id' =>
                $request->course_id,

            'computer_id' =>
                $request->computer_id,

        ]);


        return redirect()
            ->route('apprentice.index')
            ->with(
                'success',
                'Aprendiz registrado exitosamente.'
            );
    }


    // =====================================================
    // MOSTRAR APRENDIZ
    // =====================================================
    public function show(Apprentice $apprentice)
    {
        $apprentice->load([
            'course',
            'computer'
        ]);

        return view(
            'apprentice.show',
            compact('apprentice')
        );
    }


    // =====================================================
    // FORMULARIO EDITAR
    // =====================================================
    public function edit(Apprentice $apprentice)
    {
        $courses = Course::all();

        $computers = Computer::all();

        return view(
            'apprentice.edit',
            compact(
                'apprentice',
                'courses',
                'computers'
            )
        );
    }


    // =====================================================
    // ACTUALIZAR APRENDIZ
    // =====================================================
    public function update(
        Request $request,
        Apprentice $apprentice
    ) {
        $request->validate([

            'name' =>
                'required|string|max:255',

            'email' =>
                'required|email|max:255',

            'cell_number' =>
                'required|string|max:20',

            'course_id' =>
                'required|exists:courses,id',

            'computer_id' =>
                'required|exists:computers,id',

        ]);


        $apprentice->update([

            'name' =>
                $request->name,

            'email' =>
                $request->email,

            'cell_number' =>
                $request->cell_number,

            'course_id' =>
                $request->course_id,

            'computer_id' =>
                $request->computer_id,

        ]);


        return redirect()
            ->route('apprentice.index')
            ->with(
                'success',
                'Aprendiz actualizado exitosamente.'
            );
    }


    // =====================================================
    // ELIMINAR APRENDIZ
    // =====================================================
    public function destroy(Apprentice $apprentice)
    {
        $apprentice->delete();

        return redirect()
            ->route('apprentice.index')
            ->with(
                'success',
                'Aprendiz eliminado exitosamente.'
            );
    }
}