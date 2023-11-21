<?php

namespace App\Http\Controllers;

use App\Models\esperagenda;
use App\Models\recomenda;
use Illuminate\Http\Request;

class recomendaController extends Controller
{

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
    return redirect()->route('MENU.agenda');
}

    public function EditRec(){

        $recomendacao = recomenda::first();

        return View('editRec', compact('recomendacao'));
    }
}
