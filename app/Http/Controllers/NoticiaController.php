<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');
        $noticias = Noticia::with(['categoria', 'medias'])
            ->when($query, function ($q) use ($query) {
                $q->where('titulo', 'like', "%{$query}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('public.noticias.index', compact('noticias', 'query'));
    }
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
    // validações...
    $noticia = Noticia::create($request->only('titulo', 'conteudo', 'categoria_id'));

    if ($request->hasFile('imagem_capa')) {
    $nomeArquivo = uniqid() . '.' . $request->file('imagem_capa')->extension();
    $request->file('imagem_capa')->move(public_path('storage/noticias'), $nomeArquivo);
    $path = 'noticias/' . $nomeArquivo;

    $noticia->medias()->create([
        'url'       => $path,
        'typeID'    => Media::TYPE_CAPA,
        'url_imgbb' => null,
    ]);
}

    return redirect()->route('admin.noticias.index')
                     ->with('success', 'Notícia criada com sucesso!');
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
    // validações...
    $noticia->update($request->only('titulo', 'conteudo', 'categoria_id'));

    if ($request->hasFile('imagem_capa')) {
        // apaga antigas...
        foreach ($noticia->medias as $media) {
            Storage::disk('public')->delete($media->url);
            $media->delete();
        }

        $path = $request->file('imagem_capa')->store('noticias', 'public');

        // 7️⃣ Aqui também adicione typeID
        $noticia->medias()->create([
            'url'       => $path,
            'typeID'    => Media::TYPE_CAPA,
            'url_imgbb' => null,
        ]);
    }

    return redirect()->route('admin.noticias.index')
                     ->with('success', 'Notícia atualizada com sucesso!');
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
