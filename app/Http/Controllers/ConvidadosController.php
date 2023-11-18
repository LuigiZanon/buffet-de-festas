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
    public function listaConfirmados()
    {
        $convidadosConfirmados = Convidado::where('confirmado', true)->get();
        $todosOsConvidados = Convidado::all(); // Obtém todos os convidados para a lista completa
        return view('lista-confirmados', compact('convidadosConfirmados', 'todosOsConvidados'));
    }

    public function confirmarChegada($id)
    {
        $convidado = Convidado::find($id);
        $convidado->confirmado = true;
        $convidado->save();

        return redirect()->route('lista.confirmados');
    }

    public function adicionarConvidado(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'nullable|string|max:20',
            'idade' => 'nullable|integer',
        ]);

        Convidado::create([
            'nome' => $request->input('nome'),
            'confirmado' => false,
            'cpf' => $request->input('cpf'),
            'idade' => $request->input('idade'),
        ]);

        return redirect()->route('lista.confirmados');
    }

}
