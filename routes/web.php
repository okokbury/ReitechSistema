<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EstoqueController;

Route::get('/usuarios', [UserController::class, 'index']);
Route::get('/usuarios/criarfuncionario', [UserController::class, 'create_funcionario']);
Route::get('/usuarios/criarcliente', [UserController::class, 'create_cliente']);

Route::get('/estoque', [EstoqueController::class, 'index']);

Route::get('/produtos', [ProductController::class, 'index']);
Route::get('/produtos/criar', [ProductController::class, 'create']);

Route::get('/', function () {
    return view('inicio');
});

Route::get('/homepage', function () {
    return view('homepage');
});