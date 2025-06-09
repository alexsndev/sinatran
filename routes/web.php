<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\CategoriaController as PublicCategoriaController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\NoticiaController as AdminNoticiaController;
use App\Http\Controllers\Admin\CategoriaController as AdminCategoriaController;
use App\Http\Controllers\Admin\FiliacaoAdminController;
use App\Http\Controllers\ConvocacaoController;
use App\Http\Controllers\FiliacaoController;
/*
|--------------------------------------------------------------------------
| Rotas Públicas
|--------------------------------------------------------------------------
*/



Route::get('/filiacao', [FiliacaoController::class, 'create'])->name('filiacao.create');
Route::post('/filiacao', [FiliacaoController::class, 'store'])->name('filiacao.store');

Route::get('/legislacao', function () {
    return view('public.legislacao.legislacao');
});

// Rota pública para convocações (já está correta)
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

    // CRUD de filiação para admin
    Route::resource('filiacao', FiliacaoAdminController::class);
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

// Observação: O erro "Attempt to read property 'name' on null" não está neste arquivo de rotas.
// Ele ocorre em alguma view/blade onde você tenta acessar $categoria->name ou $categoria->nome, mas $categoria está null.
// Para corrigir, ajuste nas suas views para:
// {{ $categoria->nome ?? '' }}
// ou
// @if($categoria)
//     {{ $categoria->nome }}
// @endif
