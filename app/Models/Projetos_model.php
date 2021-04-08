<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Projetos_model extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'data_inicio',
        'data_fim' ,
        'valor',
        'risco',
        'participantes',
    
    ];

    public function CadastrarProjeto($nome , $data_inicio, $data_fim, $valor, $risco, $participantes){
        DB::table('projetos')->insert([
            'nome' => $nome,
            'data_inicio' => $data_inicio,
            'data_fim' =>  $data_fim,
            'valor' => $valor,
            'risco' => $risco,
            'participantes' => $participantes,
    
        ]);
    }

    public function selectAll(){
        return DB::table('projetos')
        ->select('*')
        ->get();
    }

    public function excluirProjeto($id){
        DB::table('projetos')
        ->where('id_projeto', '=', $id)->delete();
    }

    

    
    

}
