<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::orderBy('id', 'desc')->with(['categoria', 'medias'])->paginate(10);
        return view('public.noticias.index', compact('noticias'));
    }

    public function show($id)
    {
        $noticia = Noticia::with(['categoria', 'medias'])->findOrFail($id);
        return view('public.noticias.show', compact('noticia'));
    }

    public function adminIndex()
    {
        $noticias = Noticia::orderBy('id', 'desc')->with(['categoria', 'medias'])->paginate(10);
        return view('admin.noticias.index', compact('noticias'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.noticias.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem_capa' => 'nullable|image|max:2048',
        ]);

        $noticia = Noticia::create($request->only('titulo', 'conteudo', 'categoria_id'));

        if ($request->hasFile('imagem_capa')) {
            $path = $request->file('imagem_capa')->store('noticias', 'public');

            $noticia->medias()->create([
                'url' => $path,
                'url_imgbb' => null,
            ]);
        }

        return redirect()->route('admin.noticias.index')->with('success', 'Notícia criada com sucesso!');
    }

    public function edit($id)
    {
        $noticia = Noticia::with('medias')->findOrFail($id);
        $categorias = Categoria::all();
        return view('admin.noticias.edit', compact('noticia', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $noticia = Noticia::findOrFail($id);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem_capa' => 'nullable|image|max:2048',
        ]);

        $noticia->update($request->only('titulo', 'conteudo', 'categoria_id'));

        if ($request->hasFile('imagem_capa')) {
            // Apaga imagens antigas
            foreach ($noticia->medias as $media) {
                Storage::disk('public')->delete($media->url);
                $media->delete();
            }

            // Salva nova imagem
            $path = $request->file('imagem_capa')->store('noticias', 'public');

            $noticia->medias()->create([
                'url' => $path,
                'url_imgbb' => null,
            ]);
        }

        return redirect()->route('admin.noticias.index')->with('success', 'Notícia atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);

        foreach ($noticia->medias as $media) {
            Storage::disk('public')->delete($media->url);
            $media->delete();
        }

        $noticia->delete();

        return redirect()->route('admin.noticias.index')->with('success', 'Notícia excluída com sucesso!');
    }
}
