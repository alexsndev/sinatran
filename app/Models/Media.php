<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    // 1️⃣ Defina constantes de tipo para legibilidade
    public const TYPE_CAPA    = 1;
    public const TYPE_GALERIA = 2;
    public const TYPE_VIDEO   = 3;

    protected $table = 'media';
    protected $fillable = ['postID', 'typeID', 'url'];

    public function noticia()
    {
        // 2️⃣ Deixe explícito que usa postID como FK
        return $this->belongsTo(Noticia::class, 'postID');
    }
}
