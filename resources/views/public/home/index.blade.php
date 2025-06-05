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
                @foreach ($noticias as $noticia)
                    <div class="bg-white rounded-2xl shadow overflow-hidden flex flex-col h-[440px]">
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
@endphp


                        @if ($urlImagem)
                            <img src="{{ $urlImagem }}" alt="{{ $noticia->titulo }}" class="w-full h-56 object-cover">
                        @endif

                        <div class="p-4 flex flex-col justify-between flex-grow">
                            <div class="overflow-hidden">
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
                            </div>
                            <a href="{{ route('noticias.show', $noticia->id) }}" class="text-blue-600 hover:underline mt-0 text-sm font-medium">
                                Ler mais
                            </a>
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
                            @endphp

                            <div class="bg-white rounded-lg transition">
                                @if ($urlImagem)
                                    <img src="{{ $urlImagem }}" alt="{{ $post->titulo }}" class="mb-3 w-full h-40 object-cover rounded">
                                @endif

                                <h4 class="font-semibold text-base mb-2 text-gray-900
                                    overflow-hidden
                                    text-ellipsis
                                    break-words
                                    line-clamp-2
                                ">
                                    <a href="{{ route('noticias.show', $post->id) }}" class="hover:underline">
                                        {{ $post->titulo }}
                                    </a>
                                </h4>
                                <p class="text-gray-600 text-sm line-clamp-3">
                                    {{ $post->resumo ?? \Illuminate\Support\Str::limit(strip_tags($post->conteudo), 100) }}
                                </p>
                                <p class="text-lg text-gray-400 mt-2">{{ $categoria->nome }}</p>
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
