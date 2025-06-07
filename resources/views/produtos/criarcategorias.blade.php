@extends('layouts.main')

@section('title', 'Criar Produto')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Criar categoria.</h1>
    <form action="/categorias" method="POST">
        @csrf
    <div class="form-group">
        <label for="titulo">Nome da Categoria:</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da categoria" required>
    </div>
    <input type="submit" class="btn btn-primary" value="Cadastrar Categoria">
    </form>
</div>

@endsection