<?php

namespace App\Http\Controllers;
use App\Models\funcionamento;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;

class funcionamentoController extends Controller
{
    public function EditFuncionamento(){

        return View('funcionamento.EDITfunc');
    }

    public function ADDfunc(Request $request){

            $data = $request->validate([
            'horarioMin' => 'required|date_format:H:i',
            'horarioMax' => 'required|date_format:H:i|after:horarioMin',
            'horasPfesta' => 'required|integer',
        ]);

        $count = funcionamento::count();
        $data['horarioMin'] = Carbon::createFromFormat('H:i', $data['horarioMin']);
        $data['horarioMax'] = Carbon::createFromFormat('H:i', $data['horarioMax']);

        if ($count > 0) {
            $funcionamento = funcionamento::first();
            $funcionamento->update([
                'horarioMin' => $data['horarioMin'],
                'horarioMax' => $data['horarioMax'],
                'horasPfesta' => $data['horasPfesta'],
            ]);

        } else {

            funcionamento::create([
                'horarioMin' => $data['horarioMin'],
                'horarioMax' => $data['horarioMax'],
                'horasPfesta' => $data['horasPfesta'],
            ]);

        }

        return redirect(route('MENU.agenda'));
    }
}
