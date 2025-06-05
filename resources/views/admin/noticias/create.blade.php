@extends('layouts.admin')

@section('title', 'Nova Notícia')

@section('content')
    <form action="{{ route('admin.noticias.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block font-semibold mb-1">Titulo</label>
            <input type="text" name="titulo" value="{{ old('titulo') }}"
                   class="w-full border rounded px-4 py-2" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Categoria</label>
            <select name="categoria_id" class="w-full border rounded px-4 py-2" required>
                <option value="">Selecione</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold mb-1">Imagem de Capa</label>
            <input type="file" name="imagem" class="w-full border rounded px-4 py-2">
        </div>

        <div>
            <label class="block font-semibold mb-1">Conteúdo</label>
            <textarea name="conteudo" rows="10" class="w-full border rounded px-4 py-2" required>{{ old('conteudo') }}</textarea>
        </div>

        <div>
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                Publicar Notícia
            </button>
        </div>
    </form>
@endsection
