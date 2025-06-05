<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\Media;  // <-- IMPORTAR com "Media"

class Noticia extends Model
{
    protected $fillable = ['titulo', 'conteudo', 'imagem', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

   public function medias()
    {
        return $this->hasMany(Media::class, 'postID');
    }

    public function imagemCapa()
    {
        return $this->hasOne(Media::class, 'postID')->where('typeID', 1);
    }


    public function urlImagem()
{
    if ($this->imagem) {
        return asset('storage/' . $this->imagem);
    }
    return null; // ou imagem padrão
}

}
