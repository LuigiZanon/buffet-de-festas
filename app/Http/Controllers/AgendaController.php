<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\esperagenda;
use App\Models\pacote;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{

    public function MENUagenda(){

        return view('AGENDA.MENUreserva');
    }

    public function RESERVAagenda(){

        $pacotes = pacote::all();
        $user = User::all();

        return view('AGENDA.CRIAreserva', compact('user', 'pacotes'));
    }

    public function STATUSagenda(){

        $user = Auth::user();
        $pacotes = pacote::all();
        $reservas = esperagenda::where('email', $user->email)->get();

        return view('AGENDA.STATUSreserva', compact('reservas', 'pacotes'));
    }

    public function atualizarStatus(esperagenda $reserva, Request $request)
    {

    $reserva->status = $request->status;
    $reserva->save();

    return redirect()->route('AGENDA.ADMreserva');
    }

    public function excluirReserva(esperagenda $reserva)
    {
    $reserva->delete();

    return redirect()->route('AGENDA.ADMreserva');
    }

    public function excluirReservaANI(esperagenda $reserva)
    {
    $reserva->delete();

    return redirect()->route('AGENDA.STATUSreserva');
    }

    public function EDITAagenda(){
        $reservas = esperagenda::all();

        return view('AGENDA.ADMreserva', compact('reservas'));
    }

    public function verificarConflito($novaReserva)
    {
        $dataInicio = Carbon::parse($novaReserva['Dinicio']);
        $dataFim = Carbon::parse($novaReserva['Dfim']);

        // Verifica se há outras reservas no mesmo dia
        $conflitos = esperagenda::whereDate('Dinicio', $dataInicio->toDateString())
        ->where('status', 1) // Apenas festas aprovadas
        ->where(function ($query) use ($dataInicio, $dataFim) {
            // Verifica se há sobreposição de horários
            $query->whereBetween('Dinicio', [$dataInicio, $dataFim])
                ->orWhereBetween('Dfim', [$dataInicio, $dataFim]);
        })
        ->get();

        return $conflitos;
    }

    public function SalvaAgenda(Request $request){

        $user = Auth::user();

        $data = $request->validate([
        'nome' => 'required|string',
        'idade' => 'required|integer',
        'convidados' => 'required|integer',
        'pacote' => 'required|exists:pacotes,id',
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

        $conflitos = $this->verificarConflito($data);

        if ($conflitos->count() > 0) {
            $conflito = $conflitos->first(); // Apenas pega o primeiro conflito para exemplo

            $mensagem = "Já existe uma festa agendada neste horário. ("
    . \Carbon\Carbon::parse($conflitos[0]->Dinicio)->format('H:i')
    . " - "
    . \Carbon\Carbon::parse($conflitos[0]->Dfim)->format('H:i')
    . ")";
            return redirect()->back()->withErrors(['Dinicio' => $mensagem]);
        }

        $data['email'] = $user->email;

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
