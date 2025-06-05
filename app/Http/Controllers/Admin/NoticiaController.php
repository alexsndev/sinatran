<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use App\Models\Categoria;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::with(['categoria', 'medias'])
                    ->orderBy('id', 'desc')  // Ordena do mais novo para o mais antigo
                    ->paginate(10);

        return view('admin.noticias.index', compact('noticias'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.noticias.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'publicado_em' => 'nullable|date',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            $imagemPath = $request->file('imagem')->store('noticias', 'public');
            $dados['imagem'] = $imagemPath;
        }

        Noticia::create($dados);

        return redirect()->route('admin.noticias.index')->with('success', 'Notícia criada com sucesso.');
    }

    public function edit(Noticia $noticia)
    {
        $categorias = Categoria::all();
        return view('admin.noticias.edit', compact('noticia', 'categorias'));
    }

    public function update(Request $request, Noticia $noticia)
    {
        $dados = $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'publicado_em' => 'nullable|date',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            $imagemPath = $request->file('imagem')->store('noticias', 'public');
            $dados['imagem'] = $imagemPath;
        }



        $noticia->update($dados);

        return redirect()->route('admin.noticias.index')->with('success', 'Notícia atualizada com sucesso.');
    }

    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        return redirect()->route('admin.noticias.index')->with('success', 'Notícia excluída com sucesso.');
    }
}
