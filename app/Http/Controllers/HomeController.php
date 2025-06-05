<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Categoria;

class HomeController extends Controller
{
    public function index()
    {
        // Pega os 2 posts mais recentes como destaques
        $noticias = Noticia::orderBy('id', 'desc')->take(2)->get();

        // Pega 4 categorias e, para cada categoria, até 4 notícias mais recentes
        $categorias = Categoria::with(['noticias' => function ($query) {
            $query->orderBy('id', 'desc')->take(4);
        }])->take(4)->get();

        return view('public.home.index', compact('noticias', 'categorias'));
    }
}
