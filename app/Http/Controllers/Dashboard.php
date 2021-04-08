<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Projetos_model;
class Dashboard extends Controller
{
    public function index(){

        $projeto_model = new Projetos_model;
        $dados = $projeto_model->selectAll();

       return Inertia::render('Dashboard',[
           'dados' => $dados,
          
          
       ]);
    }
}
