<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');
        $noticias = Noticia::with(['categoria'])
            ->when($query, function ($q) use ($query) {
                $q->where('titulo', 'like', "%{$query}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('public.noticias.index', compact('noticias', 'query'));
    }
    public function index()
    {
        $noticias = Noticia::orderBy('id', 'desc')->with(['categoria'])->paginate(10);
        return view('public.noticias.index', compact('noticias'));
    }

    public function show($id)
    {
        $noticia = Noticia::with(['categoria'])->findOrFail($id);
        return view('public.noticias.show', compact('noticia'));
    }

    public function adminIndex()
    {
        $noticias = Noticia::orderBy('id', 'desc')->with(['categoria'])->paginate(10);
        return view('admin.noticias.index', compact('noticias'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.noticias.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        // validações...
        $data = $request->only('titulo', 'conteudo', 'categoria_id');

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('noticias', 'public');
            $data['imagem'] = $path;
        }

        Noticia::create($data);

        return redirect()->route('admin.noticias.index')
                         ->with('success', 'Notícia criada com sucesso!');
    }

    public function edit($id)
    {
        $noticia = Noticia::findOrFail($id);
        $categorias = Categoria::all();
        return view('admin.noticias.edit', compact('noticia', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $noticia = Noticia::findOrFail($id);
        // validações...
        $data = $request->only('titulo', 'conteudo', 'categoria_id');

        if ($request->hasFile('imagem')) {
            // apaga antiga se existir
            if ($noticia->imagem) {
                Storage::disk('public')->delete($noticia->imagem);
            }
            $path = $request->file('imagem')->store('noticias', 'public');
            $data['imagem'] = $path;
        }

        $noticia->update($data);

        return redirect()->route('admin.noticias.index')
                         ->with('success', 'Notícia atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);

        if ($noticia->imagem) {
            Storage::disk('public')->delete($noticia->imagem);
        }

        $noticia->delete();

        return redirect()->route('admin.noticias.index')->with('success', 'Notícia excluída com sucesso!');
    }

    // Adicione este método para tornar convocações públicas (exemplo)
    public function convocacoes()
    {
        $noticias = Noticia::where('categoria_id', /* id da categoria de convocações */)
            ->orderBy('id', 'desc')
            ->with(['categoria'])
            ->paginate(10);

        return view('public.convocacoes.index', compact('noticias'));
    }
}
