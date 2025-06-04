@extends('layouts.main')

@section('title', 'Criar Produto')

@section('content')

<h1>lista produtos</h1>

<button class="botao-padrao">
    <a href="/produtos/criar" class="link-botao">Criar Produto</a>
</button>

@foreach($products as $produto)
    <p>{{ $produto->nome }} -- {{ $produto->preco }} -- {{ $produto->quantidade }} -- {{ $produto->descricao }}</p> 
@endforeach


@endsection