<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiliacaosTable extends Migration
{
    public function up()
    {
        Schema::create('filiacaos', function (Blueprint $table) {
            $table->id();
            $table->string('cep', 20);
            $table->string('endereco', 255);
            $table->string('bairro', 100);
            $table->string('cidade', 100);
            $table->string('uf', 2);
            $table->string('nome', 255);
            $table->string('matricula', 50);
            $table->string('rg', 50);
            $table->string('orgao_expedidor', 50);
            $table->string('cpf', 20);
            $table->date('data_nascimento');
            $table->string('naturalidade', 100)->nullable();
            $table->string('tipo_sanguineo', 10)->nullable();
            $table->string('sexo', 20)->nullable();
            $table->string('filiacao_pai', 255)->nullable();
            $table->string('filiacao_mae', 255)->nullable();
            $table->string('cargo', 100)->nullable();
            $table->date('data_admissao')->nullable();
            $table->string('situacao_servidor', 50)->nullable();
            $table->string('telefone1', 30);
            $table->string('telefone2', 30)->nullable();
            $table->string('email_funcional', 100)->nullable();
            $table->string('email_pessoal', 100)->nullable();
            $table->string('estado_civil', 30)->nullable();
            $table->string('escolaridade', 50)->nullable();
            $table->string('formacao', 100)->nullable();
            $table->integer('quantidade_dependentes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('filiacaos');
    }
}
