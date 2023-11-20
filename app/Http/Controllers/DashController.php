<?php

namespace App\Http\Controllers;

use App\Models\Convidado;
use App\Models\esperagenda;
use App\Models\pacote;
use App\Models\pesquisa;
use App\Models\recomenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    public function selectFesta($titulo)
{
    $user = Auth::user();
    $pesquisa = pesquisa::where('email', $user->email)
                        ->first();
                        /**fazer com nome tambem */
    $recomendacao = recomenda::first();

    // Supondo que você deseja buscar o pacote pelo título na tabela 'pacotes'
    $reserva = esperagenda::where('nome', $titulo)
                    ->where('email', $user->email)
                    ->first();


    return view('FESTA.festa', compact('reserva', 'pesquisa', 'recomendacao'));
}

public function pacoteFesta($titulo){

    $user = Auth::user();

    $reserva = esperagenda::where('nome', $titulo)
                          ->where('email', $user->email)
                          ->first();

    $pacotes = pacote::all();

    return view('FESTA.pacoteFesta', compact('reserva', 'pacotes'));
}

public function convidadosFesta($titulo){

    $user = Auth::user();

    $reservas = esperagenda::where('nome', $titulo)
                          ->where('email', $user->email)
                          ->first();

    $convidados = Convidado::where('esperagenda_id', $reservas->id)
                           ->get();

    return view('FESTA.convidadosFesta', compact('reservas', 'convidados'));


}

public function excluirConvidado($titulo, $id)
    {

    $convidado = Convidado::find($id);

        $convidado->delete();

    return redirect()->route('edita.convidados', compact('titulo'));
    }

    public function atualizarPacote($titulo, $idReserva, Request $request)
{


    $pacoteNovo = $request->input('pacote');
    // Atualize o valor 'pacote' na tabela 'esperagendas'
    $reserva = esperagenda::find($idReserva);

    $reserva->update([
        'pacote' => $pacoteNovo,
    ]);

    return redirect()->route('edita.pacoteFesta', compact('titulo'));
    }

    public function excluirFesta($id)
    {
        $reserva = esperagenda::find($id);
        $reserva->delete();

    return redirect()->route('dashboard');
    }
}
