<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/teste', [TesteController::class,'teste'])
                ->name('teste')
                ->middleware('can:access_admin');
                
    Route::post('/processarAgendamento', function () {
        // Lógica para processar o agendamento aqui
        // Por exemplo, você pode armazenar os dados no banco de dados
    
        return redirect('/teste')->with('success', 'Agendamento concluído com sucesso!');
    })->name('processarAgendamento');
});


require __DIR__.'/auth.php';
