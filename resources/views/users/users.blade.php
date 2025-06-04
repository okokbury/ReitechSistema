@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<h1>Usuarios</h1>

<button class="botao-padrao">
    <a href="/usuarios/criarfuncionario" class="link-botao">Cadastrar Funcionario</a>
</button>

<button class="botao-padrao">
    <a href="/usuarios/criarcliente" class="link-botao">Cadastrar Cliente</a>
</button>

@endsection