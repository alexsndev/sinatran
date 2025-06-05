<?php

namespace App\Http\Controllers;

use App\Models\Noticia;

class SeccionaController extends Controller
{
    public function index()
    {
        $agente = Noticia::whereHas('categoria', fn($q) => $q->where('nome', 'agente'))->latest()->take(4)->get();
        $noticias = Noticia::whereHas('categoria', fn($q) => $q->where('nome', 'noticias'))->latest()->take(4)->get();
        $artigos = Noticia::whereHas('categoria', fn($q) => $q->where('nome', 'artigos'))->latest()->take(4)->get();
        $eventos = Noticia::whereHas('categoria', fn($q) => $q->where('nome', 'eventos'))->latest()->take(4)->get();

        return view('public.categorias.index', compact('agente', 'noticias', 'artigos', 'eventos'));
    }
}
