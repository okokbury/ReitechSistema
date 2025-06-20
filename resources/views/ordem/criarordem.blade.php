@extends('layouts.main')

@section('title', 'Criar Ordem de Serviço')

    {{-- Scripts --}}
    <link rel="stylesheet" href="{{ asset('css/produtoscriar.css') }}">

@section('content')

<div class="container-homepage">
    <div id="event-create-container">
        <h1>Cadastrar Ordem de Serviço</h1>
        <form action="/ordemservico" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group span9">
            <label for="titulo">Produto:</label>
            <select name="id_produto" id="id_produto" class="form-control">
                <option value="" disabled selected>Selecione um produto para a Ordem de Serviço</option>
                @foreach($products as $product)
                <option value="{{ $product->id }}" data-codigo="{{ $product->codigo_peca }}">{{ $product->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Codigo:</label>
            <input type="text" class="form-control" id="codigo_peca" name="codigo_peca" placeholder="Selecione um produto acima" required readonly>
        </div>
        <div class="form-group span9">
            <label for="titulo">Responsavel:</label>
            <select name="id_responsavel" id="id_responsavel" class="form-control">
                <option value="" disabled selected>Selecione um usuario responsavel pelo serviço</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
            <div class="form-group">
                <label for="titulo">Preço:</label>
                <div class=" input-group mb-3"> <span class="input-group-text" id="basic-addon1">R$</span>
                <input type="number" class="form-control" id="valor_servico" name="valor_servico" placeholder="120,99" required min="0" step=".01" aria-label="Preço" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="form-group">
            <label for="titulo">Data da Emissão:</label>
            <input type="date" class="form-control" id="data_emissao" name="data_emissao" required>
        </div>
        <div class="form-group">
            <label for="titulo">Data da Entrega:</label>
            <input type="date" class="form-control" id="data_entrega" name="data_entrega" required>
        </div>
        <div class="form-group">
            <label for="titulo">Tipo de Serviço:</label>
            <input type="text" name="tipo_servico" class="form-control" id="tipo_servico" placeholder="Digite o tipo de serviço"  required>
        </div>
        <div class="form-group span9">
            <label for="titulo">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control" placeholder="Digite a descrição do serviço." maxlength="1000" required></textarea>
        </div>
        <div class="form-group span9">
            <br>
            <input type="submit" class="btn btn-primary" value="Cadastrar Ordem de Serviço">
        </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        const produtoSelect = document.getElementById('id_produto');
        const codigoInput = document.getElementById('codigo_peca');

        produtoSelect.addEventListener('change', function() {
            
            const selectedOption = this.options[this.selectedIndex];
            const codigoDoProduto = selectedOption.getAttribute('data-codigo');
            codigoInput.value = codigoDoProduto;
        });
    });
</script>
@endsection