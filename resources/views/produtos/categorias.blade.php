@extends('layouts.main')

@section('title', 'Categorias de Produtos')

@section('content')

<div class="container mt-4">
    
    <!-- Cabeçalho da Página -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Categorias de Produtos</h1>
        {{-- O link agora aponta para a rota de criação de categoria --}}
        <a href="/categorias/criar" class="btn btn-primary">
            <ion-icon name="add-outline" class="align-middle"></ion-icon>
            Cadastrar Nova Categoria
        </a>
    </div>

    @php
        $categories = $categorias ?? collect();
    @endphp

    @if(count($categories) > 0)
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        {{-- Cabeçalho simplificado --}}
                        <th scope="col">ID</th>
                        <th scope="col">Nome da Categoria</th>
                        <th scope="col" class="text-end">Ações</th> 
                    </tr>
                </thead>
                <tbody>
                    {{-- Loop na variável $categories --}}
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->nome }}</td>
                            
                            {{-- Célula de ações alinhada à direita --}}
                            <td class="text-end">
                                {{-- Mantemos apenas o formulário de exclusão --}}
                                <form action="/categorias/{{ $category->id }}" method="POST" class="d-inline"> 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta categoria? A exclusão pode falhar se houver produtos associados a ela.');">
                                        <ion-icon name="trash-outline"></ion-icon> Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        {{-- Mensagem de "nenhum item" atualizada --}}
        <div class="alert alert-warning" role="alert">
            Nenhuma categoria cadastrada ainda.
        </div>
    @endif

    {{-- Paginação --}}
    <div class="mt-4">
        @if(method_exists($categories, 'links'))
            {{ $categories->links('pagination::bootstrap-5') }} 
        @endif
    </div>
</div>

@endsection