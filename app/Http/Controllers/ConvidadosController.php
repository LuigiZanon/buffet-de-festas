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
        $esperagenda_id = $pessoa['esperagenda_id'];

        return redirect()->route('convidados.formulario', compact('esperagenda_id'))->with('success', 'Cadastrado com sucesso!');
    }
    public function formulario($esperagenda_id)
    {
        $festa = esperagenda::findOrFail($esperagenda_id);
        return view('convidados', compact('festa'));
    }

    public function verlista($id){

        $reserva = esperagenda::where('id', $id)
                              ->first();

        $convidados = Convidado::where('esperagenda_id', $id)
                               ->get();

        return view('lista', compact('reserva', 'convidados'));
    }

    public function atualizarPresenca($id, $idP, Request $request)
    {

    $convidado = Convidado::where('id', $idP)
                          ->where('esperagenda_id', $id)
                          ->first();

    $convidado->presente = $request->status;
    $convidado->save();

    return redirect()->route('ver.lista', compact('id'));
    }

    public function convidadoExtra($id, Request $request){

            $pessoas = $request->input('pessoas');
            foreach($pessoas as $pessoa){
                $convidado = new Convidado();
                $convidado->cpf = $pessoa['cpf'];
                $convidado->nome = $pessoa['nome'];
                $convidado->idade = $pessoa['idade'];
                $convidado->presente = $pessoa['presente'];
                $convidado->esperagenda_id = $pessoa['esperagenda_id'];
                $convidado->save();
            }

            return redirect()->route('ver.lista', compact('id'));
        }
}
