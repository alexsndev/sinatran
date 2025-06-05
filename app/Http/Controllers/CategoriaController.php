<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Lista todas categorias publicamente (pode ser opcional)
    public function index()
{
    $categorias = Categoria::with(['noticias' => function ($query) {
        $query->latest()->take(4);
    }])->get();

    return view('public.categorias.index', compact('categorias'));
}

    // Mostrar notícias de uma categoria específica (público)
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        // Aqui você pode usar o relacionamento para pegar as notícias da categoria
        $noticias = $categoria->noticias()->paginate(6);

        return view('public.categorias.show', compact('categoria', 'noticias'));
    }

    // Listagem no painel admin
    public function adminIndex()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.index', compact('categorias'));
    }

    // Formulário para criar nova categoria
    public function create()
    {
        return view('admin.categorias.create');
    }

    // Salvar nova categoria
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:categorias,nome',
        ]);

        Categoria::create($request->all());

        return redirect()->route('admin.categorias.index')->with('success', 'Categoria criada com sucesso!');
    }

    // Formulário para editar categoria
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('admin.categorias.edit', compact('categoria'));
    }

    // Atualizar categoria
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255|unique:categorias,nome,' . $categoria->id,
        ]);

        $categoria->update($request->all());

        return redirect()->route('admin.categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    // Deletar categoria
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('admin.categorias.index')->with('success', 'Categoria excluída com sucesso!');
    }
}
