<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiacao extends Model
{
    protected $fillable = [
        'cep', 'endereco', 'bairro', 'cidade', 'uf', 'nome', 'matricula', 'rg', 'orgao_expedidor', 'cpf',
        'data_nascimento', 'naturalidade', 'tipo_sanguineo', 'sexo', 'filiacao_pai', 'filiacao_mae', 'cargo',
        'data_admissao', 'situacao_servidor', 'telefone1', 'telefone2', 'email_funcional', 'email_pessoal',
        'estado_civil', 'escolaridade', 'formacao', 'quantidade_dependentes',
    ];

    public function dependentes()
    {
        return $this->hasMany(FiliacaoDependente::class);
    }
}
