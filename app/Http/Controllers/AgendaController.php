<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\esperagenda;

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

    public function SalvaAgenda(Request $request){

        $data = $request->validate([
        'email' => 'required|email',
        'nome' => 'required|string',
        'convidados' => 'required|integer',
        'pacote' => 'required',
        'Dinicio' => 'required|date|after_or_equal:now',
        'Dfim' => 'required|date|after:Dinicio',
        ]);


        $data['Dinicio'] = $this->formatDate($data['Dinicio']);
        $data['Dfim'] = $this->formatDate($data['Dfim']);

        if (!$data['Dinicio']->isSameDay($data['Dfim'])) {
            return redirect()->back()->withErrors(['Dfim' => 'A festa deve ocorrer no mesmo dia.']);
        }

        if (!$this->horaValida($data['Dinicio']) || !$this->horaValida($data['Dfim'])) {
            return redirect()->back()->withErrors(['Dinicio' => 'O horário deve estar entre 10h e 22h.']);
        }

        $data['status'] = 0;

        $agenda = new esperagenda($data);

        $agenda->save();

        return redirect(route('AGENDA.STATUSreserva'));
    }

    private function formatDate($dateTime)
{
    return \Carbon\Carbon::parse($dateTime);
}

private function horaValida($dateTime)
{
    $hora = $this->formatDate($dateTime)->format('H:i');
    return $hora >= '10:00' && $hora <= '22:00';
}

}
