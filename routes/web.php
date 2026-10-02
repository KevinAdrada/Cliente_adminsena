<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TrainingCenterController;



Route::get('/', function () {
    return view('home');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');


Route::get('/areas', [AreaController::class, 'index'])->name('area.index');
Route::get('/areas/create', [AreaController::class, 'create'])->name('area.create');
Route::post('/areas', [AreaController::class, 'store'])->name('area.store');
Route::get('/areas/{id}', [AreaController::class, 'show'])->name('area.show');
Route::get('/areas/{id}/edit', [AreaController::class, 'edit'])->name('area.edit');
Route::put('/areas/{id}', [AreaController::class, 'update'])->name('area.update');
Route::delete('/areas/{id}', [AreaController::class, 'destroy'])->name('area.destroy');

Route::get('/computers', [ComputerController::class, 'index'])->name('computer.index');
Route::get('/computers/create', [ComputerController::class, 'create'])->name('computer.create');
Route::post('/computers', [ComputerController::class, 'store'])->name('computer.store');
Route::get('/computers/{id}', [ComputerController::class, 'show'])->name('computer.show');
Route::get('/computers/{id}/edit', [ComputerController::class, 'edit'])->name('computer.edit');
Route::put('/computers/{id}', [ComputerController::class, 'update'])->name('computer.update');
Route::delete('/computers/{id}', [ComputerController::class, 'destroy'])->name('computer.destroy');

Route::get('/training_centers', [TrainingCenterController::class, 'index'])->name('training_center.index');
Route::get('/training_centers/create', [TrainingCenterController::class, 'create'])->name('training_center.create');
Route::post('/training_centers', [TrainingCenterController::class, 'store'])->name('training_center.store');
Route::get('/training_centers/{id}', [TrainingCenterController::class, 'show'])->name('training_center.show');
Route::get('/training_centers/{id}/edit', [TrainingCenterController::class, 'edit'])->name('training_center.edit');
Route::put('/training_centers/{id}', [TrainingCenterController::class, 'update'])->name('training_center.update');
Route::delete('/training_centers/{id}', [TrainingCenterController::class, 'destroy'])->name('training_center.destroy');
