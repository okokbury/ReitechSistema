<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdemServicoController extends Controller
{
    function index(){
        return view('ordem.ordem');
    }
}
