<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class GerenciarProjetoController extends Controller
{
    public function cadastrarProjeto(){
        return Inertia::render('CadastrarProjeto');
    }

    public function efetuarCadastro(Request $request){
        dd($request->all());
    }
}
