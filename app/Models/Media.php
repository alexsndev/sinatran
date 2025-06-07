<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
     protected $table = 'media'; // nome exato da tabela no banco

    protected $fillable = ['postID', 'typeID', 'url'];

public function noticia()
{
    return $this->belongsTo(Noticia::class, 'postID');
}
}

