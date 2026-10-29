<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\ApprenticeController;
use app\Http\Controllers\OfertaController;
use App\Http\Controllers\FichaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('areas', [AreaController::class, 'index'])->name('api.v1.areas.index');
Route::post('areas', [AreaController::class, 'store'])->name('api.v1.areas.store');
Route::get('areas/{area}', [AreaController::class, 'show'])->name('api.v1.areas.show');
Route::put('areas/{area}', [AreaController::class, 'update'])->name('api.v1.area.update');
Route::delete('areas/{area}', [AreaController::class, 'destroy'])->name('api.v1.area.destroy');

Route::get('training_centers', [TrainingCenterController::class, 'index'])->name('api.v1.training_centers.index');
Route::post('training_centers', [TrainingCenterController::class, 'store'])->name('api.v1.training_centers.store');
Route::get('training_centers/{training_center}', [TrainingCenterController::class, 'show'])->name('api.v1.training_centers.show');
Route::put('training_centers/{training_center}', [TrainingCenterController::class, 'update'])->name('api.v1.training_center.update');
Route::delete('training_centers/{training_center}', [TrainingCenterController::class, 'destroy'])->name('api.v1.training_center.destroy');

Route::get('computers', [ComputerController::class, 'index'])->name('api.v1.computers.index');
Route::post('computers', [ComputerController::class, 'store'])->name('api.v1.computers.store');
Route::get('computers/{computer}', [ComputerController::class, 'show'])->name('api.v1.computers.show');
Route::put('computers/{computer}', [ComputerController::class, 'update'])->name('api.v1.computer.update');
Route::delete('computers/{computer}', [ComputerController::class, 'destroy'])->name('api.v1.computer.destroy');

Route::get('teachers', [TeacherController::class, 'index'])->name('api.v1.teachers.index');
Route::post('teachers', [TeacherController::class, 'admin'])->name('api.v1.teachers.admin');
Route::get('teachers/{teacher}', [TeacherController::class, 'show'])->name('api.v1.teachers.show');
Route::put('teachers/{teacher}', [TeacherController::class, 'update'])->name('api.v1.teacher.update');
Route::delete('teachers/{teacher}', [TeacherController::class, 'destroy'])->name('api.v1.teacher.destroy');

Route::get('apprentices', [ApprenticeController::class, 'index'])->name('api.v1.apprentices.index');
Route::post('apprentices', [ApprenticeController::class, 'store'])->name('api.v1.apprentices.admin');
Route::get('apprentices/{apprentice}', [ApprenticeController::class, 'show'])->name('api.v1.apprentices.show');
Route::put('apprentices/{apprentice}', [ApprenticeController::class, 'update'])->name('api.v1.apprentice.update');
Route::delete('apprentices/{apprentice}', [ApprenticeController::class, 'destroy'])->name('api.v1.apprentice.destroy');

Route::get('Oferta', [OfertaController::class, 'index'])->name('api.v1.oferta.index');
Route::post('Oferta', [OfertaController::class, 'admin'])->name('api.v1.oferta.admin');
Route::get('Oferta/{offer}', [OfertaController::class, 'show'])->name('api.v1.oferta.show');
Route::put('Oferta/{offer}', [OfertaController::class, 'update'])->name('api.v1.oferta.update');
Route::delete('Oferta/{offer}', [OfertaController::class, 'destroy'])->name('api.v1.oferta.destroy');

Route::get('Fichas', [FichaController::class, 'index'])->name('api.v1.fichas.index');
Route::post('Fichas', [FichaController::class, 'admin'])->name('api.v1.fichas.admin');
Route::get('Fichas/{ficha}', [FichaController::class, 'show'])->name('api.v1.fichas.show');
Route::put('Fichas/{ficha}', [FichaController::class, 'update'])->name('api.v1.fichas.update');
Route::delete('Fichas/{ficha}', [FichaController::class, 'destroy'])->name('api.v1.fichas.destroy');
