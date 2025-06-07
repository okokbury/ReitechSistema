<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    
    public function index(){

        $products = Product::all();

        return view('produtos.produtos', [
            'products' => $products,
        ]);

    }

    public function create(){
        
        $categories = ProductCategory::all();
        return view('produtos.criar', [
            'categories' => $categories
        ]);   
     
    }

    public function store(Request $request){
        $product = new Product;

        $product->nome = $request->nome;
        $product->codigo_peca = $request->codigo_peca;
        $product->quantidade = $request->quantidade;

        // Verifica se o campo preco contém vírgula e substitui por ponto pra nao dar pau no banco de dados :)
        if(str_contains($request->preco, ',')) {
            $request->preco = str_replace(',', '.', $request->preco);
        } 
        else {
        $product->preco = $request->preco;
        }

        $product->fornecedor = $request->fornecedor;
        $product->lote = $request->lote;
        $product->categoria = $request->categoria;
        $product->descricao = $request->descricao;

        $product->save();

        return redirect('/produtos');

    }

}
