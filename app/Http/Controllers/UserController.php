<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        return view('users.users');
    }

    function create_funcionario(){
        return view('users.criar_funcionario');
    }

    function create_cliente(){
        return view('users.criar_cliente');
    }
}
