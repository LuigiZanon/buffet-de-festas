<?php

namespace App\Http\Controllers;

use App\Models\esperagenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    public function selectFesta($titulo)
{
    $user = Auth::user();

    // Supondo que você deseja buscar o pacote pelo título na tabela 'pacotes'
    $reserva = esperagenda::where('titulo', $titulo)
                    ->where('email', $user->email);


    return view('FESTA.festa', ['reserva' => $reserva]);
}

}
