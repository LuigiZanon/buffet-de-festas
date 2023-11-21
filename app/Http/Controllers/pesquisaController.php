<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\esperagenda;
use Illuminate\Http\Request;
use App\Models\pesquisa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class pesquisaController extends Controller
{
    public function FAZpesquisa($titulo, $festaID){

        $user = User::all();
        $reserva = esperagenda::where('id', $festaID)
                              ->first();
        return view('PESQ.pesquisa', compact('user', 'titulo', 'festaID', 'reserva'));
    }

    public function RESpesquisa($titulo){

        $user = Auth::user();
        $respostas = pesquisa::where('email', $user->email)->get();

        return view('PESQ.pesquisaResultado', compact('respostas', 'titulo'));
    }

    public function SALVApesquisa(Request $request, $titulo, $festaID){

        $user = Auth::user();

        $data = $request->validate([
            'resposta1' => 'required',
            'resposta2' => 'required',
            'resposta3' => 'required',
            'resposta33' => 'nullable',
            'resposta4' => 'required',
            'resposta5' => 'required|integer',
            'resposta6' => 'nullable',
            ]);

            $data['email'] = $user->email;
            $data['resposta33'] = $data['resposta33'] ?? 'vazio';
            $data['resposta6'] = $data['resposta6'] ?? 'vazio';

            $novaPesquisa = new pesquisa($data);
            $novaPesquisa->save();

            return redirect(route('select.Festa', compact('titulo')));
    }

    public function MenuPF(){

        return view('MENUPF');
    }

    public function viewResultados(){

        $resultados = pesquisa::all();

        return view('admPesquisa', compact('resultados'));
    }
}
