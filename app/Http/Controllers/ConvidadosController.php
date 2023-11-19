<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Convidado;
use App\Models\esperagenda;

class ConvidadosController extends Controller
{
    public function registrarConvidados(Request $request)
    {
        $pessoas = $request->input('pessoas');
        foreach($pessoas as $pessoa){
            $convidado = new Convidado();
            $convidado->cpf = $pessoa['cpf'];
            $convidado->nome = $pessoa['nome'];
            $convidado->idade = $pessoa['idade'];
            $convidado->esperagenda_id = $pessoa['esperagenda_id'];
            $convidado->save();
        }

        return redirect()->route('obrigadoRoute');
    }
    public function formulario($esperagenda_id)
    {
        $festa = esperagenda::findOrFail($esperagenda_id);
        return view('convidados', compact('festa'));
    }

    public function sucesso(){

        return view('obrigado');
    }
}