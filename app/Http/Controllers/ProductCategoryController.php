<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    function index(){

        $categorias = ProductCategory::all();

        return view('produtos.categorias', [
            'productcategories' => $categorias,
        ]);
    }

    function create(){
        return view('produtos.criarcategorias');
    }

    public function store(Request $request){

        $categorias = new ProductCategory();
        $categorias->nome = $request->nome;

        $categorias->save();
        return redirect('/categorias');

    }
}
