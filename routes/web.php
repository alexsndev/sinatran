<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\CategoriaController as PublicCategoriaController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\NoticiaController as AdminNoticiaController;
use App\Http\Controllers\Admin\CategoriaController as AdminCategoriaController;
use App\Http\Controllers\ConvocacaoController;
/*
|--------------------------------------------------------------------------
| Rotas Públicas
|--------------------------------------------------------------------------
*/

Route::get('/legislacao', function () {
    return view('public.legislacao.legislacao');
});

Route::get('/convocacoes', [ConvocacaoController::class, 'index'])->name('convocacoes.index');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/sobre', function () {
    return view('public.sobre');
})->name('sobre');

Route::get('/contato', function () {
    return view('public.contato');
})->name('contato');

Route::post('/contato', [ContatoController::class, 'enviar'])->name('contato.enviar');

Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');
Route::get('/noticias/{id}', [NoticiaController::class, 'show'])->name('noticias.show');

Route::get('/categorias', [PublicCategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/{id}', [PublicCategoriaController::class, 'show'])->name('categorias.show');

/*
|--------------------------------------------------------------------------
| Área Administrativa (Autenticada)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('noticias', AdminNoticiaController::class);
    Route::resource('categorias', AdminCategoriaController::class);
});

/*
|--------------------------------------------------------------------------
| Rotas do Perfil do Usuário (Autenticado)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
