@extends('layouts.public')

@section('title', $noticia->titulo)

@section('content')
    <article class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-bold mb-4">{{ $noticia->titulo }}</h1>
        <p class="text-gray-500 text-sm mb-6">
            Publicado em {{ $noticia->created_at->format('d/m/Y') }}
            @if($noticia->categoria)
                | Categoria: <a href="{{ route('categorias.show', $noticia->categoria->id) }}" class="text-blue-600 hover:underline">{{ $noticia->categoria->nome }}</a>
            @endif
        </p>

        <div class="prose max-w-full">
            {!! nl2br(e($noticia->conteudo)) !!}
        </div>

        <a href="{{ route('noticias.index') }}" class="inline-block mt-8 text-blue-600 hover:underline">
            ← Voltar para notícias
        </a>
    </article>
@endsection
