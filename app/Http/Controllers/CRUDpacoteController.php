<?php

namespace App\Http\Controllers;
use App\Models\pacote;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CRUDpacoteController extends Controller
{
    public function pacote(){
        return view('CRUD.pacotes');
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
        ]);

        $novoPacote = pacote::create($data);

        return redirect(route('CRUD.pacotes'));
    }
}
