<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FiliacaoDependente extends Model
{
    protected $fillable = [
        'filiacao_id', 'nome', 'parentesco', 'data_nascimento',
    ];

    public function filiacao()
    {
        return $this->belongsTo(Filiacao::class);
    }
}
