<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(){
        $msg = "v";
       return Inertia::render('Home', [
           'msg' => $msg
       ]);
    }
}
