<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    function index(){
        return view('estoque.estoque');
    }
}
