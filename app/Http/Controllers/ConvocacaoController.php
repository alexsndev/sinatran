<?php

namespace App\Http\Controllers;

use App\Models\Noticia;

class ConvocacaoController extends Controller
{
    public function index()
    {
        // Id fixo da categoria "Convocações"
        $categoriaId = 5;

        // Pega a convocação mais recente
        $convocacaoAtual = Noticia::where('categoria_id', $categoriaId)
            ->latest()
            ->first();

        if ($convocacaoAtual) {
            // Pega as últimas convocacoes, excluindo a atual
            $ultimasConvocacoes = Noticia::where('categoria_id', $categoriaId)
                ->where('id', '!=', $convocacaoAtual->id)
                ->latest()
                ->get();
        } else {
            // Caso não tenha nenhuma convocação cadastrada
            $ultimasConvocacoes = collect();
        }

        return view('public.convocacoes.index', compact('convocacaoAtual', 'ultimasConvocacoes'));
    }
}
