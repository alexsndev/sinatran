@extends('layouts.public')

@section('title', $noticia->titulo)

@section('content')
    <article class="max-w-3xl mx-auto bg-white rounded-2xl p-6 mt-6 mb-10 border border-gray-100">
        <h1 class="text-2xl font-bold mb-2 text-gray-900 leading-tight">{{ $noticia->titulo }}</h1>
        <div class="flex flex-wrap items-center text-xs text-gray-500 mb-4 gap-3">
            @if($noticia->created_at)
                <span class="inline-flex items-center">
                    <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Publicado em {{ $noticia->created_at->format('d/m/Y') }}
                    <span class="ml-2 text-gray-400">({{ $noticia->created_at->diffForHumans() }})</span>
                </span>
            @endif
            @if($noticia->updated_at && $noticia->updated_at != $noticia->created_at)
                <span class="inline-flex items-center">
                    <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3"/></svg>
                    Atualizado em {{ $noticia->updated_at->format('d/m/Y H:i') }}
                </span>
            @endif
            @if($noticia->autor ?? false)
                <span class="inline-flex items-center">
                    <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    {{ $noticia->autor }}
                </span>
            @endif
            @if($noticia->visualizacoes ?? false)
                <span class="inline-flex items-center">
                    <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    {{ $noticia->visualizacoes }} visualizações
                </span>
            @endif
            @if($noticia->categoria)
                <span class="inline-flex items-center bg-blue-50 text-blue-700 px-2 py-0.5 rounded-full">
                    <svg class="w-4 h-4 mr-1 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 21V7a2 2 0 00-2-2H6a2 2 0 00-2 2v14"/></svg>
                    <a href="{{ route('categorias.show', $noticia->categoria->id) }}" class="hover:underline">{{ $noticia->categoria->nome }}</a>
                </span>
            @endif
            @php
                $palavras = str_word_count(strip_tags($noticia->conteudo));
                $tempoLeitura = max(1, ceil($palavras / 200));
                $tags = $noticia->tags ?? [];
            @endphp
            <span class="inline-flex items-center">
                <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 17l4 4 4-4m-4-5v9"/></svg>
                {{ $tempoLeitura }} min leitura
            </span>
        </div>

        {{-- Tags --}}
        @if(!empty($tags))
            <div class="mb-4 flex flex-wrap gap-2">
                @foreach($tags as $tag)
                    <span class="bg-gray-100 text-gray-700 text-xs px-2 py-0.5 rounded-full">#{{ $tag->nome ?? $tag }}</span>
                @endforeach
            </div>
        @endif

        <div class="w-full flex justify-center mb-8">
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
                <img src="{{ $urlImagem }}" alt="{{ $noticia->titulo }}" class="w-full h-80 object-cover rounded mb-6">
            @endif
        </div>

        <div class="prose max-w-full prose-blue prose-img:rounded-xl mb-8">
            {!! $noticia->conteudo !!}
        </div>

        {{-- Removido bloco de exibição de medias --}}
        {{--
        @if(isset($noticia->medias) && $noticia->medias->count())
            <div class="flex flex-wrap gap-4 my-8 justify-center">
                @foreach($noticia->medias as $media)
                    @if(!empty($media->url))
                        <img src="{{ asset($media->url) }}" alt="Imagem relacionada" class="rounded-xl max-w-xs max-h-64 object-cover border border-gray-200">
                    @endif
                @endforeach
            </div>
        @endif
        --}}

        <div class="flex items-center gap-4 mt-8">
            <a href="{{ route('noticias.index') }}" class="inline-flex items-center gap-2 text-blue-700 hover:underline font-semibold text-base">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                Voltar para notícias
            </a>
            <button onclick="navigator.clipboard.writeText(window.location.href)" title="Copiar link" class="text-gray-400 hover:text-gray-700 flex items-center gap-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16h8a2 2 0 002-2V7a2 2 0 00-2-2H8a2 2 0 00-2 2v7a2 2 0 002 2z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8a2 2 0 01-2 2H7a2 2 0 01-2-2V8"/></svg>
                Copiar link
            </button>
        </div>
    </article>
@endsection
