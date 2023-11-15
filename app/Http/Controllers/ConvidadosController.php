<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Convidado;

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
            $convidado->save();
        }

        return redirect()->route('convidados')->with('success', 'Convidados registrados com sucesso!');
    }
    public function formulario()
    {
        return view('convidados');
    }
}
