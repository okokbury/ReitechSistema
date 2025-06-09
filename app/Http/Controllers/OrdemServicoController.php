<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ordemservico;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductCategory;

class OrdemServicoController extends Controller
{
    function index(){

        $ordens_servico = Ordemservico::with('product', 'responsavel')->latest()->paginate(15);

        return view('ordem.ordem', [
        'ordemservico' => $ordens_servico,
    ]);
    }

    function create(){

        $products = Product::all();
        $users = User::all();
        return view('ordem.criarordem', [
            'products' => $products,
            'users' => $users
        ]);
    }

    public function store(Request $request){
        $ordemservico = new Ordemservico;

        $ordemservico->id_produto = $request->id_produto;
        $ordemservico->id_responsavel = $request->id_responsavel;

        // Verifica se o campo preco contém vírgula ponto e outros pra nao dar pau no banco de dados :)
        $precoForm = $request->input('valor_servico');
        $precoCentavos = (int)((float)$precoForm * 100);
        $ordemservico->valor_servico = $precoCentavos;

        $ordemservico->data_emissao = $request->data_emissao;
        $ordemservico->data_entrega = $request->data_entrega;
        $ordemservico->tipo_servico = $request->tipo_servico;
        $ordemservico->descricao = $request->descricao;

        $ordemservico->save();

        return redirect('/ordemservico')->with('msg', 'Produto criado com sucesso!');

    }

    
    public function edit($id){
        
        $ordemservico = Ordemservico::findOrFail(request('id'));
        $products = Product::all();
        $users = User::all();

        return view('ordem.editar', [
            'ordemservico' => $ordemservico,
            'products' => $products,
            'users' => $users
        ]);   
     
    }

    public function update(Request $request, $id){
        $ordemservico = Ordemservico::findOrFail($id);

        $dadosValidados = $request->validate([
            'id_produto' => 'required|integer|exists:products,id',
            'id_responsavel' => 'required|integer|exists:users,id',
            'valor_servico' => 'required|numeric|min:0',
            'data_emissao' => 'required|date',
            'data_entrega' => 'nullable|date|after_or_equal:data_emissao',
            'tipo_servico' => 'required|string|max:100',
            'descricao' => 'nullable|string',
        ]);

        
        $ordem = Ordemservico::findOrFail($id);

        $dadosValidados['valor_servico'] = (int)round((float)$dadosValidados['valor_servico'] * 100);

        $ordem->update($dadosValidados);

        return redirect('/ordemservico')->with('msg', 'Ordem de Serviço atualizada com sucesso!');
    }

        
    public function destroy($id){
        Ordemservico::findOrFail($id)->delete();
        
        return redirect('/ordemservico')->with('msg', 'Ordem de Serviço excluída com sucesso!');
    }

}