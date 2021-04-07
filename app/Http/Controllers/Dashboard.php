<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class Dashboard extends Controller
{
    public function index(){

        $dados = [
            ["id" => 5,
            "nome" => "Projetox",
            "valor" => "10.000"],
            ["id" => 6,
            "nome" => "Projetoy",
            "valor" => "10.000"],
            ["id" => 7,
            "nome" => "Projetoz",
            "valor" => "10.000"]
        ];
     
       return Inertia::render('Dashboard',[
           'dados' => $dados
       ]);
    }
}
