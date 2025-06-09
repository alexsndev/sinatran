<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiliacaoDependentesTable extends Migration
{
    public function up()
    {
        Schema::create('filiacao_dependentes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('filiacao_id')->constrained('filiacaos')->onDelete('cascade');
            $table->string('nome', 255)->nullable();
            $table->string('parentesco', 100)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('filiacao_dependentes');
    }
}
