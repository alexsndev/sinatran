@extends('layouts.public')

@section('title', 'Notícias')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Últimas Notícias</h1>

    @if($noticias->isEmpty())
        <p class="text-gray-600">Nenhuma notícia encontrada.</p>
    @else
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($noticias as $noticia)
                <article class="border rounded p-4 hover:shadow-lg transition cursor-pointer" onclick="window.location='{{ route('noticias.show', $noticia->id) }}'">
                    <h2 class="text-xl font-semibold mb-2">{{ $noticia->titulo }}</h2>
                    <p class="text-gray-700 mb-4">{{ Str::limit($noticia->resumo, 100) }}</p>
                    <a href="{{ route('noticias.show', $noticia->id) }}" class="text-blue-600 hover:underline">Leia mais</a>
                </article>
            @endforeach
        </div>
    @endif
@endsection
