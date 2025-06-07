<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrdemServicoController;
use App\Http\Controllers\ProductCategoryController;

Route::get('/usuarios', [UserController::class, 'index']);
Route::get('/usuarios/criarfuncionario', [UserController::class, 'create_funcionario']);
Route::get('/usuarios/criarcliente', [UserController::class, 'create_cliente']);

Route::get('/ordemservico', [OrdemServicoController::class, 'index']);

Route::get('/produtos', [ProductController::class, 'index']);
Route::get('/produtos/criar', [ProductController::class, 'create']);
Route::post('/produtos', [ProductController::class, 'store']);

Route::get('/categorias', [ProductCategoryController::class, 'index']);
Route::get('/categorias/criar', [ProductCategoryController::class, 'create']);
Route::post('/categorias', [ProductCategoryController::class, 'store']);

Route::get('/', function () {
    return view('homepage');
});