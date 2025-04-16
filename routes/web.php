<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SituacaoController;
use App\Http\Controllers\ChamadoController;

Route::get('/', function () {
    return redirect('/admin/dashboard'); // Redireciona para a rota /admin
});

Route::group(['prefix' => 'admin'], function () {
    // Rota para Categorias
    Route::resource('categorias', CategoriaController::class);

    // Rota para Situações
    Route::resource('situacoes', SituacaoController::class);

    // Rota para Chamados
    Route::resource('chamados', ChamadoController::class); 

    // Rota para o Dashboard
    Route::get('dashboard', function () {
        return view('admin.dashboard.dashboard');
    })->name('admin.dashboard');
});
