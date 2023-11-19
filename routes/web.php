<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\CRUDpacoteController;
use App\Http\Controllers\CadastroConvidados;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\pesquisaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConvidadosController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\funcionamentoController;
use App\Http\Controllers\TesteController;
use App\Models\esperagenda;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MenuController::class,'menu'])->name('menu');

Route::get('/dashboard', function () {

    $reservas = esperagenda::all();

    return view('dashboard', compact('reservas'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/{titulo}', [DashController::class, 'selectFesta'])->name('select.Festa');
Route::get('/dashboard/{titulo}/pacote', [DashController::class, 'pacoteFesta'])->name('edita.pacoteFesta');
    Route::post('/dashboard/{titulo}/pacote/{idReserva}', [DashController::class, 'atualizarPacote'])->name('atualizar.pacote');
Route::get('/dashboard/{titulo}/convidados', [DashController::class, 'convidadosFesta'])->name('edita.convidados');
    Route::delete('/dashboard/{titulo}/convidados/excluir/{id}', [DashController::class, 'excluirConvidado'])->name('excluir.convidados');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/teste', [TesteController::class,'teste'])
                ->name('teste')
                ->middleware('can.multiple:access_admin,access_comercial');

    Route::post('/processarAgendamento', function () {
        // Lógica para processar o agendamento aqui
        // Por exemplo, você pode armazenar os dados no banco de dados

        return redirect('/teste')->with('success', 'Agendamento concluído com sucesso!');
    })->name('processarAgendamento');

    Route::get('/pacotes/menu', [CRUDpacoteController::class, 'MENUpacotes'])->name('MENU.pacotes');
    Route::get('/pacotes/gerenciar', [CRUDpacoteController::class, 'pacote'])->name('CRUD.pacotes');
        Route::get('/pacotes/criar', [CRUDpacoteController::class, 'CRIApacote'])->name('CRUD.CRIApacotes');
        Route::get('/pacotes/fetch/{id}', [CRUDpacoteController::class, 'getPacoteInfo'])->name('getPacoteInfo');
            Route::post('/pacotes/gerenciar', [CRUDpacoteController::class, 'ADDpacote'])->name('CRUD.ADDpacote');
            Route::delete('/pacotes/excluir/{pacote}', [CRUDpacoteController::class, 'excluirPacote'])->name('PACOTE.excluir');

    Route::get('/agendamento', [AgendaController::class, 'MENUagenda'])->name('MENU.agenda');
    Route::get('/agendamento/agendar', [AgendaController::class, 'RESERVAagenda'])->name('AGENDA.CRIAreserva');
        Route::get('/agendamento/gerenciar', [AgendaController::class, 'EDITAagenda'])->name('AGENDA.ADMreserva');
        Route::get('/agendamento/status', [AgendaController::class, 'STATUSagenda'])->name('AGENDA.STATUSreserva');

                Route::post('/agendamento', [AgendaController::class, 'SalvaAgenda'])->name('ADD.agenda');
                Route::patch('/agendamento/atualizar/{reserva}', [AgendaController::class, 'atualizarStatus'])->name('AGENDA.atualizar');
                Route::delete('/agendamento/excluir/{reserva}', [AgendaController::class, 'excluirReserva'])->name('AGENDA.excluir');
                Route::delete('/agendamento/excluirANI/{reserva}', [AgendaController::class, 'excluirReservaANI'])->name('AGENDA.excluirANI');

    Route::get('/pesquisa', [pesquisaController::class, 'FAZpesquisa'])->name('FAZ.pesquisa');
    Route::get('/pesquisa/ADM', [pesquisaController::class, 'ADMpesquisa'])->name('ADM.pesquisa');
    Route::get('/pesquisa/resultado', [pesquisaController::class, 'RESpesquisa'])->name('RES.pesquisa');
        Route::post('/pesquisa/resultado', [pesquisaController::class, 'SALVApesquisa'])->name('SALVA.pesquisa');


        Route::get('/funcionamento', [funcionamentoController::class, 'EditFuncionamento'])->name('HORAfuncionamento');
        Route::post('/funcionamento/criar', [funcionamentoController::class, 'ADDfunc'])->name('ADD.funcionamento');

});


    Route::get('/convidados/{esperagenda_id}', [ConvidadosController::class, 'formulario'])->name('convidados.formulario');
    Route::post('/storePeople', [ConvidadosController::class, 'registrarConvidados'])->name('convidados.registrar');
    Route::get('/obrigado', [ConvidadosController::class, 'sucesso'])->name('obrigadoRoute');



  require __DIR__.'/auth.php';
