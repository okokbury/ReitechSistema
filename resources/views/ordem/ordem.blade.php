@extends('layouts.main')

@section('title', 'Ordens de Serviço')

@section('content')

<div class="container mt-4">
    <div class="container mt-4">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        
        <h1 class="mb-0">Ordens de Serviço</h1>

        <a href="/ordemservico/criar" class="btn btn-primary">
            <ion-icon name="add-outline" class="align-middle"></ion-icon>
            Criar Ordem de Serviço
        </a>

    </div>

    @php
        $ordemservico = $ordemservico ?? collect();
    @endphp

    @if(count($ordemservico) > 0)
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nº Ordem</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Responsável</th>
                        <th scope="col">Tipo de Serviço</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Data de Emissão</th>
                        <th scope="col">Data de Entrega</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ações</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($ordemservico as $ordem)
                        <tr>
                            <th scope="row">{{ $ordem->id }}</th>
                            <td>{{ $ordem->product->nome ?? 'Produto não encontrado' }}</td>
                            <td>{{ $ordem->responsavel->name ?? 'Responsável não encontrado' }}</td>
                            <td>{{ $ordem->tipo_servico }}</td>
                            <td>R$ {{ number_format($ordem->valor_servico / 100, 2, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($ordem->data_emissao)->format('d/m/Y') }}</td>
                            <td>
                                @if($ordem->data_entrega)
                                    {{ \Carbon\Carbon::parse($ordem->data_entrega)->format('d/m/Y') }}
                                @else
                                    <span class="text-muted">Pendente</span>
                                @endif
                            </td>
                            

                            <td>{{ Str::limit($ordem->descricao, 50) }}</td>
                            <td>
                                <a href="/ordemservico/edit/{{ $ordem->id }}" class="btn btn-info btn-sm me-2"><ion-icon name="create-outline"></ion-icon> Editar</a>
                                <form action="/ordemservico/{{ $ordem->id }}" method="POST" class="d-inline"> 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta Ordem de Serviço?');"><ion-icon name="trash-outline"></ion-icon> Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-warning" role="alert">
            Nenhuma Ordem de Serviço cadastrada ainda.
        </div>
    @endif

    <div class="mt-4">
        @if(method_exists($ordemservico, 'links'))
            {{ $ordemservico->links('pagination::bootstrap-5') }} 
        @endif
    </div>
</div>

@endsection