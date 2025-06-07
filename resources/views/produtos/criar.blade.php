@extends('layouts.main')

@section('title', 'Criar Produto')

    {{-- Scripts --}}
    <link rel="stylesheet" href="{{ asset('css/produtoscriar.css') }}">

@section('content')

<div class="container-homepage">
    <div id="event-create-container">
        <h1>Cadastrar Produto Novo</h1>
        <form action="/produtos" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem do Produto:</label>
            <input type="file" class="form-control-file" id="image" name="image" placeholder="Nome do Produto">
        </div>
        <div class="form-group">
            <label for="titulo">Nome do Produto:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Produto" required>
        </div>
        <div class="form-group">
            <label for="titulo">Codigo:</label>
            <input type="text" class="form-control" id="codigo_peca" name="codigo_peca" placeholder="Codigo da Peça" required>
        </div>
        <div class="form-group">
            <label for="titulo">Quantidade Un:</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade de Items (Unitaria)" required>
        </div>
            <div class="form-group">
                <label for="titulo">Preço:</label>
                <div class=" input-group mb-3"> <span class="input-group-text" id="basic-addon1">R$</span>
                <input type="number" class="form-control" id="preco" name="preco" placeholder="3.99" required min="0" step=".01" aria-label="Preço" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="form-group span9">
            <label for="titulo">Categoria:</label>
            <select name="categoria" id="categoria" class="form-control">
                <option value="" disabled selected>Selecione uma categoria para a peça/produto</option>
                @foreach($categories as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Lote:</label>
            <input type="number" class="form-control" id="lote" name="lote" placeholder="Codigo do Lote" required>
        </div>
        <div class="form-group">
            <label for="titulo">Fornecedor:</label>
            <input type="text" class="form-control" id="fornecedor" name="fornecedor" placeholder="Codigo do Fornecedor" required>
        </div>
        <div class="form-group span9">
            <label for="titulo">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control" placeholder="Digite a descrição do produto." maxlength="1000"></textarea>
        </div>
        <div class="form-group span9">
            <br>
        <input type="submit" class="btn btn-primary" value="Cadastrar Produto">
        </div>
        </form>
    </div>
</div>


@endsection