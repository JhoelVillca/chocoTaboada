<?php

use Illuminate\Support\Facades\Route;

// Public Shop Routes
use App\Http\Controllers\ShopController;
Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/producto/{slug}', [ShopController::class, 'show'])->name('shop.show');
Route::get('/cart', [ShopController::class, 'viewCart'])->name('shop.cart');
Route::get('/cart/add/{id}', [ShopController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/clear', [ShopController::class, 'clearCart'])->name('cart.clear');

// Dashboard Route
use App\Http\Controllers\DashboardController;
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

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

// Producto Routes
use App\Http\Controllers\ProductoController;
Route::get('/producto', [ProductoController::class, 'index'])->name('producto.index');
Route::get('/producto/create', [ProductoController::class, 'create'])->name('producto.create');
Route::post('/producto', [ProductoController::class, 'save'])->name('producto.save');
Route::get('/producto/{id}/edit', [ProductoController::class, 'edit'])->name('producto.edit');
Route::put('/producto/{id}', [ProductoController::class, 'update'])->name('producto.update');
Route::delete('/producto/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');

// Pedido Routes
use App\Http\Controllers\PedidoController;
Route::get('/pedido', [PedidoController::class, 'index'])->name('pedido.index');
Route::get('/pedido/create', [PedidoController::class, 'create'])->name('pedido.create');
Route::post('/pedido', [PedidoController::class, 'save'])->name('pedido.save');
Route::get('/pedido/{id}', [PedidoController::class, 'show'])->name('pedido.show');

