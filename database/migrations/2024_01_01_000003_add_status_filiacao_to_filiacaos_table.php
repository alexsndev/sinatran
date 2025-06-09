<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusFiliacaoToFiliacaosTable extends Migration
{
    public function up()
    {
        Schema::table('filiacaos', function (Blueprint $table) {
            $table->string('status_filiacao', 30)->default('ativo')->after('quantidade_dependentes');
        });
    }

    public function down()
    {
        Schema::table('filiacaos', function (Blueprint $table) {
            $table->dropColumn('status_filiacao');
        });
    }
}
