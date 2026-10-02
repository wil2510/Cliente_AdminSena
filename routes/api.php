<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\ComputerController;

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
Route::put('training_centerss/{training_center}', [TrainingCenterController::class, 'update'])->name('api.v1.training_center.update');
Route::delete('training_centers/{training_center}', [TrainingCenterController::class, 'destroy'])->name('api.v1.training_center.destroy');

Route::get('computers', [ComputerController::class, 'index'])->name('api.v1.computers.index');
Route::post('computers', [ComputerController::class, 'store'])->name('api.v1.computers.store');
Route::get('computers/{computer}', [ComputerController::class, 'show'])->name('api.v1.computers.show');
Route::put('computers/{computer}', [ComputerController::class, 'update'])->name('api.v1.computer.update');
Route::delete('computers/{computer}', [ComputerController::class, 'destroy'])->name('api.v1.computer.destroy');
