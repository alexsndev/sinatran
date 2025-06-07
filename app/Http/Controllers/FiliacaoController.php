<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FiliacaoController extends Controller
{
    public function create()
    {
        return view('filiacao.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cep' => 'required|string|max:9',
            'endereco' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'uf' => 'required|string|max:2',
            'nome' => 'required|string|max:255',
            'matricula' => 'required|string|max:50',
            'rg' => 'required|string|max:20',
            'orgao_expedidor' => 'required|string|max:20',
            'cpf' => 'required|string|max:14',
            'data_nascimento' => 'required|date',
            'naturalidade' => 'nullable|string|max:255',
            'tipo_sanguineo' => 'nullable|string|max:5',
            'sexo' => 'nullable|string|max:10',
            'filiacao_pai' => 'nullable|string|max:255',
            'filiacao_mae' => 'nullable|string|max:255',
            'cargo' => 'nullable|string|max:255',
            'data_admissao' => 'nullable|date',
            'situacao_servidor' => 'nullable|string|max:20',
            'telefone1' => 'required|string|max:20',
            'telefone2' => 'nullable|string|max:20',
            'email_funcional' => 'nullable|email|max:255',
            'email_pessoal' => 'nullable|email|max:255',
            'estado_civil' => 'nullable|string|max:20',
            'escolaridade' => 'nullable|string|max:20',
            'formacao' => 'nullable|string|max:255',
            'quantidade_dependentes' => 'nullable|integer|min:0|max:9',
            'autoriza_envio' => 'nullable|string',
            'nao_autoriza_envio' => 'nullable|string',
            // Para os dependentes será tratado à parte
        ]);

        // Validação dos dependentes (opcional)
        $dependentes = [];
        $qtd = $data['quantidade_dependentes'] ?? 0;

        for ($i = 1; $i <= $qtd; $i++) {
            $dependentes[] = [
                'nome' => $request->input("dependente_nome_$i"),
                'parentesco' => $request->input("dependente_parentesco_$i"),
                'data_nascimento' => $request->input("dependente_data_nascimento_$i"),
            ];
        }

        // Aqui você pode salvar no banco, gerar PDF, enviar email, etc.

        // Para teste, vamos só retornar os dados para ver
        return back()->with('success', 'Formulário enviado com sucesso!')->withInput();
    }
}
