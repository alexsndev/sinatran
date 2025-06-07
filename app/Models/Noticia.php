<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Media;

class Noticia extends Model
{
    protected $fillable = ['titulo', 'conteudo', 'imagem', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function medias()
    {
        // 3️⃣ Informe a FK postID explicitamente
        return $this->hasMany(Media::class, 'postID');
    }

    public function imagemCapa()
    {
        // 4️⃣ Use a constante TYPE_CAPA
        return $this->hasOne(Media::class, 'postID')
                    ->where('typeID', Media::TYPE_CAPA);
    }

    public function galeria()
    {
        // 5️⃣ Novo método: todas as mídias de galeria
        return $this->hasMany(Media::class, 'postID')
                    ->where('typeID', Media::TYPE_GALERIA);
    }
}
