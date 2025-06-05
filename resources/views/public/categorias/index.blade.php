@extends('layouts.public')
{{-- Use Bootstrap CSS --}}

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div style="padding-inline: 80px;">
    <h1 class="display-5 fw-bold mb-5 text-center text-primary">Categorias</h1>

    @foreach ($categorias as $categoria)
        <div class="mb-5">
            <h2 class="h4 fw-semibold mb-4 text-primary border-bottom pb-2">{{ $categoria->nome }}</h2>

            @if ($categoria->noticias->count())
                <div class="row g-4">
                    @foreach ($categoria->noticias as $post)
                        <div class="col-12 col-sm-6 col-md-3 d-flex">
                            <div class="card flex-fill h-100">
                                @if(!empty($post->imagem))
                                    <img src="{{ asset('storage/' . $post->imagem) }}"
                                         alt="{{ $post->titulo }}"
                                         class="card-img-top object-fit-cover"
                                         style="max-height: 130px;">
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h3 class="card-title h6 mb-2 text-primary">
                                        <a href="{{ route('noticias.show', $post->id) }}" class="text-decoration-none text-primary">
                                            {{ $post->titulo }}
                                        </a>
                                    </h3>
                                    <p class="card-text small text-muted mb-2 flex-grow-1">
                                        {{ $post->resumo ?? \Illuminate\Support\Str::limit(strip_tags($post->conteudo), 100) }}
                                    </p>
                                    <span class="text-muted small mb-2">
                                        {{ $post->created_at ? $post->created_at->format('d/m/Y') : '' }}

                                    </span>
                                    <a href="{{ route('noticias.show', $post->id) }}"
                                       class="btn btn-sm btn-primary mt-auto align-self-start">
                                        Ver mais
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-muted mt-3">Nenhum post encontrado na categoria {{ $categoria->nome }}.</p>
            @endif
        </div>
    @endforeach
</div>
@endsection
