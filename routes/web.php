<?php
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('client.index');
});
Route::resource('client', ClientController::class);
Route::get('/buscar-cep', [ClientController::class, 'buscarCep'])->name('buscar.cep');