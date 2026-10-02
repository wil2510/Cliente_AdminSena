<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\AmbienteController;
use App\Http\Controllers\NoticiaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('home');})->name('home');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/auth', function () {return view('auth.login');})->name('login');
Route::get('/register', function () {return view('auth.register');})->name('register');

Route::get('area/create', [AreaController::class, 'create'])->name('area.create');
Route::post('area/admin', [AreaController::class, 'admin'])->name('area.admin');
Route::get('area/list', [AreaController::class, 'index'])->name('area.index');
Route::get('area/{id}', [AreaController::class, 'show'])->name('area.show');
Route::get('area/{area}/editar', [AreaController::class, 'edit'])->name('area.edit');
Route::put('area/{area}', [AreaController::class, 'update'])->name('area.update');
Route::delete('area/{area}', [AreaController::class, 'destroy'])->name('area.destroy');

Route::get('trainingcenter/create', [TrainingCenterController::class, 'create'])->name('trainingcenter.create');
Route::post('trainingcenter/admin', [TrainingCenterController::class, 'admin'])->name('trainingcenter.admin');
Route::get('trainingcenter/list', [TrainingCenterController::class, 'index'])->name('trainingcenter.index');
Route::get('trainingcenter/{id}', [TrainingCenterController::class, 'show'])->name('trainingcenter.show');
Route::get('trainingcenter/{trainingcenter}/editar', [TrainingCenterController::class, 'edit'])->name('trainingcenter.edit');
Route::put('trainingcenter/{trainingcenter}', [TrainingCenterController::class, 'update'])->name('trainingcenter.update');
Route::delete('trainingcenter/{trainingcenter}', [TrainingCenterController::class, 'destroy'])->name('trainingcenter.destroy');

Route::get('computer/create', [ComputerController::class, 'create'])->name('computer.create');
Route::post('computer/admin', [ComputerController::class, 'admin'])->name('computer.admin');
Route::get('computer/list', [ComputerController::class, 'index'])->name('computer.index');
Route::get('computer/{id}', [ComputerController::class, 'show'])->name('computer.show');
Route::get('computer/{computer}/editar', [ComputerController::class, 'edit'])->name('computer.edit');
Route::put('computer/{computer}', [ComputerController::class, 'update'])->name('computer.update');
Route::delete('computer/{computer}', [ComputerController::class, 'destroy'])->name('computer.destroy');

Route::get('course/create', [CourseController::class, 'create'])->name('course.create');
Route::post('course/store', [CourseController::class, 'store'])->name('course.store');
Route::get('course/list', [CourseController::class, 'index'])->name('course.index');
Route::get('course/{course}', [CourseController::class, 'show'])->name('course.show');
Route::get('course/{course}/editar', [CourseController::class, 'edit'])->name('course.edit');
Route::put('course/{course}', [CourseController::class, 'update'])->name('course.update');
Route::delete('course/{course}', [CourseController::class, 'destroy'])->name('course.destroy');

