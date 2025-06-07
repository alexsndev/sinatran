@extends('layouts.public')

@section('title', 'Página Inicial')

@section('content')

    <section class="mt-0 max-w-7xl mx-auto px-2 sm:px-6">

        {{-- Últimas Notícias --}}
        <div class="max-w-7xl mx-auto px-0 py-0">
            <div class="mb-8 flex items-center space-x-3">
                <div class="w-2 h-8 bg-[#dbfc03] rounded"></div>
                <h2 class="text-2xl font-semibold text-gray-800">Últimas Notícias</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($noticias as $loopIndex => $noticia)
                    <div class="bg-white rounded-2xl shadow overflow-hidden flex flex-col h-[480px] relative border border-gray-100 group cursor-pointer" onclick="window.location='{{ route('noticias.show', $noticia->id) }}'">
                        @php
                            $imagem = $noticia->imagemCapa ?? null;
                            $urlImagem = null;
                            if ($imagem && !empty($imagem->url)) {
                                $urlImagem = $imagem->url;
                            } elseif (!empty($noticia->imagem)) {
                                if (filter_var($noticia->imagem, FILTER_VALIDATE_URL)) {
                                    $urlImagem = $noticia->imagem;
                                } else {
                                    $urlImagem = asset('storage/' . $noticia->imagem);
                                }
                            }
                            // Tempo de leitura estimado (200 palavras por min)
                            $palavras = str_word_count(strip_tags($noticia->conteudo));
                            $tempoLeitura = max(1, ceil($palavras / 200));
                            $atualizado = $noticia->updated_at && $noticia->updated_at != $noticia->created_at ? $noticia->updated_at : null;
                            $isNovo = $noticia->created_at && $noticia->created_at->gt(now()->subDay());
                            $tags = $noticia->tags ?? []; // Supondo que exista relação tags
                        @endphp

                        @if ($loopIndex === 0)
                            <span class="absolute top-3 left-3 bg-yellow-400 text-xs font-bold px-3 py-1 rounded-full shadow text-gray-900 z-10">Destaque</span>
                        @endif
                        @if ($isNovo)
                            <span class="absolute top-3 right-3 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-full shadow z-10">Novo</span>
                        @endif

                        @if ($urlImagem)
                            <a href="{{ route('noticias.show', $noticia->id) }}" class="block focus:outline-none">
                                <img src="{{ $urlImagem }}" alt="{{ $noticia->titulo }}" class="w-full h-56 object-cover transition group-hover:opacity-90">
                            </a>
                        @endif

                        <div class="p-4 flex flex-col justify-between flex-grow">
                            <div class="flex items-center text-xs text-gray-500 mb-2 gap-2 flex-wrap">
                                <span class="inline-flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    {{ $noticia->created_at ? $noticia->created_at->format('d M Y') : '' }}
                                    @if($noticia->created_at)
                                        <span class="ml-2 text-gray-400">({{ $noticia->created_at->diffForHumans() }})</span>
                                    @endif
                                </span>
                                @if($atualizado)
                                    <span class="inline-flex items-center">
                                        <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3"/></svg>
                                        Atualizado em {{ $atualizado->format('d M Y H:i') }}
                                    </span>
                                @endif
                                @if($noticia->autor ?? false)
                                    <span class="inline-flex items-center">
                                        <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        {{ $noticia->autor }}
                                    </span>
                                @endif
                                <span class="inline-flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 17l4 4 4-4m-4-5v9"/></svg>
                                    {{ $tempoLeitura }} min leitura
                                </span>
                                @if($noticia->visualizacoes ?? false)
                                    <span class="inline-flex items-center">
                                        <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        {{ $noticia->visualizacoes }} visualizações
                                    </span>
                                @endif
                                @if($noticia->categoria)
                                    <span class="inline-flex items-center bg-blue-50 text-blue-700 px-2 py-0.5 rounded-full ml-2">
                                        {{ $noticia->categoria->nome }}
                                    </span>
                                @endif
                            </div>
                            {{-- Tags --}}
                            @if(!empty($tags))
                                <div class="mb-2 flex flex-wrap gap-2">
                                    @foreach($tags as $tag)
                                        <span class="bg-gray-100 text-gray-700 text-xs px-2 py-0.5 rounded-full">#{{ $tag->nome ?? $tag }}</span>
                                    @endforeach
                                </div>
                            @endif
                            <a href="{{ route('noticias.show', $noticia->id) }}" class="block focus:outline-none">
                                <h2 class="text-lg font-semibold mb-2 text-gray-900
                                    overflow-hidden
                                    text-ellipsis
                                    break-words
                                    line-clamp-2
                                ">
                                    {{ $noticia->titulo }}
                                </h2>
                                <p class="text-gray-600 text-sm
                                    overflow-hidden
                                    text-ellipsis
                                    break-words
                                    line-clamp-4
                                ">
                                    {{ strip_tags($noticia->conteudo) }}
                                </p>
                            </a>
                            <div class="flex items-center justify-between mt-3">
                                <a href="{{ route('noticias.show', $noticia->id) }}" class="inline-flex items-center text-blue-700 hover:underline font-semibold text-sm">
                                    Ler mais
                                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </a>
                                <div class="flex gap-2">
                                    <a href="#" title="Compartilhar no WhatsApp" class="text-green-500 hover:text-green-700">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.52 3.48A12.07 12.07 0 0012 0C5.37 0 0 5.37 0 12a11.94 11.94 0 001.64 6.06L0 24l6.18-1.62A12 12 0 0012 24c6.63 0 12-5.37 12-12a11.94 11.94 0 00-3.48-8.52zM12 22a9.93 9.93 0 01-5.1-1.39l-.36-.21-3.67.96.98-3.58-.23-.37A9.93 9.93 0 012 12c0-5.52 4.48-10 10-10s10 4.48 10 10-4.48 10-10 10zm5.2-7.6c-.28-.14-1.65-.81-1.9-.9s-.44-.14-.62.14-.71.9-.87 1.08-.32.21-.6.07a8.1 8.1 0 01-2.38-1.47 8.93 8.93 0 01-1.65-2.05c-.17-.28-.02-.43.13-.57.13-.13.28-.34.42-.51.14-.17.19-.28.28-.47.09-.19.05-.36-.02-.5s-.62-1.5-.85-2.06c-.22-.53-.45-.46-.62-.47-.16-.01-.36-.01-.56-.01s-.51.07-.78.36c-.27.29-1.03 1.01-1.03 2.47s1.06 2.87 1.21 3.07c.15.2 2.09 3.2 5.07 4.36.71.25 1.26.4 1.69.51.71.18 1.36.15 1.87.09.57-.07 1.65-.67 1.89-1.32.23-.65.23-1.21.16-1.32-.07-.11-.25-.18-.53-.32z"/></svg>
                                    </a>
                                    <a href="#" title="Compartilhar no Twitter" class="text-blue-400 hover:text-blue-600">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.56c-.89.39-1.85.65-2.86.77a4.93 4.93 0 002.16-2.72c-.95.56-2 .97-3.13 1.19A4.92 4.92 0 0016.62 3c-2.73 0-4.94 2.21-4.94 4.93 0 .39.04.77.12 1.13C7.69 8.82 4.07 6.88 1.64 3.9c-.43.74-.67 1.6-.67 2.52 0 1.74.89 3.28 2.25 4.18-.83-.03-1.61-.25-2.3-.63v.06c0 2.43 1.73 4.46 4.03 4.92-.42.11-.86.17-1.32.17-.32 0-.63-.03-.93-.09.63 1.97 2.45 3.41 4.6 3.45A9.87 9.87 0 010 21.54a13.94 13.94 0 007.56 2.22c9.05 0 14-7.5 14-14 0-.21 0-.42-.02-.63A9.93 9.93 0 0024 4.56z"/></svg>
                                    </a>
                                    <button onclick="navigator.clipboard.writeText('{{ route('noticias.show', $noticia->id) }}')" title="Copiar link" class="text-gray-400 hover:text-gray-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16h8a2 2 0 002-2V7a2 2 0 00-2-2H8a2 2 0 00-2 2v7a2 2 0 002 2z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8a2 2 0 01-2 2H7a2 2 0 01-2-2V8"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Categorias --}}
        <div class="mb-8 mt-8 flex items-center space-x-3">
            <div class="w-2 h-8 bg-[#dbfc03] rounded"></div>
            <h2 class="text-2xl font-semibold text-gray-800">Notícias Por Categoria</h2>
        </div>

        @foreach ($categorias as $categoria)
            <div class="mt-12">
                <h3 class="uppercase text-xl font-semibold mb-6 text-blue-700 overflow-hidden break-words line-clamp-2 max-w-full">
                    {{ $categoria->nome }}
                </h3>
                @if ($categoria->noticias->count())
                    <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-4">
                        @foreach ($categoria->noticias as $post)
                            @php
                                $imagem = $post->imagemCapa ?? null;
                                $urlImagem = null;
                                if ($imagem && !empty($imagem->url)) {
                                    $urlImagem = $imagem->url;
                                } elseif (!empty($post->imagem)) {
                                    if (filter_var($post->imagem, FILTER_VALIDATE_URL)) {
                                        $urlImagem = $post->imagem;
                                    } else {
                                        $storagePath = 'storage/' . $post->imagem;
                                        if (file_exists(public_path($storagePath))) {
                                            $urlImagem = asset($storagePath);
                                        }
                                    }
                                }
                                $palavras = str_word_count(strip_tags($post->conteudo));
                                $tempoLeitura = max(1, ceil($palavras / 200));
                            @endphp

                            <div class="bg-white rounded-lg transition border border-gray-100 h-full flex flex-col group cursor-pointer" onclick="window.location='{{ route('noticias.show', $post->id) }}'">
                                @if ($urlImagem)
                                    <a href="{{ route('noticias.show', $post->id) }}" class="block focus:outline-none">
                                        <img src="{{ $urlImagem }}" alt="{{ $post->titulo }}" class="mb-3 w-full h-40 object-cover rounded transition group-hover:opacity-90">
                                    </a>
                                @endif

                                <div class="flex items-center text-xs text-gray-500 mb-1 gap-2 flex-wrap px-2">
                                    <span>
                                        {{ $post->created_at ? $post->created_at->format('d M Y') : '' }}
                                    </span>
                                    <span>
                                        {{ $tempoLeitura }} min leitura
                                    </span>
                                    @if($post->categoria)
                                        <span class="inline-flex items-center bg-blue-50 text-blue-700 px-2 py-0.5 rounded-full ml-2">
                                            {{ $post->categoria->nome }}
                                        </span>
                                    @endif
                                </div>
                                <a href="{{ route('noticias.show', $post->id) }}" class="block focus:outline-none">
                                    <h4 class="font-semibold text-base mb-2 text-gray-900
                                        overflow-hidden
                                        text-ellipsis
                                        break-words
                                        line-clamp-2
                                        px-2
                                    ">
                                        {{ $post->titulo }}
                                    </h4>
                                    <p class="text-gray-600 text-sm line-clamp-3 px-2">
                                        {{ $post->resumo ?? \Illuminate\Support\Str::limit(strip_tags($post->conteudo), 100) }}
                                    </p>
                                </a>
                                <div class="flex-1"></div>
                                <div class="flex items-center justify-between mt-2 px-2 pb-2">
                                    <a href="{{ route('noticias.show', $post->id) }}" class="inline-flex items-center text-blue-700 hover:underline font-semibold text-xs">
                                        Ler mais
                                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                    </a>
                                    <div class="flex gap-2">
                                        <a href="#" title="Compartilhar no WhatsApp" class="text-green-500 hover:text-green-700">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.52 3.48A12.07 12.07 0 0012 0C5.37 0 0 5.37 0 12a11.94 11.94 0 001.64 6.06L0 24l6.18-1.62A12 12 0 0012 24c6.63 0 12-5.37 12-12a11.94 11.94 0 00-3.48-8.52zM12 22a9.93 9.93 0 01-5.1-1.39l-.36-.21-3.67.96.98-3.58-.23-.37A9.93 9.93 0 012 12c0-5.52 4.48-10 10-10s10 4.48 10 10-4.48 10-10 10zm5.2-7.6c-.28-.14-1.65-.81-1.9-.9s-.44-.14-.62.14-.71.9-.87 1.08-.32.21-.6.07a8.1 8.1 0 01-2.38-1.47 8.93 8.93 0 01-1.65-2.05c-.17-.28-.02-.43.13-.57.13-.13.28-.34.42-.51.14-.17.19-.28.28-.47.09-.19.05-.36-.02-.5s-.62-1.5-.85-2.06c-.22-.53-.45-.46-.62-.47-.16-.01-.36-.01-.56-.01s-.51.07-.78.36c-.27.29-1.03 1.01-1.03 2.47s1.06 2.87 1.21 3.07c.15.2 2.09 3.2 5.07 4.36.71.25 1.26.4 1.69.51.71.18 1.36.15 1.87.09.57-.07 1.65-.67 1.89-1.32.23-.65.23-1.21.16-1.32-.07-.11-.25-.18-.53-.32z"/></svg>
                                        </a>
                                        <a href="#" title="Compartilhar no Twitter" class="text-blue-400 hover:text-blue-600">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.56c-.89.39-1.85.65-2.86.77a4.93 4.93 0 002.16-2.72c-.95.56-2 .97-3.13 1.19A4.92 4.92 0 0016.62 3c-2.73 0-4.94 2.21-4.94 4.93 0 .39.04.77.12 1.13C7.69 8.82 4.07 6.88 1.64 3.9c-.43.74-.67 1.6-.67 2.52 0 1.74.89 3.28 2.25 4.18-.83-.03-1.61-.25-2.3-.63v.06c0 2.43 1.73 4.46 4.03 4.92-.42.11-.86.17-1.32.17-.32 0-.63-.03-.93-.09.63 1.97 2.45 3.41 4.6 3.45A9.87 9.87 0 010 21.54a13.94 13.94 0 007.56 2.22c9.05 0 14-7.5 14-14 0-.21 0-.42-.02-.63A9.93 9.93 0 0024 4.56z"/></svg>
                                        </a>
                                        <button onclick="navigator.clipboard.writeText('{{ route('noticias.show', $post->id) }}')" title="Copiar link" class="text-gray-400 hover:text-gray-700">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16h8a2 2 0 002-2V7a2 2 0 00-2-2H8a2 2 0 00-2 2v7a2 2 0 002 2z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8a2 2 0 01-2 2H7a2 2 0 01-2-2V8"/></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">Nenhum post encontrado na categoria {{ $categoria->nome }}.</p>
                @endif
            </div>
        @endforeach

    </section>

@endsection
