@extends('layouts.admin')

@section('title', 'Nova Notícia')

@section('content')
    <form action="{{ route('admin.noticias.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <style>
            input::placeholder, textarea::placeholder {
                color: #000 !important;
                opacity: 1 !important;
            }
            input[type="file"] {
                color: #000 !important;
            }
            input[type="file"]::file-selector-button {
                color: #000 !important;
                background: #fff !important;
                border: 1px solid #d1d5db !important;
                padding: 0.5rem 1rem;
                border-radius: 0.375rem;
                cursor: pointer;
            }
        </style>

        <div>
    <label class="block font-semibold mb-1">Título</label>
    <input
        type="text"
        name="titulo"
        value="{{ old('titulo') }}"
        class="w-full border rounded px-4 py-2 @error('titulo') border-red-500 @enderror"
        style="color: black !important"
        required
        placeholder="Digite o título"
    >
    @error('titulo')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div>
    <label class="block font-semibold mb-1">Categoria</label>
    <select
        name="categoria_id"
        class="w-full border rounded px-4 py-2 @error('categoria_id') border-red-500 @enderror"
        style="color: black !important"
        required
    >
        <option value="">Selecione</option>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nome }}
            </option>
        @endforeach
    </select>
    @error('categoria_id')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>


        <div>
            <label class="block font-semibold mb-1">Imagem de Capa</label>
            <input
                type="file"
                name="imagem"
                accept="image/*"
                class="w-full border rounded px-4 py-2 @error('imagem') border-red-500 @enderror"
            >
            @error('imagem')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

  <div>
    <label class="block font-semibold mb-1">Conteúdo</label>
    <textarea
        name="conteudo"
        rows="10"
        class="w-full border rounded px-4 py-2 @error('conteudo') border-red-500 @enderror"
        required
        placeholder="Digite o conteúdo"
        style="color: black !important"
    >{{ old('conteudo') }}</textarea>
    @error('conteudo')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

        <div>
            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow-md transition"
            >
                Publicar Notícia
            </button>
        </div>
    </form>
@endsection
