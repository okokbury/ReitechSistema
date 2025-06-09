@extends('layouts.main')

@section('title', 'Editar Ordem')

    {{-- Scripts --}}
    <link rel="stylesheet" href="{{ asset('css/produtoscriar.css') }}">

@section('content')

<div class="container-homepage">
    <div id="event-create-container">
        <h1>Editando a Ordem de Serviço Nº: {{ $ordemservico->id }}</h1>
        
        <form action="{{ route('ordem.update', $ordemservico->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="id_produto" class="form-label">Produto:</label>
                <select name="id_produto" id="id_produto" class="form-control">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ $ordemservico->id_produto == $product->id ? 'selected' : '' }}>
                            {{ $product->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="id_responsavel" class="form-label">Responsável:</label>
                <select name="id_responsavel" id="id_responsavel" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $ordemservico->id_responsavel == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="tipo_servico" class="form-label">Tipo de Serviço:</label>
                <input type="text" class="form-control" id="tipo_servico" name="tipo_servico" value="{{ $ordemservico->tipo_servico }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="valor_servico" class="form-label">Valor do Serviço:</label>
                <div class="input-group">
                    <span class="input-group-text">R$</span>
                    <input type="number" class="form-control" id="valor_servico" name="valor_servico" value="{{ $ordemservico->valor_servico / 100 }}" required min="0" step=".01">
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="data_emissao" class="form-label">Data de Emissão:</label>
                <input type="date" class="form-control" id="data_emissao" name="data_emissao" value="{{ $ordemservico->data_emissao }}" readonly>
            </div>
            
            <div class="form-group mb-3">
                <label for="data_entrega" class="form-label">Data de Entrega:</label>
                <input type="date" class="form-control" id="data_entrega" name="data_entrega" value="{{ $ordemservico->data_entrega }}">
            </div>

            <div class="form-group mb-3">
                <label for="descricao" class="form-label">Descrição do Serviço:</label>
                <textarea name="descricao" id="descricao" class="form-control" required>{{ $ordemservico->descricao }}</textarea>
            </div>
            
            <input type="submit" class="btn btn-primary" value="Salvar Alterações">
        </form>
    </div>
</div>

@endsection