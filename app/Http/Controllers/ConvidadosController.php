<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ConvidadosController extends Controller
{
    public function registrarConvidados(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->cpf = $request->input('cpf');
        $user->idade = $request->input('idade');
        $user->save(); 
    }
    public function formulario()
    {
        return view('convidados');
    }
}
