<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\{
    HomeController,
    Dashboard,
    GerenciarProjetoController
};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/home',[HomeController::Class, 'index']);
Route::get('/adicionar',[GerenciarProjetoController::Class, 'cadastrarProjeto'])->name('adicionar');
Route::post('/adicionar',[GerenciarProjetoController::Class, 'efetuarCadastro'])->name('adicionarForm');
Route::delete('/excluirProjeto/{id_projeto}',[GerenciarProjetoController::Class, 'excluirProjeto'])->name('excluirProjeto');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [Dashboard::Class, 'index']
)->name('dashboard');
