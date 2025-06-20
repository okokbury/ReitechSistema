@extends('layouts.main')

@section('title', 'Editar Produto')

    {{-- Scripts --}}
    <link rel="stylesheet" href="{{ asset('css/produtoscriar.css') }}">

@section('content')

<div class="container-homepage">
    <div id="event-create-container">
        <h1>Editando o Produto: {{ $product->nome }}</h1>
        <form action="/produtos/{{ $product->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">Nome do Produto:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Produto" value="{{ $product->nome }}" required>
        </div>
        <div class="form-group">
            <label for="titulo">Codigo:</label>
            <input type="text" class="form-control" id="codigo_peca" name="codigo_peca" placeholder="Codigo da Peça" value="{{ $product->codigo_peca }}" required>
        </div>
        <div class="form-group">
            <label for="titulo">Quantidade Un:</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade de Items (Unitaria)" value="{{ $product->quantidade }}" required>
        </div>
            <div class="form-group">
                <label for="titulo">Preço:</label>
                <div class=" input-group mb-3"> <span class="input-group-text" id="basic-addon1">R$</span>
                <input type="number" class="form-control" id="preco" name="preco" placeholder="3.99" required min="0" step=".01" value="{{ $product->preco/100 }}" aria-label="Preço" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="form-group">
        <label for="categoria">Categoria:</label>
        <select name="categoria" id="categoria" class="form-control">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->categoria == $category->id ? 'selected' : '' }}>
                    {{ $category->nome }}
                </option>
            @endforeach
        </select>
    </div>
        <div class="form-group">
            <label for="titulo">Lote:</label>
            <input type="number" class="form-control" id="lote" name="lote" placeholder="Codigo do Lote" value="{{ $product->lote }}" required>
        </div>
        <div class="form-group">
            <label for="titulo">Fornecedor:</label>
            <input type="text" class="form-control" id="fornecedor" name="fornecedor" placeholder="Codigo do Fornecedor" value="{{ $product->fornecedor }}" required>
        </div>
        <div class="form-group span9">
            <label for="titulo">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control" placeholder="Digite a descrição do produto." maxlength="1000">{{ $product->descricao }}</textarea>
        </div>
        <div class="form-group span9">
            <br>
        <input type="submit" class="btn btn-primary" value="Enviar Edição">
        </div>
        </form>
    </div>
</div>


@endsection