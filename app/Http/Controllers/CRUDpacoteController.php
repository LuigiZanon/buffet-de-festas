<?php

namespace App\Http\Controllers;
use App\Models\pacote;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CRUDpacoteController extends Controller
{

    public function excluirPacote($pacoteId)
{
    $pacote = pacote::find($pacoteId);

    if (!$pacote) {
        // Tratar o caso em que o pacote não foi encontrado
        abort(404);
    }

    $pacote->delete();

    return redirect()->route('CRUD.pacotes');
}

    public function MENUpacotes(){

        return view('CRUD.MENUpacotes');
    }

    public function pacote(){
        $pacotes = pacote::all();

        return view('CRUD.pacotes', compact('pacotes'));
    }

    public function CRIApacote(){
        return view('CRUD.CRIApacotes');
    }

    public function ADDpacote(Request $request){
        /* $content = $request->input('editor'); */
        $data = $request->validate([
            'titulo' => 'required',
            'img1' => 'required|url',
            'img2' => 'required|url',
            'img3' => 'required|url',
            'desc' => 'required',
            'price' => 'required|decimal:0,2'
        ]);

        $novoPacote = pacote::create($data);

        return redirect(route('CRUD.pacotes'));
    }

    public function getPacoteInfo($id)
{
    $pacote = Pacote::where('id', $id)->first();

    return response()->json($pacote);
}

}
