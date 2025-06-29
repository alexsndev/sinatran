@extends('layouts.admin')

@section('title', 'Editar Notícia')

@section('content')
    <form action="{{ route('admin.noticias.update', $noticia->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold mb-1">Título</label>
            <input type="text" name="titulo" value="{{ old('titulo', $noticia->titulo) }}"
                   class="w-full border rounded px-4 py-2" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Categoria</label>
            <select name="categoria_id" class="w-full border rounded px-4 py-2" required>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $noticia->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold mb-1">Imagem Atual</label>
            @php
                $urlImagem = null;
                if (!empty($noticia->imagem)) {
                    if (filter_var($noticia->imagem, FILTER_VALIDATE_URL)) {
                        $urlImagem = $noticia->imagem;
                    } else {
                        $urlImagem = asset('storage/' . $noticia->imagem);
                    }
                }
            @endphp

            @if ($urlImagem)
                <img src="{{ $urlImagem }}" alt="{{ $noticia->titulo }}" class="mb-4 w-full max-w-xs h-40 object-cover rounded">
            @endif

            <input type="file" name="imagem" class="w-full border rounded px-4 py-2">
        </div>

        <div>
            <label class="block font-semibold mb-1">Conteúdo</label>
            <textarea name="conteudo" rows="10" class="w-full border rounded px-4 py-2" required>{{ old('conteudo', $noticia->conteudo) }}</textarea>
        </div>

        <div>
            <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">
                Atualizar Notícia
            </button>
        </div>
    </form>
@endsection
