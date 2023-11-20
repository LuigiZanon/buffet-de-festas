<?php

namespace App\Http\Controllers;

use App\Models\esperagenda;
use App\Models\recomenda;
use Illuminate\Http\Request;

class recomendaController extends Controller
{
    public function recomendacao(){

        $recomendacao = recomenda::all();
        return view('rec', compact('recomendacao'));
    }


    public function salvarRec(Request $request){

        $data = $request->validate([
        'rec' => 'required',
    ]);

    $count = recomenda::count();

    if ($count > 0) {
        $recomendacao = recomenda::first();
        $recomendacao->update([
            'rec' => $data['rec'],
        ]);

    } else {

        recomenda::create([
            'rec' => $data['rec'],
        ]);

    }
    return redirect()->route('ver.rec');
}

    public function EditRec(){

        return View('editRec', compact('recomendacao'));
    }
}