Route::get('teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
Route::post('teacher/admin', [TeacherController::class, 'admin'])->name('teacher.admin');
Route::get('teacher/list', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('teacher/{id}', [TeacherController::class, 'show'])->name('teacher.show');
Route::get('teacher/{teacher}/editar', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::put('teacher/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');
Route::delete('teacher/{teacher}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

Route::get('apprentice/create',[ApprenticeController::class, 'create'])->name('apprentice.create');
Route::post('apprentice/admin',[ApprenticeController::class, 'admin'])->name('apprentice.admin');
Route::get('apprentice/list',[ApprenticeController::class, 'index'])->name('apprentice.index');
Route::get('apprentice/{apprentice}',[ApprenticeController::class, 'show'])->name('apprentice.show');
Route::get('apprentice/{apprentice}/editar',[ApprenticeController::class, 'edit'])->name('apprentice.edit');
Route::put('apprentice/{apprentice}',[ApprenticeController::class, 'update'])->name('apprentice.update');
Route::delete('apprentice/{apprentice}',[ApprenticeController::class, 'destroy'])->name('apprentice.destroy');

Route::get('area/create',[AreaController::class, 'create'])->name('area.create');
Route::post('area/admin',[AreaController::class, 'admin'])->name('area.admin');
Route::get('area/list',[AreaController::class, 'index'])->name('area.index');
Route::get('area/{area}',[AreaController::class, 'show'])->name('area.show');
Route::get('area/{area}/editar',[AreaController::class, 'edit'])->name('area.edit');
Route::put('area/{area}',[AreaController::class, 'update'])->name('area.update');
Route::delete('area/{area}',[AreaController::class, 'destroy'])->name('area.destroy');

Route::get('teacher/create',[TeacherController::class, 'create'])->name('teacher.create');
Route::post('teacher/admin',[TeacherController::class, 'admin'])->name('teacher.admin');
Route::get('teacher/list',[TeacherController::class, 'index'])->name('teacher.index');
Route::get('teacher/{teacher}',[TeacherController::class, 'show'])->name('teacher.show');
Route::get('teacher/{teacher}/editar',[TeacherController::class, 'edit'])->name('teacher.edit');
Route::put('teacher/{teacher}',[TeacherController::class, 'update'])->name('teacher.update');
Route::delete('teacher/{teacher}',[TeacherController::class, 'destroy'])->name('teacher.destroy');

Route::get('trainingcenter/create',[TrainingCenterController::class, 'create'])->name('trainingcenter.create');
Route::post('trainingcenter/admin',[TrainingCenterController::class, 'admin'])->name('trainingcenter.admin');
Route::get('trainingcenter/list',[TrainingCenterController::class, 'index'])->name('trainingcenter.index');
Route::get('trainingcenter/{trainingcenter}',[TrainingCenterController::class, 'show'])->name('trainingcenter.show');
Route::get('trainingcenter/{trainingcenter}/editar',[TrainingCenterController::class, 'edit'])->name('trainingcenter.edit');
Route::put('trainingcenter/{trainingcenter}',[TrainingCenterController::class, 'update'])->name('trainingcenter.update');
Route::delete('trainingcenter/{trainingcenter}',[TrainingCenterController::class, 'destroy'])->name('trainingcenter.destroy');

Route::get('course/create',[CourseController::class, 'create'])->name('course.create');
Route::post('course/admin',[CourseController::class, 'admin'])->name('course.admin');
Route::get('course/list',[CourseController::class, 'index'])->name('course.index');
Route::get('course/{course}',[CourseController::class, 'show'])->name('course.show');
Route::get('course/{course}/editar',[CourseController::class, 'edit'])->name('course.edit');
Route::put('course/{course}',[CourseController::class, 'update'])->name('course.update');
Route::delete('course/{course}',[CourseController::class, 'destroy'])->name('course.destroy');

Route::get('apprentice/create',[ApprenticeController::class, 'create'])->name('apprentice.create');
Route::post('apprentice/admin',[ApprenticeController::class, 'admin'])->name('apprentice.admin');
Route::get('apprentice/list',[ApprenticeController::class, 'index'])->name('apprentice.index');
Route::get('apprentice/{apprentice}',[ApprenticeController::class, 'show'])->name('apprentice.show');
Route::get('apprentice/{apprentice}/editar',[ApprenticeController::class, 'edit'])->name('apprentice.edit');
Route::put('apprentice/{apprentice}',[ApprenticeController::class, 'update'])->name('apprentice.update');
Route::delete('apprentice/{apprentice}',[ApprenticeController::class, 'destroy'])->name('apprentice.destroy');

Route::get('computer/create',[ComputerController::class, 'create'])->name('computer.create');
Route::post('computer/admin',[ComputerController::class, 'admin'])->name('computer.admin');
Route::get('computer/list',[ComputerController::class, 'index'])->name('computer.index');
Route::get('computer/{computer}',[ComputerController::class, 'show'])->name('computer.show');
Route::get('computer/{computer}/editar',[ComputerController::class, 'edit'])->name('computer.edit');
Route::put('computer/{computer}',[ComputerController::class, 'update'])->name('computer.update');
Route::delete('computer/{computer}',[ComputerController::class, 'destroy'])->name('computer.destroy');

Route::get('programa/create',[ProgramaController::class, 'create'])->name('programa.create');
Route::post('programa/admin',[ProgramaController::class, 'store'])->name('programa.store');
Route::get('programa/list',[ProgramaController::class, 'index'])->name('programa.index');
Route::get('programa/{programa}',[ProgramaController::class, 'show'])->name('programa.show');
Route::get('programa/{programa}/editar',[ProgramaController::class, 'edit'])->name('programa.edit');
Route::put('programa/{programa}',[ProgramaController::class, 'update'])->name('programa.update');
Route::delete('programa/{programa}',[ProgramaController::class, 'destroy'])->name('programa.destroy');

Route::get('oferta/create',[OfertaController::class, 'create'])->name('oferta.create');
Route::post('oferta/admin',[OfertaController::class, 'store'])->name('oferta.store');
Route::get('oferta/list',[OfertaController::class, 'index'])->name('oferta.index');
Route::get('oferta/{oferta}',[OfertaController::class, 'show'])->name('oferta.show');
Route::get('oferta/{oferta}/editar',[OfertaController::class, 'edit'])->name('oferta.edit');
Route::put('oferta/{oferta}',[OfertaController::class, 'update'])->name('oferta.update');
Route::delete('oferta/{oferta}',[OfertaController::class, 'destroy'])->name('oferta.destroy');

Route::get('ficha/create',[FichaController::class, 'create'])->name('ficha.create');
Route::post('ficha/admin',[FichaController::class, 'store'])->name('ficha.store');
Route::get('ficha/list',[FichaController::class, 'index'])->name('ficha.index');
Route::get('ficha/{ficha}',[FichaController::class, 'show'])->name('ficha.show');
Route::get('ficha/{ficha}/editar',[FichaController::class, 'edit'])->name('ficha.edit');
Route::put('ficha/{ficha}',[FichaController::class, 'update'])->name('ficha.update');
Route::delete('ficha/{ficha}',[FichaController::class, 'destroy'])->name('ficha.destroy');

Route::get('ambiente/create',[AmbienteController::class, 'create'])->name('ambiente.create');
Route::post('ambiente/admin',[AmbienteController::class, 'store'])->name('ambiente.store');
Route::get('ambiente/list',[AmbienteController::class, 'index'])->name('ambiente.index');
Route::get('ambiente/{ambiente}',[AmbienteController::class, 'show'])->name('ambiente.show');
Route::get('ambiente/{ambiente}/editar',[AmbienteController::class, 'edit'])->name('ambiente.edit');
Route::put('ambiente/{ambiente}',[AmbienteController::class, 'update'])->name('ambiente.update');
Route::delete('ambiente/{ambiente}',[AmbienteController::class, 'destroy'])->name('ambiente.destroy');

Route::get('noticia/create',[NoticiaController::class, 'create'])->name('noticia.create');
Route::post('noticia/admin',[NoticiaController::class, 'store'])->name('noticia.store');
Route::get('noticia/list',[NoticiaController::class, 'index'])->name('noticia.index');
Route::get('noticia/{noticia}',[NoticiaController::class, 'show'])->name('noticia.show');
Route::get('noticia/{noticia}/editar',[NoticiaController::class, 'edit'])->name('noticia.edit');
Route::put('noticia/{noticia}',[NoticiaController::class, 'update'])->name('noticia.update');
Route::delete('noticia/{noticia}',[NoticiaController::class, 'destroy'])->name('noticia.destroy');