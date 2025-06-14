@extends('layouts.public')

@section('content')
<div class="container mx-auto px-4 py-8 flex flex-col lg:flex-row gap-8">
    @if ($convocacaoAtual)
        <!-- Coluna principal: convocação atual -->
        <div class="w-full lg:w-3/4 bg-white p-8 rounded-xl shadow flex flex-col mb-8 lg:mb-0">
            <h1 class="text-3xl font-extrabold mb-4 text-gray-900 leading-tight tracking-tight">
                {{ $convocacaoAtual->titulo }}
            </h1>

            @php
                $urlImagem = null;
                if (!empty($convocacaoAtual->imagem)) {
                    if (filter_var($convocacaoAtual->imagem, FILTER_VALIDATE_URL)) {
                        $urlImagem = $convocacaoAtual->imagem;
                    } else {
                        $urlImagem = asset('storage/' . $convocacaoAtual->imagem);
                    }
                }
            @endphp

            @if ($urlImagem)
                <img src="{{ $urlImagem }}" alt="{{ $convocacaoAtual->titulo }}" class="mb-6 w-full h-60 object-cover rounded-lg shadow">
            @endif

            <div class="prose max-w-none text-gray-700 text-lg leading-relaxed">
                {!! nl2br(e($convocacaoAtual->conteudo)) !!}
            </div>
        </div>
    @else
        <div class="w-full">
            <p class="text-center text-gray-500 text-lg">Nenhuma convocação encontrada.</p>
        </div>
    @endif

    <!-- Coluna das últimas convocações -->
    <div class="w-full lg:w-1/4 bg-gray-50 p-6 rounded-xl shadow flex flex-col max-h-[600px] lg:max-h-[600px] overflow-y-auto">
        <h2 class="text-xl font-bold mb-6 text-gray-800 tracking-tight">Últimas Convocações</h2>

        @forelse ($ultimasConvocacoes as $convocacao)
            <div class="mb-6 border-b border-gray-200 pb-3">
                <a href="{{ route('noticias.show', $convocacao->id) }}"
                   class="text-base font-semibold text-gray-900 hover:text-blue-700 transition hover:underline block mb-1">
                    {{ $convocacao->titulo }}
                </a>
                <p class="text-xs text-gray-500">{{ $convocacao->created_at->format('d/m/Y') }}</p>
            </div>
        @empty
            <p class="text-gray-400 text-sm">Sem outras convocações.</p>
        @endforelse
    </div>
</div>
@endsection
