<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiacao;
use App\Models\FiliacaoDependente;
use Barryvdh\DomPDF\Facade\Pdf; // Certifique-se de instalar barryvdh/laravel-dompdf

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

        // Gere o PDF após salvar os dados
        $data = $request->all();

        // Caminho da logo para passar para a view
        //$data['logo_path'] = public_path('images/sinatrandf.png');

        $pdf = Pdf::loadView('filiacao.pdf', compact('data'))
            ->setPaper('a4')
            ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

        // Download direto após cadastro
        return $pdf->download('ficha_filiacao_'.$data['cpf'].'.pdf');
    }
}

// DICA DE DIAGNÓSTICO:
// 1. Verifique se o seeder realmente rodou na base correta e se a tabela está populada.
// 2. O controller público (FiliacaoController) não tem método index, então a view de admin não usa esse controller.
// 3. O CRUD de admin usa o controller Admin\FiliacaoAdminController. O seeder deve popular a tabela 'filiacaos'.
// 4. No Tinker, rode: Filiacao::count(); para ver se há registros.
// 5. Se não há registros, rode: php artisan migrate:fresh --seed
// 6. Se há registros, mas não aparecem, veja se o controller admin está usando o model correto e a view correta.
// 7. Se o nome da tabela está diferente (ex: 'filiacaos' vs 'filiacoes'), ajuste o model Filiacao:

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Filiacao extends Model
// {
//     // ...existing code...
//     protected $table = 'filiacaos'; // Confirme se o nome da tabela está correto
//     // ...existing code...
// }

// Remova qualquer código PHP do tipo "<?php" ou comandos artisan do prompt do Tinker.
// Para contar registros no Tinker, digite apenas:

// e pressione Enter.
// Não coloque "<?php" ou comandos artisan dentro do Tinker.
// Se \App\Models\Filiacao::count() retornou 0, significa que a tabela está vazia.
// Para popular com os dados do seeder, rode:
    // php artisan migrate:fresh --seed
// Isso irá recriar as tabelas e rodar todos os seeders, preenchendo a tabela 'filiacaos'.
// Depois, rode novamente no Tinker:
    // \App\Models\Filiacao::count()
// O resultado deve ser maior que 0.
// Se continuar 0, confira se o seeder está registrado em DatabaseSeeder.php e se não há erro no seeder.
