<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrdemServicoController;
use App\Http\Controllers\ProductCategoryController;

Route::get('/usuarios', [UserController::class, 'index']);

Route::get('/ordemservico', [OrdemServicoController::class, 'index']);
Route::get('/ordemservico/criar', [OrdemServicoController::class, 'create']);
Route::post('/ordemservico', [OrdemServicoController::class, 'store']);
Route::get('/ordemservico/edit/{id}', [OrdemServicoController::class, 'edit'])->name('ordem.edit');
Route::put('/ordemservico/{id}', [OrdemServicoController::class, 'update'])->name('ordem.update');
Route::delete('/ordemservico/{id}', [OrdemServicoController::class, 'destroy'])->name('ordem.destroy');

Route::get('/produtos', [ProductController::class, 'index']);
Route::get('/produtos/criar', [ProductController::class, 'create']);
Route::post('/produtos', [ProductController::class, 'store']);
Route::get('/produtos/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/produtos/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/produtos/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/categorias', [ProductCategoryController::class, 'index']);
Route::get('/categorias/criar', [ProductCategoryController::class, 'create']);
Route::post('/categorias', [ProductCategoryController::class, 'store']);
Route::delete('/categorias/{id}', [ProductCategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
    return view('homepage');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
    return view('homepage');
    });
});
