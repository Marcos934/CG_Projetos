<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Projetos_model;
Use Redirect;
class GerenciarProjetoController extends Controller
{
    public function cadastrarProjeto(){
        return Inertia::render('CadastrarProjeto');
    }

    public function efetuarCadastro(Request $request){

      
      $result =   $request->validate([
           'nomeProjeto' => ['required'], 
           'dataInicio' => ['required'], 
           'dataFim' => ['required'], 
           'valor' => ['required'], 
           'risco' => ['required'], 
        ]);
     


        $projeto_model = new Projetos_model;
         $projeto_model->cadastrarProjeto(
             $request->nomeProjeto,
             $request->dataInicio,
             $request->dataFim,
             $request->valor,
             $request->risco,
             $request->participantes,
    
         );
         return Redirect::route('dashboard');
        
      
    }

    public function excluirProjeto(Request $request){
        $projeto_model = new Projetos_model;
        $projeto_model->excluirProjeto($request->id_projeto);
        return Redirect::route('dashboard');
    }
}
