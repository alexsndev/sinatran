<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Filiacao;
use App\Models\FiliacaoDependente;

class FiliacaoSeeder extends Seeder
{
    public function run()
    {
        // Exemplo 1
        $filiacao1 = Filiacao::create([
            'cep' => '70000-000',
            'endereco' => 'Rua das Flores, 123',
            'bairro' => 'Centro',
            'cidade' => 'Brasília',
            'uf' => 'DF',
            'nome' => 'João da Silva',
            'matricula' => '123456',
            'rg' => '123456789',
            'orgao_expedidor' => 'SSP-DF',
            'cpf' => '123.456.789-00',
            'data_nascimento' => '1985-05-10',
            'naturalidade' => 'Brasília',
            'tipo_sanguineo' => 'O+',
            'sexo' => 'Masculino',
            'filiacao_pai' => 'José da Silva',
            'filiacao_mae' => 'Maria da Silva',
            'cargo' => 'Agente de Trânsito',
            'data_admissao' => '2010-03-15',
            'situacao_servidor' => 'Ativo',
            'telefone1' => '(61) 99999-1111',
            'telefone2' => '(61) 98888-2222',
            'email_funcional' => 'joao.silva@funcional.com',
            'email_pessoal' => 'joao@gmail.com',
            'estado_civil' => 'Casado(a)',
            'escolaridade' => 'Superior',
            'formacao' => 'Direito',
            'quantidade_dependentes' => 2,
        ]);
        FiliacaoDependente::create([
            'filiacao_id' => $filiacao1->id,
            'nome' => 'Lucas da Silva',
            'parentesco' => 'Filho',
            'data_nascimento' => '2012-08-20',
        ]);
        FiliacaoDependente::create([
            'filiacao_id' => $filiacao1->id,
            'nome' => 'Ana da Silva',
            'parentesco' => 'Filha',
            'data_nascimento' => '2015-11-05',
        ]);

        // Exemplo 2
        $filiacao2 = Filiacao::create([
            'cep' => '70200-100',
            'endereco' => 'Av. das Palmeiras, 456',
            'bairro' => 'Asa Sul',
            'cidade' => 'Brasília',
            'uf' => 'DF',
            'nome' => 'Maria Oliveira',
            'matricula' => '654321',
            'rg' => '987654321',
            'orgao_expedidor' => 'SSP-DF',
            'cpf' => '987.654.321-00',
            'data_nascimento' => '1990-12-01',
            'naturalidade' => 'Goiânia',
            'tipo_sanguineo' => 'A-',
            'sexo' => 'Feminino',
            'filiacao_pai' => 'Carlos Oliveira',
            'filiacao_mae' => 'Sônia Oliveira',
            'cargo' => 'Agente de Trânsito',
            'data_admissao' => '2015-07-01',
            'situacao_servidor' => 'Ativo',
            'telefone1' => '(61) 97777-3333',
            'telefone2' => '',
            'email_funcional' => 'maria.oliveira@funcional.com',
            'email_pessoal' => 'maria@gmail.com',
            'estado_civil' => 'Solteiro(a)',
            'escolaridade' => 'Mestrado',
            'formacao' => 'Engenharia Civil',
            'quantidade_dependentes' => 1,
        ]);
        FiliacaoDependente::create([
            'filiacao_id' => $filiacao2->id,
            'nome' => 'Pedro Oliveira',
            'parentesco' => 'Filho',
            'data_nascimento' => '2018-03-10',
        ]);

        // Exemplo 3
        $filiacao3 = Filiacao::create([
            'cep' => '70300-200',
            'endereco' => 'Quadra 10, Bloco B, Apt 101',
            'bairro' => 'Asa Norte',
            'cidade' => 'Brasília',
            'uf' => 'DF',
            'nome' => 'Carlos Souza',
            'matricula' => '789123',
            'rg' => '321654987',
            'orgao_expedidor' => 'SSP-DF',
            'cpf' => '321.654.987-00',
            'data_nascimento' => '1978-09-25',
            'naturalidade' => 'Belo Horizonte',
            'tipo_sanguineo' => 'B+',
            'sexo' => 'Masculino',
            'filiacao_pai' => 'Antonio Souza',
            'filiacao_mae' => 'Helena Souza',
            'cargo' => 'Supervisor',
            'data_admissao' => '2005-01-20',
            'situacao_servidor' => 'Ativo',
            'telefone1' => '(61) 96666-4444',
            'telefone2' => '',
            'email_funcional' => 'carlos.souza@funcional.com',
            'email_pessoal' => 'carlos@gmail.com',
            'estado_civil' => 'Divorciado(a)',
            'escolaridade' => 'Superior',
            'formacao' => 'Administração',
            'quantidade_dependentes' => 0,
        ]);
    }
}
