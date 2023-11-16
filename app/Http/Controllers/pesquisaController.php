<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pesquisa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class pesquisaController extends Controller
{
    public function FAZpesquisa(){

        $user = User::all();

        return view('PESQ.pesquisa', compact('user'));
    }

    public function RESpesquisa(){

        $user = Auth::user();
        $respostas = pesquisa::where('email', $user->email)->get();

        return view('PESQ.pesquisaResultado', compact('respostas'));
    }

    public function ADMpesquisa(){

        return view('PESQ.pesquisaADM');
    }

    public function SALVApesquisa(Request $request){

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

            return redirect(route('RES.pesquisa'));
    }
}
