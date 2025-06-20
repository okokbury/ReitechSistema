@extends('layouts.main')

@section('title', 'Estoque')

@section('content')

<div class="container mt-4">
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Estoque de Produtos</h1>
    </div>

    <div class="card card-body mb-4">
        <form action="{{ route('products.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Buscar por nome ou código da peça..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-primary">Buscar</button>
        </form>
    </div>
    @php
        $products = $products ?? collect();
    @endphp

    @if(count($products) > 0)
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Imagem</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cód. Peça</th>
                        <th scope="col">Qtd.</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Fornecedor</th>
                        <th scope="col">Lote</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ações</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                @if($product->image)
                                    <img src="/img/products/{{ $product->image }}" alt="{{ $product->nome }}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                                @else
                                    <img src="/img/products/no_image.jpg" alt="Sem Imagem" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;"> 
                                @endif
                            </td>
                            <td>{{ $product->nome }}</td>
                            <td>{{ $product->codigo_peca }}</td>
                            <td>{{ $product->quantidade }}</td>
                            <td>R$ {{ number_format($product->preco/100, 2, ',', '.') }}</td>
                            <td>{{ $product->fornecedor }}</td>
                            <td>{{ $product->lote }}</td>
                            <td>{{ $product->productCategory->nome ?? 'Categoria não encontrada' }}</td>
                            <td>{{ Str::limit($product->descricao, 50) }}</td>
                            <td>
                                <a href="/produtos/edit/{{ $product->id }}" class="btn btn-info btn-sm me-2"><ion-icon name="create-outline"></ion-icon> Editar</a>
                                <form action="/produtos/{{ $product->id }}" method="POST" class="d-inline"> 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este produto?');"><ion-icon name="trash-outline"></ion-icon> Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-warning" role="alert">
            Nenhum produto cadastrado ainda.
        </div>
        <p><a href="/produtos/criar" class="btn btn-primary">Cadastrar Novo Produto</a></p>
    @endif

    <div class="mt-4">
        @if(method_exists($products, 'links'))
            {{ $products->links('pagination::bootstrap-5') }} 
        @endif
    </div>
</div>

@endsection