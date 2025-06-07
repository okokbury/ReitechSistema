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

        // Verifica se o campo preco contém vírgula ponto e outros pra nao dar pau no banco de dados :)
        $preco = preg_replace('/[^\d]/', '', $request->preco);
        $product->preco = intval($preco);
        $product->preco = $product->preco * 100;

        $product->fornecedor = $request->fornecedor;
        $product->lote = $request->lote;
        $product->categoria = $request->categoria;
        $product->descricao = $request->descricao;

        // upload de imagem pro banco
        if($request->hasFile('image') && $request->file('image')){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginal() . strtotime("agora")) . "." . $extension;

            $requestImage->move(public_path('img/products'), $imageName);

            $product->image = $imageName;

        }

        $product->save();

        return redirect('/produtos')->with('msg', 'Produto criado com sucesso!');

    }

}
