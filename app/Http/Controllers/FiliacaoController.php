<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiacao;
use App\Models\FiliacaoDependente;

class FiliacaoController extends Controller
{
    public function create()
    {
        return view('filiacao.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cep' => 'required|string|max:20',
            'endereco' => 'required|string|max:255',
            'bairro' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
            'uf' => 'required|string|max:2',
            'nome' => 'required|string|max:255',
            'matricula' => 'required|string|max:50',
            'rg' => 'required|string|max:50',
            'orgao_expedidor' => 'required|string|max:50',
            'cpf' => 'required|string|max:20',
            'data_nascimento' => 'required|date',
            'naturalidade' => 'nullable|string|max:100',
            'tipo_sanguineo' => 'nullable|string|max:10',
            'sexo' => 'nullable|string|max:20',
            'filiacao_pai' => 'nullable|string|max:255',
            'filiacao_mae' => 'nullable|string|max:255',
            'cargo' => 'nullable|string|max:100',
            'data_admissao' => 'nullable|date',
            'situacao_servidor' => 'nullable|string|max:50',
            'telefone1' => 'required|string|max:30',
            'telefone2' => 'nullable|string|max:30',
            'email_funcional' => 'nullable|email|max:100',
            'email_pessoal' => 'nullable|email|max:100',
            'estado_civil' => 'nullable|string|max:30',
            'escolaridade' => 'nullable|string|max:50',
            'formacao' => 'nullable|string|max:100',
            'quantidade_dependentes' => 'nullable|integer|min:0|max:9',
            // ...other fields...
        ]);

        $filiacao = Filiacao::create($validated);

        // Dependentes
        $qtd = (int)($request->input('quantidade_dependentes', 0));
        for ($i = 1; $i <= $qtd; $i++) {
            $nome = $request->input("dependente_nome_$i");
            $parentesco = $request->input("dependente_parentesco_$i");
            $data_nascimento = $request->input("dependente_data_nascimento_$i");
            if ($nome || $parentesco || $data_nascimento) {
                FiliacaoDependente::create([
                    'filiacao_id' => $filiacao->id,
                    'nome' => $nome,
                    'parentesco' => $parentesco,
                    'data_nascimento' => $data_nascimento,
                ]);
            }
        }

        return redirect()->route('filiacao.create')->with('success', 'Filiação enviada com sucesso!');
    }
}
