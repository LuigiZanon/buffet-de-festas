<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EsperaAgenda;

class AgendaController extends Controller
{
    public function RESERVAagenda(){
        return view('AGENDA.CRIAreserva');
    }

    public function STATUSagenda(){
        return view('AGENDA.STATUSreserva');
    }

    public function EDITAagenda(){
        return view('AGENDA.ADMreserva');
    }

    public function ADDreserva(Request $request){

        $data = $request->validate([
        'nome' => 'required',
        'convidados' => 'required',
        'pacote' => 'required',
        'dia' => 'required',
        'hora' => 'required'
        ]);

        $novoPedido = EsperaAgenda::create($data);

        return redirect(route('???'));
    }
}
