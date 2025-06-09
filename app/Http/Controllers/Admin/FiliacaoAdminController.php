<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Filiacao;

class FiliacaoAdminController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        $filiacoes = Filiacao::with('dependentes')
            ->when($q, function ($query, $q) {
                $query->where('nome', 'like', "%$q%")
                      ->orWhere('cpf', 'like', "%$q%");
            })
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('admin.filiacao.index', compact('filiacoes'));
    }

    public function show($id)
    {
        $filiacao = Filiacao::with('dependentes')->findOrFail($id);
        return view('admin.filiacao.show', compact('filiacao'));
    }

    public function edit($id)
    {
        $filiacao = Filiacao::with('dependentes')->findOrFail($id);
        return view('admin.filiacao.edit', compact('filiacao'));
    }

    public function update(Request $request, $id)
    {
        $filiacao = Filiacao::findOrFail($id);
        $filiacao->update($request->all());
        return redirect()->route('admin.filiacao.index')->with('success', 'Filiação atualizada!');
    }

    public function destroy($id)
    {
        $filiacao = Filiacao::findOrFail($id);
        $filiacao->delete();
        return redirect()->route('admin.filiacao.index')->with('success', 'Filiação excluída!');
    }
}
