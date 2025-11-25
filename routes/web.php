<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

// Categoria Routes
use App\Http\Controllers\CategoriaController;
Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
Route::post('/categoria', [CategoriaController::class, 'save'])->name('categoria.save');
Route::get('/categoria/{id}/edit', [CategoriaController::class, 'edit'])->name('categoria.edit');
Route::put('/categoria/{id}', [CategoriaController::class, 'update'])->name('categoria.update');
Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');

// Lote Routes
use App\Http\Controllers\LoteController;
Route::get('/lote', [LoteController::class, 'index'])->name('lote.index');
Route::get('/lote/create', [LoteController::class, 'create'])->name('lote.create');
Route::post('/lote', [LoteController::class, 'save'])->name('lote.save');
Route::get('/lote/{id}/edit', [LoteController::class, 'edit'])->name('lote.edit');
Route::put('/lote/{id}', [LoteController::class, 'update'])->name('lote.update');
Route::delete('/lote/{id}', [LoteController::class, 'destroy'])->name('lote.destroy');

