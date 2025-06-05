@extends('layouts.public')

@section('title', $categoria->nome)

@section('content')
    <h1 class="text-2xl font-bold mb-6">Notícias da categoria: {{ $categoria->nome }}</h1>

    @if($categoria->noticias->isEmpty())
        <p class="text-gray-600">Nenhuma notícia encontrada nesta categoria.</p>
    @else
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($categoria->noticias as $noticia)
                <article class="border rounded p-4 hover:shadow-lg transition cursor-pointer" onclick="window.location='{{ route('noticias.show', $noticia->id) }}'">
                    <h2 class="text-xl font-semibold mb-2">{{ $noticia->titulo }}</h2>
                    <p class="text-gray-700 mb-4">{{ Str::limit($noticia->resumo, 100) }}</p>
                    <a href="{{ route('noticias.show', $noticia->id) }}" class="text-blue-600 hover:underline">Leia mais</a>
                </article>
            @endforeach
        </div>
    @endif
@endsection
