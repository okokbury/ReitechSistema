<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    
    public function index(Request $request){

        $search = $request->input('search');
        $query = Product::with('productCategory');
        $products = Product::with('productCategory')->latest()->paginate(15);

        if ($search) {
            
        $query->where(function($q) use ($search) {
            $q->where('nome', 'like', "%{$search}%")
              ->orWhere('codigo_peca', 'like', "%{$search}%");
            });
        }   

        $products = $query->latest()->paginate(15);

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
        $precoForm = $request->input('preco');
        $precoCentavos = (int)((float)$precoForm * 100);
        $product->preco = $precoCentavos;

        $product->fornecedor = $request->fornecedor;
        $product->lote = $request->lote;
        $product->categoria = $request->categoria;
        $product->descricao = $request->descricao;

        // upload de imagem pro banco
        if($request->hasFile('image') && $request->file('image')){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . time()) . "." . $extension;

            $requestImage->move(public_path('img/products'), $imageName);

            $product->image = $imageName;

        }

        $product->save();

        return redirect('/produtos')->with('msg', 'Produto criado com sucesso!');

    }

    public function edit(){
        
        $product = Product::findOrFail(request('id'));
        $categories = ProductCategory::all();

        return view('produtos.editar', [
            'product' => $product,
            'categories' => $categories
        ]);   
     
    }

    public function update(Request $request, $id){
        $product = Product::findOrFail($id);

        $dadosValidados = $request->validate([
                'nome' => 'required|string|max:255',
                'codigo_peca' => 'required|string|max:100',
                'quantidade' => 'required|integer|min:0',
                'preco' => 'required|numeric|min:0',
                'fornecedor' => 'nullable|string|max:100',
                'lote' => 'nullable|string|max:50',
                'categoria' => 'required|integer|exists:productcategories,id',
                'descricao' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

        
        $dadosValidados['preco'] = (int)round((float)$dadosValidados['preco'] * 100);

        if ($request->hasFile('image')) {
                if ($product->image && File::exists(public_path('img/products/' . $product->image))) {
                    File::delete(public_path('img/products/' . $product->image));
                }

                $requestImage = $request->file('image');
                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getClientOriginalName() . time()) . "." . $extension;
                $requestImage->move(public_path('img/products'), $imageName);
                $dadosValidados['image'] = $imageName;
            }

        $product->update($dadosValidados);

        return redirect('/produtos')->with('msg', 'Produto atualizado com sucesso!');
    }

        
    public function destroy($id){
        $product = Product::findOrFail($id);

        if ($product->image) {
            $image_path = public_path('img/products/' . $product->image);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        
        $product->delete();
        return redirect('/produtos')->with('msg', 'Produto excluído com sucesso!');
    }

}
